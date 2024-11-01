=== Plugin Name ===
Contributors: Scriptonite
Tags: 2 step authentication, 2 step login, login with pin, login security,two step authentication,two-step authentication
Requires at least: 3.0.1
Tested up to: 3.9
Stable tag: 1.5
License: GPLv2 or later
 
Simple 2 step authentication for the masses!

== Description ==

This plugin adds a layer of security to your login page. You have full control over who can use it and also who can use which type. Included in this release is login pin by email and login pin by sms. You can allow users to recieve their pins by email and allow admins to use sms, or you can allow sms and email for eveyone, the choice is yours.  Users can select their prefrences in their own profile page and set the cellphone they would like to recieve messages on if sms is used. 

The android app and pin code by email are free services and hook directly to your site and uses no 3rd party sites or services.  The sms service will require an account with <a href="https://wp2step.com/membership-levels/">WP2step.com</a> to send the sms, you can sign up for free <a href="https://wp2step.com/membership-levels/">here</a>.  WP2Step does not collect any login data or save any personal information from your users, they only recieve the pin and cell number along with your API key.  API keys can be used on multiple sites and are not limited to a single domain or user and are perfect for a admin developer with multiple sites looking to protect their account.  

Simply login as you would normally, your random pin will arrive instantly.  What kind of pin? You can decide and set the lenth and characters used as well as the time until it expires.  Have an idea for new features? Find a bug? We want to make this plugin as secure and benificial as possible so please let us know <a href="https://wp2step.com/feature-requests-and-bug-reports/">here</a>.  

We do not actively monitor this plugins support page, if you need support please open a ticket <a href="https://wp2step.com/support-tickets/">here</a>.

<h3><a href="https://play.google.com/store/apps/details?id=com.whereyoursolutionis.wp2step">Get The App Free on Google Play</a></h3> 
<a href="https://play.google.com/store/apps/details?id=com.whereyoursolutionis.wp2step">
  <img alt="Get it on Google Play"
       src="https://developer.android.com/images/brand/en_generic_rgb_wo_60.png" />
</a>

  

<h3>Upcoming Features</h3> 
Recieve your login code via the free wp2step app for iOS, coming soon

== Installation ==



1. Upload plugin folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure your settings under Settings>WP 2 Step

== Frequently Asked Questions ==

= I activated the plugin but don't see any options in my profile =
Did you configure the plugin settings under Settings>WP 2 Step?

= Do you store any sms request? =
No, we do not keep any data on our site at all pertaining to your users.

= Do I need an account for either the email or app features? =
No, emails are sent using wordpress and the app will link into your site directly

= Will I be able to brand and publish my own app to recieve the site pins? =
Yes, we will be adding the ability to have custom logos and advertising if you choose on the mobile app

= Is this plugin self-contained or does it connect to a service? =
The plugin is contained for the email verification and when receiving your pin via the mobile app. To send sms it uses our setup at wp2step.com, all you need is an account and an API key.  Both are free, and we have several flexible, cost-effective sms options to choose from. Your site sends no login details, and wp2step keeps no information of any kind. All login data is verified on your site, wp2step simply receives the pin code, phone number, and API key to verify your account is authorized to use the wp2step services.

== Screenshots ==



== Changelog ==

= 1.0 =
* Plugin Created and Released

= 1.1 =
* Bug fix with pin box display

= 1.5 =
* Added connection to free android app 
