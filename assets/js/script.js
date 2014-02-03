(function(a) {
	a("#auto-complete-small").typeahead({
		name: "typeahead-small",
		limit: 5,
		dataType: "json",
		valueKey: "title",
		minLength: 3,
		remote: {
			url: a("#auto-complete-small").data("url") + "/%QUERY",
			filter: function(b) {
				console.log(b);
				return b
			}
		},
		template: _.template('<div class="media row animated fadeInDown"><a class="pull-left col-sm-2" href="#"><img class="media-object img-responsive" src="<%= poster %>"></a><div class="media-body col-sm-8"><h5 class="media-heading"><%= title %></h5><p class="tt-small-genre"><%= genre %></p></div></div>')
	}).bind("typeahead:selected", function(c, b) {
		window.location.href = b.link
	})
})(jQuery);

(function(a) {
	a("#rating").raty({
		path: a('#review-form, #user-review-form').data('path'),
		number: 10,
		numberMax: 10,
		hints: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"],
		target: ".current",
		targetKeep: true
	})
})(jQuery);

(function(a) {
	a(".title-social #twitter").sharrre({
		share: {
			twitter: true
		},
		enableHover: false,
		enableTracking: true,
		enableCounter: true,
		click: function(c, b) {
			c.simulateClick();
			c.openPopup("twitter")
		}
	});
	a(".title-social #facebook").sharrre({
		share: {
			facebook: true
		},
		enableHover: false,
		enableTracking: true,
		click: function(c, b) {
			c.simulateClick();
			c.openPopup("facebook")
		}
	});
	a(".title-social #pinterest").sharrre({
		share: {
			pinterest: true
		},
		enableHover: false,
		enableTracking: true,
		click: function(c, b) {
			c.simulateClick();
			c.openPopup("pinterest")
		}
	})
})(jQuery);
(function(a) {
	a(window).ready(function() {
		var b = a(".review-score");
		b.each(function() {
			var c = a(this),
				d = parseInt(c.text());
			if (d <= 50) {
				c.css("border-color", "#FF2E46")
			} else {
				if (d > 50 && d < 70) {
					c.css("border-color", "#e67e22")
				} else {
					if (d >= 70 && d != 100) {
						c.css("border-color", "#27AE60")
					} else {
						if (d == 100) {
							c.css("border-color", "#27AE60");
							c.css("padding", "12px 8px 10px 8px");
							c.find("span")
						}
					}
				}
			}
		})
	})
})(jQuery);

/*$(window).ready(function() {
	$(window).scroll(function() {
		if ($("body").hasClass("animate-nav")) {
			if ($(window).scrollTop() === 0) {
				$("body").addClass("nav-trans");
				$("nav").removeClass("animated bounce")
			} else {
				$("body").removeClass("nav-trans");
				$("nav").addClass("animated bounce")
			}
		}
	})
});*/

(function(a) {
	a("#grid").imagesLoaded(function() {
		function h(m, l) {
			return a(m).data("name") < a(l).data("name") ? -1 : 1
		}

		function e(m, l) {
			return a(m).data("popularity") > a(l).data("popularity") ? -1 : 1
		}

		function f(m, l) {
			return a(m).data("release") < a(l).data("release") ? 1 : -1
		}

		function g(m, l) {
			return a(m).data("release") < a(l).data("release") ? 1 : -1
		}
		a("#grid-sorters").find("[data-sortby='popularity']").addClass("active");
		if (a("#grid").hasClass("order")) {
			var b = "comparatorOrder"
		} else {
			var b = "comparatorPopularity"
		}
		var k = {
			autoResize: true,
			container: a("#grid"),
			offset: 0,
			fillEmptySpace: false,
			comparator: b,
			align: "center"
		};
		var i = a("#grid figure"),
			c = a("#grid-filters button");
		sorters = a("#grid-sorters button");
		i.wookmark(k);
		var j = function(l) {
			l.preventDefault();
			currentSortby = a(this);
			switch (currentSortby.data("sortby")) {
				case "release":
					k.comparator = f;
					break;
				case "popularity":
					k.comparator = e;
					break;
				case "name":
				default:
					k.comparator = h;
					break
			}
			sorters.removeClass("active");
			currentSortby.addClass("active");
			i.wookmark(k)
		};
		var d = function(m) {
			var l = a(m.currentTarget),
				n = [];
			l.toggleClass("active");
			c.filter(".active").each(function() {
				n.push(a(this).data("filter"))
			});
			i.wookmarkInstance.filter(n, "and")
		};
		c.click(d);
		sorters.click(j);
		a('#trigger').on('shown.bs.tab', function() {
			i.trigger('refreshWookmark')
		});
	})
})(jQuery);
(function(a) {
	a(document).ready(function() {
		a(".lists-form").submit(function(c) {
			c.preventDefault();
			var b = a("body").data("url");
			url = b + "/lists/add", button = a(this).find(".lists"), dataString = a(this).serialize();
			if (button.hasClass("watchlisted")) {
				url = b + "/lists/remove"
			}
			a.ajax({
				type: "POST",
				url: url,
				data: dataString,
				cache: false,
				success: function(d) {
					if (button.hasClass("watchlisted")) {
						button.removeClass("watchlisted");
						button.prop("title", "add to your list")
					} else {
						button.addClass("watchlisted");
						button.prop("title", "remove from your list")
					}
				}
			}).fail(function(f, d, e) {
				console.log(f);
				alert("Something went wrong on our end, sorry.")
			})
		})
	})
})(jQuery);
(function(a) {
	a(".trailer-trigger").on("click", function() {
		var b = a(this).data("trailer");
		a(".yt-modal-box").append('<div class="modal fade" id="yt-modal"><div class="modal-dialog"><div class="modal-body flex-video widescreen"></div></div></div>');
		a("#yt-modal").modal();
		a("#yt-modal").find(".modal-body").html('<button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true"></button><iframe src="' + b + '?version=3&autoplay=1&wmode=transparent" frameborder="0" allowfullscreen="true"></iframe>');
		a(document).on("hide.bs.modal", function() {
			a(".modal-body").html("")
		})
	})
})(jQuery);
(function(b) {
	b("#slide-2").css("display", "block");
	var a = b("#slider-home");
	if (a.length != 0) {
		b("#slider-home").liquidSlider({
			dynamicTabs: false,
			dynamicArrows: false,
			hoverArrows: false,
			mobileNavigation: false,
			crossLinks: true,
			responsive: true
		})
	}
})(jQuery);
(function(a) {
	a("#user-review-form").submit(function(b) {
		b.preventDefault();
		a.ajax({
			url: a(this).attr("action"),
			type: "POST",
			datatype: "json",
			data: a("#user-review-form").serialize(),
			beforeSend: function() {
				a("#ajax-loading").show()
			}
		}).done(function(c) {
			a("#ajax-loading").hide();
			if (c != "success") {
				a("#modal-errors").html('<span class="help-block alert alert-danger">' + c + "</span>")
			} else {
				a("#review-modal").modal("hide");
				a(".responses").html('<div class="alert alert-success alert-dismissable">Review saved successfully<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>')
			}
		}).fail(function(e, c, d) {
			console.log(e);
			alert("Something went wrong on our end, sorry.")
		});
		return false
	})
})(jQuery);
$('.home-social #twitter').sharrre({
	share: {
		twitter: true
	},
	enableHover: false,
	enableTracking: true,
	enableCounter: true,
	click: function(api, options) {
		api.simulateClick();
		api.openPopup('twitter');
	}
});
$('.home-social #facebook').sharrre({
	share: {
		facebook: true
	},
	enableHover: false,
	enableTracking: true,
	enableCounter: true,
	click: function(api, options) {
		api.simulateClick();
		api.openPopup('facebook');
	}
});
$('.home-social #pinterest').sharrre({
	share: {
		pinterest: true
	},
	enableHover: false,
	enableTracking: true,
	enableCounter: true,
	click: function(api, options) {
		api.simulateClick();
		api.openPopup('pinterest');
	}
});
$('.home-social #linkedin').sharrre({
	share: {
		linkedin: true
	},
	enableHover: false,
	enableTracking: true,
	enableCounter: true,
	click: function(api, options) {
		api.simulateClick();
		api.openPopup('linkedin');
	}
});

(function($) {
	$('.title-page a[data-toggle="tab"]').on('shown.bs.tab', function() {
		localStorage.setItem($('#tabs-id').data("id"), $(this).attr('href'));
	});
	var lastTab = localStorage.getItem($('#tabs-id').data("id"));
	if (lastTab) {
		$('a[href=' + lastTab + ']').tab('show');
	} else {
		$('a[data-toggle="tab"]:first').tab('show');
	}
})(jQuery);

(function(a) {
	a("#grid2").imagesLoaded(function() {
		function h(m, l) {
			return a(m).data("name") < a(l).data("name") ? -1 : 1
		}

		function e(m, l) {
			return a(m).data("popularity") > a(l).data("popularity") ? -1 : 1
		}

		function f(m, l) {
			return a(m).data("release") < a(l).data("release") ? 1 : -1
		}

		function g(m, l) {
			return a(m).data("release") < a(l).data("release") ? 1 : -1
		}
		a("#grid-sorters").find("[data-sortby='popularity']").addClass("active");
		if (a("#grid2").hasClass("order")) {
			var b = "comparatorOrder"
		} else {
			var b = "comparatorPopularity"
		}
		var k = {
			autoResize: true,
			container: a("#grid2"),
			offset: 0,
			fillEmptySpace: false,
			comparator: b,
			align: "center"
		};
		var i = a("#grid2 figure"),
			c = a("#grid-filters button");
		sorters = a("#grid-sorters button");
		i.wookmark(k);
		var j = function(l) {
			l.preventDefault();
			currentSortby = a(this);
			switch (currentSortby.data("sortby")) {
				case "release":
					k.comparator = f;
					break;
				case "popularity":
					k.comparator = e;
					break;
				case "name":
				default:
					k.comparator = h;
					break
			}
			sorters.removeClass("active");
			currentSortby.addClass("active");
			i.wookmark(k)
		};
		var d = function(m) {
			var l = a(m.currentTarget),
				n = [];
			l.toggleClass("active");
			c.filter(".active").each(function() {
				n.push(a(this).data("filter"))
			});
			i.wookmarkInstance.filter(n, "and")
		};
		c.click(d);
		sorters.click(j);
		a('#trigger2').on('shown.bs.tab', function() {
			i.trigger('refreshWookmark')
		});
	})
})(jQuery);

(function(a) {
	a("#grid3").imagesLoaded(function() {
		function h(m, l) {
			return a(m).data("name") < a(l).data("name") ? -1 : 1
		}

		function e(m, l) {
			return a(m).data("popularity") > a(l).data("popularity") ? -1 : 1
		}

		function f(m, l) {
			return a(m).data("release") < a(l).data("release") ? 1 : -1
		}

		function g(m, l) {
			return a(m).data("release") < a(l).data("release") ? 1 : -1
		}
		a("#grid-sorters").find("[data-sortby='popularity']").addClass("active");
		if (a("#grid3").hasClass("order")) {
			var b = "comparatorOrder"
		} else {
			var b = "comparatorPopularity"
		}
		var k = {
			autoResize: true,
			container: a("#grid3"),
			offset: 0,
			fillEmptySpace: false,
			comparator: b,
			align: "center"
		};
		var i = a("#grid3 figure"),
			c = a("#grid-filters button");
		sorters = a("#grid-sorters button");
		i.wookmark(k);
		var j = function(l) {
			l.preventDefault();
			currentSortby = a(this);
			switch (currentSortby.data("sortby")) {
				case "release":
					k.comparator = f;
					break;
				case "popularity":
					k.comparator = e;
					break;
				case "name":
				default:
					k.comparator = h;
					break
			}
			sorters.removeClass("active");
			currentSortby.addClass("active");
			i.wookmark(k)
		};
		var d = function(m) {
			var l = a(m.currentTarget),
				n = [];
			l.toggleClass("active");
			c.filter(".active").each(function() {
				n.push(a(this).data("filter"))
			});
			i.wookmarkInstance.filter(n, "and")
		};
		c.click(d);
		sorters.click(j);
		a('#trigger3').on('shown.bs.tab', function() {
			i.trigger('refreshWookmark')
		});
	})
})(jQuery);

(function(a) {
	a(".promo-trigger").on("click", function() {
		var b = a(this).data("trailer");
		a("#promo-modal-box").append('<div class="modal fade" id="yt-modal"><div class="modal-dialog"><div class="modal-body flex-video widescreen"></div></div></div>');
		a("#yt-modal").modal();
		a("#yt-modal").find(".modal-body").html('<button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true"></button><iframe src="' + b + '?version=3&autoplay=1&wmode=transparent" frameborder="0" allowfullscreen="true"></iframe>');
		a(document).on("hide.bs.modal", function() {
			a("#promo-modal-box .modal-body").html("")
		})
	})
})(jQuery);

(function($) {
	$('.checkbox input').iCheck({
		checkboxClass: 'icheckbox_flat',
		increaseArea: '20%'
	});
})(jQuery);

$(window).ready(function() {
    setTimeout(function() {
        var kkfades = $('.kk-fade-hide');
        if(kkfades.length) {
            kkfades.addClass('kk-fade-show');
        }
    }, 100);

    if($('#login-page,#register-page,#change-pass-page,#forgot-pass-page,#contact').length) {
        var pushFooter = $('.push-footer-wrapper');
        if(pushFooter.length) {
            var offsetHeight = 31;
            var navHeight = $('.navbar').height();
            var footHeight = $('footer').height();
            var pushHeight = pushFooter.height() + offsetHeight;
            var height = pushHeight - (navHeight + footHeight);

            pushFooter.css({
                'min-height': height,
                'height': height
            });
        }
    }

    $('#sharrre').sharrre({
        share: {
            googlePlus: true,
            facebook: true,
            twitter: true
        },
        buttons: {
            googlePlus: {size: 'tall', annotation:'bubble'},
            facebook: {layout: 'box_count'},
            twitter: {count: 'vertical', via: 'nangkakkak'}
        },
        enableHover: true,
        enableTracking: true,
        click: function(api, options) {
            var pn = $(api.element).find('.buttons');
            pn[pn.css('display') == 'none' ? 'show' : 'hide']();
        }
    });
});