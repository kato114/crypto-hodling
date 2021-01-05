"use strict";
$(document).ready(function(){

	//parallax init
	if (document.getElementById('scene')) { 
		var parallax = new Parallax(document.getElementById('scene'));
	}

	if (document.getElementById('scene1')) { 
		var parallax1 = new Parallax(document.getElementById('scene1'));
	}

	if (document.getElementById('scene2')) { 		
		var parallax2 = new Parallax(document.getElementById('scene2'));
	}

	if (document.getElementById('scene3')) { 	
		var parallax3 = new Parallax(document.getElementById('scene3'));
	}

 	//video frame Main Demo
	if ($('.video-wrap').length > 0) { 
		var videoSrc = $(".video-wrap iframe").attr('src');
		$(".ActiveVideo-button").on('click', function(){
			event.preventDefault();
			$(".video-wrap").toggleClass("active-video");
			$(".video-wrap iframe").attr('src',videoSrc); 
		});

		$(".closeVideo-button").on('click', function(){
			$(".video-wrap").toggleClass("active-video");
		});
		
		$(document.body).on('click', function(e) {
			if (!$(e.target).closest(".video-wrap iframe, .ActiveVideo-button").length) {
				$(".video-wrap").removeClass("active-video");
				$(".video-wrap iframe").attr('src',''); 
			}
			e.stopPropagation();
		});
	};
		
    //particle Main Demo
    if ($('#particles-js').length > 0) {
        particlesJS("particles-js", {

			"particles": {
			    "number": {
			      "value": 30,
			      "density": {
			        "enable": false,
			        "value_area": 1000
			      }
			    },
			    "color": {
			      "value": "#ffffff"
			    },
			    "shape": {
			      "type": "circle",
			      "stroke": {
			        "width": 0,
			        "color": "#000000"
			      },
			      "polygon": {
			        "nb_sides": 5
			      },
		            "image": {
				        //"src": "img/github.svg",
				        "width": 100,
				        "height": 100
				      }
			    },
			    "opacity": {
			      "value": 0.5,
			      "random": false,
			      "anim": {
			        "enable": false,
			        "speed": 1,
			        "opacity_min": 0.1,
			        "sync": false
			      }
			    },
			    "size": {
			      "value": 2,
			      "random": true,
			      "anim": {
			        "enable": false,
			        "speed": 40,
			        "size_min": 0.1,
			        "sync": false
			      }
			    },
			    "line_linked": {
			      "enable": true,
			      "distance": 400,
			      "color": "#ffffff",
			      "opacity": 0.4,
			      "width": 1
			    },
			    "move": {
			      "enable": true,
			      "speed": 6,
			      "direction": "none",
			      "random": false,
			      "straight": false,
			      "out_mode": "out",
			      "bounce": false,
			      "attract": {
			        "enable": false,
			        "rotateX": 600,
			        "rotateY": 1200
			      }
			    }
			  },
			  "interactivity": {
			    "detect_on": "canvas",
			    "events": {
			      "onhover": {
			        "enable": true,
			        "mode": "repulse"
			      },
			      "onclick": {
			        "enable": true,
			        "mode": "push"
			      },
			      "resize": true
			    },
			    "modes": {
			      "grab": {
			        "distance": 400,
			        "line_linked": {
			          "opacity": 1
			        }
			      },
			      "bubble": {
			        "distance": 400,
			        "size": 40,
			        "duration": 2,
			        "opacity": 8,
			        "speed": 3
			      },
			      "repulse": {
			        "distance": 200,
			        "duration": 0.4
			      },
			      "push": {
			        "particles_nb": 4
			      },
			      "remove": {
			        "particles_nb": 2
			      }
			    }
			  },
			  "retina_detect": true
			});

    };

  // Particle Light Skin
    if ($('#particles-js-light').length > 0) {
        particlesJS("particles-js-light", {
            "particles": {
                "number": {
                    "value": 160,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 1,
                        "color": "#008afd"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                },
                "opacity": {
                    "value": 1,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 1,
                        "opacity_min": 0,
                        "sync": false
                    }
                },
                "size": {
                    "value": 4,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 4,
                        "size_min": 0.3,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 3,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 600
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "bubble"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 250,
                        "size": 0,
                        "duration": 2,
                        "opacity": 0,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 400,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    };

    // Chart Main Demo
	if ($('#chart-main').length > 0) {
		var utils = Samples.utils;
		var inputs = {
			min: 0,
			max: 1,
			count: 8,
			decimals: 2,
			continuity: 1
		};
		function generateData(config) {
			return utils.numbers(Chart.helpers.merge(inputs, config || {}));
		}
		function generateLabels(config) {
			return utils.months(Chart.helpers.merge({
				count: inputs.count,
				section: 3
			}, config || {}));
		}
		var options = {
			maintainAspectRatio: false,
			spanGaps: false,
			elements: {
				line: {
					tension: 0.000001
				}
			},
			plugins: {
				filler: {
					propagate: false
				}
			},
			legend: {
	            display: false
	        },
			scales: {
				xAxes: [{
					ticks: {
						autoSkip: false,
						maxRotation: 0,
						fontColor: "rgba(255,255,255,0.5)",
						color: 'rgba(255,255,255,1)'
					},
					gridLines:{
						color: 'rgba(255,255,255,0.05)',
					}
				}],
				yAxes: [{
	                ticks: {
	                    fontColor: "rgba(255,255,255,0.5)",
	                    beginAtZero: true
	                },
	                gridLines:{
						color: 'rgba(255,255,255,0.05)',
					}
	            }]
			}};
			utils.srand(8);
			window.onload = function() {
			var ctx = document.getElementById('chart-main').getContext('2d');
			window.myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: generateLabels(),
					datasets: [{
						backgroundColor: "rgba(54,162,235,0.1)",
						borderColor: "#36a2eb",
						data: generateData(),
						label: '',
						pointRadius: 4,
						pointHoverRadius: 7,
						pointBackgroundColor: "#36a2eb"
						//fill: boundary
					}]
				},
				options: Chart.helpers.merge(options, {
					title: {
						text: 'Token Price Chart',
						fontSize: 22,
						fontColor: "#cdd6f6",
						display: true
					}
				})
			});
		}
	};
    
	//Pie Chart Dark Skin & Light Skin
	if ($('#doughnut-chart').length > 0) {
		new Chart(document.getElementById("doughnut-chart"), {
		    type: 'doughnut',
		    data: {
		      labels: ["Artificial Intellect", "Big Data", "Blockchain"],
		      datasets: [
		        {
					//label: "",
					backgroundColor: ["#009cfd", "#0069fc","#46da60"],
					data: [2478,5267,734],
					borderColor: "transparent",
					borderWidth: "3",
		        }
		      ]
		    },
		    options: {
		    	responsive: true,
		    	scaleBeginAtZero: false,
				title: {
					display: false,
					text: 'Platform Include',
					fontColor: '#fff',
					fontSize: 22
				},
				maintainAspectRatio: !1,
                cutoutPercentage: 60,
                legend: {
                    //display: !1
                    display: true,
                    labels:{
	                    fontColor: "#99affd",
                 	    //fontSize: 14
                    }
                },
                plugins: {
                	deferred: {
                		xOffset: 150,
                		yOffset: '50%',
                		delay: 500
                	}
                }
		    }	
		});
	};

	//progressbar
	if ($('#Progress').length > 0) {
		var delay = 500;
		$(".progress-bar").each(function(i){
		    $(this).delay( delay*i ).animate( { width: $(this).attr('aria-valuenow') + '%' }, delay );
    
		})
	};	

	//Scroll Section (Dark Skin)
	if ($('.scroll-section').length > 0) { 
		$(function() {
			$.scrollify({
				section : ".scroll-section",
				offset : -76,
				//interstitialSection:".site_header"
			});
		});
	};	

	//owl carousel (Dark Skin & Light Skin)
	if ($('.tablet-owl').length > 0) { 
		$('.tablet-owl').owlCarousel({
			loop:true,
			nav:false,
			items: 1,
			autoplay: Boolean,
			mouseDrag: true,
			dots: false,
			autoplayTimeout: 5000,
		});
	}	
	if ($('.phone-owl').length > 0) { 
		$('.phone-owl').owlCarousel({
			loop:true,
			nav:false,
			items: 1,
			autoplay: Boolean,
			mouseDrag: true,
			dots: true,
			autoplayTimeout: 3000,
			animateOut: "fadeOutDown",
			animateIn: 'fadeInUp'
		});
	}
	
	//owl carousel for Exchange page
	if ($(".charts-owl").length > 0) {
		$('.charts-owl').owlCarousel({
			loop: true,
			nav:false,		
			//navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-left'></i>"],
			items: 5,
			autoplay: true,
			mouseDrag: true,
			dots: false,
			autoplayTimeout: 2000,
			margin: 40,
			responsiveClass: true,
      		responsiveRefreshRate: true,
			responsive: {
				320:{
					items: 1
				},
				480:{
					items: 2,
				},
				992:{
					items: 3
				},
				1600:{
					items: 5
				}
			}
		});
	}
		
	//counter
	var endTime = {
		days: '00',
		hours: '01',
		minutes: '00',
		seconds: '00'
	};
	var reloadTime = {
		days: "0",
		hours: endTime.hours,
		minutes: endTime.minutes,
		seconds: endTime.seconds
	};

	if(endTime.days < 10){
		reloadTime.days = "0" + endTime.days;
	}else{
		reloadTime.days = endTime.days;
	}
	function timer(){
		reloadTime.seconds = reloadTime.seconds - 1;
		if(reloadTime.seconds == 0){
			reloadTime.minutes = reloadTime.minutes - 1;
			reloadTime.seconds = '15';
		}

		if(reloadTime.seconds < 10){
			$(".timer .seconds span").text("0" + reloadTime.seconds);
		}else{
			$(".timer .seconds span").text(reloadTime.seconds);
		}
		if(reloadTime.minutes < 10){
			$(".timer .minutes span").text("0" + reloadTime.minutes);
		}else{
			$(".timer .minutes span").text(reloadTime.minutes);
		}
		if(reloadTime.hours < 10){
			$(".timer .hours span").text("0" + reloadTime.hours);
		}else{
			$(".timer .hours span").text(reloadTime.hours);
		}
		if(reloadTime.minutes < 10){
			$(".timer .days span").text("0" + reloadTime.days);
		}else{
			$(".timer .days span").text(reloadTime.days);
		}

		$(".timer .minutes span").text(reloadTime.minutes);
		$(".timer .hours span").text(reloadTime.hours);
		$(".timer .days span").text(reloadTime.days);

	};
	setInterval(timer, 1000);
		// Set the date we're counting down to
		var countDownDate = new Date("apr 19, 2021 12:00:00").getTime();
		// Update the count down every 1 second
		var x = setInterval(function() {
		// Get todays date and time
		var now = new Date().getTime();
		// Find the distance between now an the count down date
		var distance = countDownDate - now;
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		// Output the result in an element with id="counter"
		if(days < 10){
			$("#counter .days span").text("0" + days);
		}else{
			$("#counter .days span").text(days);
		}
		if(hours < 10){
			$("#counter .hours span").text("0" + hours);
		}else{
			$("#counter .hours span").text(hours);
		}
		if(minutes < 10){
			$("#counter .minutes span").text("0" + minutes);
		}else{
			$("#counter .minutes span").text(minutes);
		}
		if(seconds < 10){
			$("#counter .seconds span").text("0" + seconds);
		}else{
			$("#counter .seconds span").text(seconds);
		}
		
		// If the count down is over, write some text
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("counter").innerHTML = "EXPIRED";
		};
	}, 1000);

	// Skroll init. On mobile destroy
	if ($('#banner-cards').length > 0) {
		var s = skrollr.init({forceHeight: false});
			if (s.isMobile()) {
			    s.destroy();
		}
	};

	if ($('#skrollr-body').length > 0) {
		var s = skrollr.init({forceHeight: false});
			if (s.isMobile()) {
			    s.destroy();
		};
	};


	if ($('#Home-white').length > 0) {
		var s = skrollr.init({forceHeight: false});
		if (s.isMobile()) {
			    s.destroy();
		}
	};

 	//tabs Exchange Skin
	if ($(".tabs table").length > 0) {
		$(".tabs table").each(function(){
		$(".tabs .tab-items").append("<li id='" + $(this).attr("id") + "'><span>" + $(this).attr("id") + "</span></li>");
		});
		$(".tabs .tab-items li:nth-child(1)").addClass("active");
		$(".tabs .tab-items li").on('click', function(){
			var tableName = $(this).attr("id");
			$(".tabs table.active").removeClass("active");
			$(".tabs .tab-items li.active").removeClass("active");
			$(".tabs table#" + tableName).addClass("active");
			
			$(".tabs .tab-items li#" + tableName).addClass("active");
		});
	};

	// Nav Scroll Animate
	$('a[href^="#"]').bind('click', function(e) {
		e.preventDefault(); 
		var target = $(this).attr("href");
		$('html, body').stop().animate({
			scrollTop: $(target).offset().top
		}, 1000, 'swing', function() {
			location.hash = target; 
		});
		return false;
	});

	//Nav Active Link 
	$(window).scroll(function() {
		var scrollDistance = $(window).scrollTop();
		$('section[id]').each(function(i) {
			if ($(this).position().top-76 <= scrollDistance) {
				$('nav ul li a.active').removeClass('active');
				$('nav ul li a').eq(i).addClass('active');
			}
		});
	}).scroll();

	//preloader
	if ($(".preloader").length > 0) {
	    $('#top-bg').delay(1500).slideUp();
	    $('#bottom-bg').delay(1500).slideUp();
	    $('#loader-middle').delay(1250).fadeOut();
	    // Preloader timeout
	    setTimeout(function() {
	        $('.preloader').addClass('d-none');
	    }, 1750);
	};

});

