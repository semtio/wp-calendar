# wp booking calendar
Booking calendar
#WordPress #ACF #HTML #CSS #JavaScript 
I developed a mini-calendar plugin for my client’s website.
I decided that alternative plugins from the WordPress repository were not suitable due to the specific requirements of the customer.

What is included in the plugin options:
1) output of the year and two active months
2) display a calendar with dates
3) inputs for feedback

Peculiarities:
1) the past date is no longer clickable
2) you can select several dates at once
3) the calendar displays the current day-week
4) warnings if the client entered incorrect data 
5) after “send” the trigger is triggered to display additional information from the customer
6) Ability to use shortcode [calendar_from_7on]

---

It took me 25 hours to develop the mini-plugin + agree on technical information. 

Details on github:
https://github.com/semtio/wp-calendar

To install my plugin you will need:
1) install WordPress 
2) install ACF
3) import custom fields from the "booking calendar.json" file into ACF
4) put "booking-calendar.php" in the root of your theme
5) add data from my functions.php to your functions.php at the very end

After this, “Excursions” will appear in your admin panel. 
For questions, you can contact me directly on Telegram @semtio
