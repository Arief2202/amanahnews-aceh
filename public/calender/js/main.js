(function($) {
		"use strict";
		var monthName = [
			"Januari",
			"Februari",
			"Maret",
			"April",
			"Mei",
			"Juni",
			"Juli",
			"Agustus",
			"September",
			"Oktober",
			"November",
			"Desember"
		];
		$( document ).ready(function() {
			function c(passed_month, passed_year, calNum) {
				var calendar = calNum == 0 ? calendars.cal1 : calendars.cal2;
				makeWeek(calendar.weekline);
				calendar.datesBody.empty();
				var calMonthArray = makeMonthArray(passed_month, passed_year);
				var r = 0;
				var u = false;

				console.log(passed_month);
				console.log(passed_year);

				while(!u) {
					if(daysArray[r] == calMonthArray[0].weekday) { u = true } 
					else { 
						calendar.datesBody.append('<div class="blank"></div>');
						r++;
					}
				} 
				for(var cell=0;cell<42-r;cell++) { // 42 date-cells in calendar
					if(cell >= calMonthArray.length) {
						calendar.datesBody.append('<div class="blank"></div>');
					} else {
						var shownDate = calMonthArray[cell].day;
						// Later refactiroing -- iter_date not needed after "today" is found
						var iter_date = new Date(passed_year,passed_month,shownDate); 
						if ( 
							(
								( shownDate != today.getDate() && passed_month == today.getMonth() ) 
								|| passed_month != today.getMonth()
							) 
								&& iter_date < today) {						
							// var m = '<div class="past-date">';
							var m = '<div style="position:relative;" value="'+shownDate+'">';
						} else {
							var m = checkToday(iter_date)?'<div class="today" value="'+shownDate+'" style="position:relative;">':"<div style='position:relative;'value='"+shownDate+"' >";
						}
						// if(data.eventCount[shownDate-1] != 0) calendar.datesBody.append(m + shownDate + "<a class='eventCount'>"+data.eventCount[shownDate-1]+"</a><a class='bgEventCount'></a></div>");
						// else calendar.datesBody.append(m + shownDate + "</div>");

						calendar.datesBody.append(m + shownDate + "<a class='eventCount'>"+shownDate+"</a><a class='bgEventCount'></a></div>");
						
					}
				}


				// var color = o[passed_month];
				calendar.calHeader.find("h2").text(i[passed_month]+" "+passed_year);
							//.css("background-color",color)
							//.find("h2").text(i[passed_month]+" "+year);

				// find elements (dates) to be clicked on each time
				// the calendar is generated
				//clickedElement = bothCals.find(".calendar_content").find("div");
				
				var clicked = false;
				selectDates(selected);

				clickedElement = calendar.datesBody.find('div');
				clickedElement.on("click", function(){
					clicked = $(this);
					if (clicked.hasClass('past-date')) { return; }
					var whichCalendar = calendar.name;
					// console.log(whichCalendar);
					// Understading which element was clicked;
					// var parentClass = $(this).parent().parent().attr('class');
					if (firstClick && secondClick) {
						thirdClicked = getClickedInfo(clicked, calendar);
						var firstClickDateObj = new Date(firstClicked.year, 
													firstClicked.month, 
													firstClicked.date);
						var secondClickDateObj = new Date(secondClicked.year, 
													secondClicked.month, 
													secondClicked.date);
						var thirdClickDateObj = new Date(thirdClicked.year, 
													thirdClicked.month, 
													thirdClicked.date);
						if (secondClickDateObj > thirdClickDateObj
							&& thirdClickDateObj > firstClickDateObj) {
							secondClicked = thirdClicked;
							// then choose dates again from the start :)
							bothCals.find(".calendar_content").find("div").each(function(){
								$(this).removeClass("selected");
							});
							selected = {};
							selected[firstClicked.year] = {};
							selected[firstClicked.year][firstClicked.month] = [firstClicked.date];
							selected = addChosenDates(firstClicked, secondClicked, selected);
						} else { // reset clicks
							selected = {};
							firstClicked = [];
							secondClicked = [];
							firstClick = false;
							secondClick = false;
							bothCals.find(".calendar_content").find("div").each(function(){
								$(this).removeClass("selected");
							});	
						}
					}
					if (!firstClick) {
							// firstClick = false;
							firstClicked = getClickedInfo(clicked, calendar);
							selected[firstClicked.year] = {};
							if(!isNaN(firstClicked.date)){
							document.getElementById('modal-title').innerHTML = "<b>Acara " + firstClicked.date+" "+monthName[firstClicked.month]+" "+firstClicked.year+"</b>";

							fetch("/acara/get?date="+firstClicked.year+"-"+(firstClicked.month+1)+"-"+firstClicked.date)
							.then(response => response.json())
							.then(data => {
								
								var color = ["primary", "secondary", "success", "danger", "warning", "info", "dark"];
								var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Dec"];
								var modalBody = document.getElementById('modal-body');
								modalBody.innerHTML = null;
			
								for(var i=0; i<data.acara.length; i++){
									var title = data.acara[i].title;
									var lokasi = data.acara[i].lokasi;
									var datetime = "";								
									var start_acara_date = new Date(data.acara[i].start_acara_date);	
									var end_acara_date = data.acara[i].end_acara_date;	
									datetime += start_acara_date.getDate() + " " + month[start_acara_date.getMonth()] + " " + start_acara_date.getFullYear();
									if(end_acara_date){
										end_acara_date = new Date(data.acara[i].end_acara_date);
										datetime += " - "+end_acara_date.getDate() + " " + month[end_acara_date.getMonth()] + " " + end_acara_date.getFullYear();
									}

									var href = '/acara/detail/'+data.acara[i].slug;
									console.log(start_acara_date);
									console.log(end_acara_date);
									modalBody.innerHTML += '<a href="'+href+'"><div class="alert alert-'+color[i%6]+'" role="alert"><h5 style="font-weight:600">'+title+'</h5><div class="row"><div class="col-auto"><i class="bx bx-map-pin" style="font-size: 50px"></i></div><div class="col"><p>'+lokasi+'</p></div></div><div class="d-flex justify-content-between mt-2"><div class="pt-2"><p>'+datetime+'</p></div><button class="btn btn-'+color[i%6]+'">Selengkapnya</button></div></div></a>';

									$("#myModal").modal('show');
								}
							});
						}
						// selected[firstClicked.year][firstClicked.month] = [firstClicked.date];
					} 
					// else {
					// 	console.log('second click');
					// 	secondClick = true;
					// 	secondClicked = getClickedInfo(clicked, calendar);
					// 	//console.log(secondClicked);

					// 	// what if second clicked date is before the first clicked?
					// 	var firstClickDateObj = new Date(firstClicked.year, 
					// 								firstClicked.month, 
					// 								firstClicked.date);
					// 	var secondClickDateObj = new Date(secondClicked.year, 
					// 								secondClicked.month, 
					// 								secondClicked.date);

					// 	if (firstClickDateObj > secondClickDateObj) {

					// 		var cachedClickedInfo = secondClicked;
					// 		secondClicked = firstClicked;
					// 		firstClicked = cachedClickedInfo;
					// 		selected = {};
					// 		selected[firstClicked.year] = {};
					// 		selected[firstClicked.year][firstClicked.month] = [firstClicked.date];

					// 	} else if (firstClickDateObj.getTime() ==
					// 				secondClickDateObj.getTime()) {
					// 		selected = {};
					// 		firstClicked = [];
					// 		secondClicked = [];
					// 		firstClick = false;
					// 		secondClick = false;
					// 		$(this).removeClass("selected");
					// 	}


					// 	// add between dates to [selected]
					// 	selected = addChosenDates(firstClicked, secondClicked, selected);
					// }
					// console.log(selected);
					selectDates(selected);
				}
			);			

			}
			function selectDates(selected) {
				console.log(selected);
				if (!$.isEmptyObject(selected)) {
					var dateElements1 = datesBody1.find('div');
					var dateElements2 = datesBody2.find('div');

					function highlightDates(passed_year, passed_month, dateElements){
						if (passed_year in selected && passed_month in selected[passed_year]) {
							var daysToCompare = selected[passed_year][passed_month];
							// console.log(daysToCompare);
							for (var d in daysToCompare) {
								dateElements.each(function(index) {
									if (parseInt($(this).text()) == daysToCompare[d]) {
										$(this).addClass('selected');
									}
								});	
							}
							
						}
					}

					highlightDates(year, month, dateElements1);
					highlightDates(nextYear, nextMonth, dateElements2);
				}
			}

			function makeMonthArray(passed_month, passed_year) { // creates Array specifying dates and weekdays
				var e=[];
				for(var r=1;r<getDaysInMonth(passed_year, passed_month)+1;r++) {
					e.push({day: r,
							// Later refactor -- weekday needed only for first week
							weekday: daysArray[getWeekdayNum(passed_year,passed_month,r)]
						});
				}
				return e;
			}
			function makeWeek(week) {
				week.empty();
				for(var e=0;e<7;e++) { 
					week.append("<div>"+daysArray[e].substring(0,3)+"</div>") 
				}
			}

			function getDaysInMonth(currentYear,currentMon) {
				return(new Date(currentYear,currentMon+1,0)).getDate();
			}
			function getWeekdayNum(e,t,n) {
				return(new Date(e,t,n)).getDay();
			}
			function checkToday(e) {
				var todayDate = today.getFullYear()+'/'+(today.getMonth()+1)+'/'+today.getDate();
				var checkingDate = e.getFullYear()+'/'+(e.getMonth()+1)+'/'+e.getDate();
				return todayDate==checkingDate;

			}
			function getAdjacentMonth(curr_month, curr_year, direction) {
				var theNextMonth;
				var theNextYear;
				if (direction == "next") {
					theNextMonth = (curr_month + 1) % 12;
					theNextYear = (curr_month == 11) ? curr_year + 1 : curr_year;
				} else {
					theNextMonth = (curr_month == 0) ? 11 : curr_month - 1;
					theNextYear = (curr_month == 0) ? curr_year - 1 : curr_year;
				}
				return [theNextMonth, theNextYear];
			}
			function b() {
				today = new Date;
				year = today.getFullYear();
				month = today.getMonth();
				var nextDates = getAdjacentMonth(month, year, "next");
				nextMonth = nextDates[0];
				nextYear = nextDates[1];
			}

			var e=480;

			var today;
			var year,
				month,
				nextMonth,
				nextYear;

			//var t=2013;
			//var n=9;
			var r = [];
			var i = ["Januari","Februari","Maret","April","Mei",
					"Juni","Juli","Agustus","September","Oktober",
					"November","Desember"];
			var daysArray = ["Minggu","Senin","Selasa",
							"Rabu","Kamis","Jumat","Sabtu"];
			var o = ["#16a085","#1abc9c","#c0392b","#27ae60",
					"#FF6860","#f39c12","#f1c40f","#e67e22",
					"#2ecc71","#e74c3c","#d35400","#2c3e50"];
			
			var cal1=$("#calendar_first");
			var calHeader1=cal1.find(".calendar_header");
			var weekline1=cal1.find(".calendar_weekdays");
			var datesBody1=cal1.find(".calendar_content");

			var cal2=$("#calendar_second");
			var calHeader2=cal2.find(".calendar_header");
			var weekline2=cal2.find(".calendar_weekdays");
			var datesBody2=cal2.find(".calendar_content");

			var bothCals = $(".calendar");

			var switchButton = bothCals.find(".calendar_header").find('.switch-month');

			var calendars = { 
							"cal1": { 	"name": "first",
										"calHeader": calHeader1,
										"weekline": weekline1,
										"datesBody": datesBody1 },
							"cal2": { 	"name": "second",
										"calHeader": calHeader2,
										"weekline": weekline2,
										"datesBody": datesBody2	}
							}
			

			var clickedElement;
			var firstClicked,
				secondClicked,
				thirdClicked;
			var firstClick = false;
			var secondClick = false;	
			var selected = {};

			b();
			c(month, year, 0);
			c(nextMonth, nextYear, 1);

			switchButton.on("click",function() {
				var clicked=$(this);
				var generateCalendars = function(e) {
					var nextDatesFirst = getAdjacentMonth(month, year, e);
					var nextDatesSecond = getAdjacentMonth(nextMonth, nextYear, e);
					month = nextDatesFirst[0];
					year = nextDatesFirst[1];
					nextMonth = nextDatesSecond[0];
					nextYear = nextDatesSecond[1];

					c(month, year, 0);
					c(nextMonth, nextYear, 1);
				};
				if(clicked.attr("class").indexOf("left")!=-1) { 
					generateCalendars("previous");
				} else { generateCalendars("next"); }
				clickedElement = bothCals.find(".calendar_content").find("div");
				console.log("checking");
				console.log(nextYear);
				updateDate(nextYear+"-"+(month+1));
			});


			//  Click picking stuff
			function getClickedInfo(element, calendar) {
				var clickedInfo = {};
				var clickedCalendar,
					clickedMonth,
					clickedYear;
				clickedCalendar = calendar.name;
				// console.log(element);
				// console.log(element.attr('value'));
				clickedMonth = clickedCalendar == "first" ? month : nextMonth;
				clickedYear = clickedCalendar == "first" ? year : nextYear;
				clickedInfo = {"calNum": clickedCalendar,
								"date": parseInt(element.attr('value')),
								"month": clickedMonth,
								"year": clickedYear}
				//console.log(clickedInfo);
				return clickedInfo;
			}


			// Finding between dates MADNESS. Needs refactoring and smartening up :)
			function addChosenDates(firstClicked, secondClicked, selected) {
				if (secondClicked.date > firstClicked.date || 
					secondClicked.month > firstClicked.month ||
					secondClicked.year > firstClicked.year) {

					var added_year = secondClicked.year;
					var added_month = secondClicked.month;
					var added_date = secondClicked.date;
					console.log(selected);

					if (added_year > firstClicked.year) {	
						// first add all dates from all months of Second-Clicked-Year
						selected[added_year] = {};
						selected[added_year][added_month] = [];
						for (var i = 1; 
							i <= secondClicked.date;
							i++) {
							selected[added_year][added_month].push(i);
						}
				
						added_month = added_month - 1;
						console.log(added_month);
						while (added_month >= 0) {
							selected[added_year][added_month] = [];
							for (var i = 1; 
								i <= getDaysInMonth(added_year, added_month);
								i++) {
								selected[added_year][added_month].push(i);
							}
							added_month = added_month - 1;
						}

						added_year = added_year - 1;
						added_month = 11; // reset month to Dec because we decreased year
						added_date = getDaysInMonth(added_year, added_month); // reset date as well

						// Now add all dates from all months of inbetween years
						while (added_year > firstClicked.year) {
							selected[added_year] = {};
							for (var i=0; i < 12; i++) {
								selected[added_year][i] = [];
								for (var d = 1; d <= getDaysInMonth(added_year, i); d++) {
									selected[added_year][i].push(d);
								}
							}
							added_year = added_year - 1;
						}
					}
					
					if (added_month > firstClicked.month) {
						if (firstClicked.year == secondClicked.year) {
							console.log("here is the month:",added_month);
							selected[added_year][added_month] = [];
							for (var i = 1; 
								i <= secondClicked.date;
								i++) {
								selected[added_year][added_month].push(i);
							}
							added_month = added_month - 1;
						}
						while (added_month > firstClicked.month) {
							selected[added_year][added_month] = [];
							for (var i = 1; 
								i <= getDaysInMonth(added_year, added_month);
								i++) {
								selected[added_year][added_month].push(i);
							}
							added_month = added_month - 1;
						}
						added_date = getDaysInMonth(added_year, added_month);
					}

					for (var i = firstClicked.date + 1; 
						i <= added_date;
						i++) {
						selected[added_year][added_month].push(i);
					}
				}
				return selected;
			}
	});

	function updateDate(date){
		$.each($('.eventCount'), function(key, value){value.style.display='none';});
		$.each($('.bgEventCount'), function(key, value){value.style.display='none';});
		fetch("/acara/get?eventCount=1"+(date? ("&date="+date) : "" ))
		.then(response => response.json())
		.then(data => {			
			$.each($('.eventCount'), function(key, value){value.style.display='block';});
			$.each($('.bgEventCount'), function(key, value){value.style.display='block';});
			$.each($('.eventCount'), function(key, value){
				value.innerHTML = data.eventCount[key];
				var bg = $('.bgEventCount');
				if(data.eventCount[key] == 0){
					bg[key].style.display='none';
					value.style.display='none';
				}
			});
			preloader.remove();
		});
	}
	updateDate();

})(jQuery);
