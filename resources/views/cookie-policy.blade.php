@extends('main')
@section('style')
	<style type="text/css">
		.info {
			padding: 20px;
		}
		.info p {
			font-size: 13px;
			margin-top: 15px;
			text-align: justify;
		}
		.info h5 {
			margin-top: 30px;
		}
		.info ul li {
			font-size: 13px;
		}
	</style>
@endsection
@section('content')
    <section>
		<div class="container" style="margin-top: 130px; margin-bottom: 50px; background: #fff;">
			<div class="info">
				<h2>Cookie Policy</h2>
				
				<p>This website uses Cookies. By using this website, you are agreeing to this policy and consenting to Firstrays.com.bd for the use of Cookies in accordance with the terms of this Cookie policy.</p>

				<h5>What are Cookies?</h5>
				<p>Cookies are used by your computer’s browser to store your preferences.  The information is sent back to the server each time the browser requests a page from the server.  This enables a web server to identify and track web browsers.</p>

				<p>Cookies are simple text files, used to help navigate automatic logins, password authentication, <a href="{{ url('/') }}">shopping</a> cart functions, personal preference settings and a variety of other functions. Cookies make these functions smooth and hassle-free to the user.</p>

				<p>There are two main kinds of Cookies: Session Cookies and Persistent Cookies. Session Cookies are deleted from your computer when you close your browser, whereas Persistent Cookies remain stored on your computer until deleted, or until they reach their expiry date.</p>

				<h5>Are Cookies Safe?</h5>
				<p>Cookies are harmless. They cannot introduce viruses on your computer.</p>

				<p>Cookies don’t search your computer for information. Cookies register the information you provide through your browser. Information stored by Cookies is usually encoded; it is protected from potential computer hackers by security features.</p>

				<p>A Cookie will simply remember your information on the website to save you time. Cookies only store the information you provide. A Cookie cannot “grab” your email address. A Cookie can store your email address on the website—if you have typed in your email address; a Cookie stores all information you voluntarily give when you visit a website.</p>

				<h5>Google Cookies & How we use it</h5>
				<p>Firstrays.com.bd uses Google Analytics to analyse the use of this website.  Google Analytics generates statistical and other information about website use by means of Cookies, which are stored on the user’s computer.  The generated information relating to our website is used to create reports about the use of the website. Google will store and use this information.</p>

				<p>For more information, Google’s privacy policy is available at: <a href="https://www.google.com/privacypolicy.html">https://www.google.com/privacypolicy.html</a></p>

				<p>Firstrays.com.bd publishes interest-based advertisements by Google for the Firstrays website. These are tailored by Google to reflect your search interests based on your browsing history. Google will track the user’s web activity in order to determine your interests and behaviour across the web using these Cookies.</p>

				<p>We may use the information we obtain from your use of our Cookies for the following purposes:
					<ul>
						<li>to recognise your computer when you visit the website</li>
						<li>to track you as you navigate the website, and to enable the use of any e-commerce facilities</li>
						<li>to improve the website’s usability</li>
						<li>to analyse the use of the website</li>
						<li>in the administration of the website</li>
						<li>to personalise the website for you, including targeting advertisements which may be of particular interest to you.</li>
					</ul>
				</p>

				<p>You can view, delete or add interest categories associated with your browser using Google’s Ads Preference Manager, available at: <a href="http://www.google.com/ads/preferences/">http://www.google.com/ads/preferences/</a></p>

				<h5>Facebook & Other Cookies</h5>
				<p>Firstrays.com.bd also uses various social media and advertising platforms. Renowned platforms like Facebook, Twitter & many other sites use Cookies if the user has an account or uses those Services, including their website, android/iOS apps (whether or not you are registered or logged in), or visit other websites and apps that use their Services (including the Like/Call to Action button or their advertising tools).</p>

				<p>Cookies help those platforms to provide, protect and improve their services, such as, personalizing the content, tailoring and measuring advertisements, and providing a safer and user friendly experience.</p>

				<h5>Refusing Cookies</h5>
				<p>Most browsers give you the option of enabling Cookies by notification of a “pop-up” message that says “Allow” or ”Don’t Allow”. However, blocking Cookies will have a negative impact upon the usability of some websites, as many of the websites rely on the use of Cookies to ensure a smooth and hassle-free running of their systems.</p>

				<p>Browsers such as the Internet Explorer, Firefox or Chrome wholly or partially allow their users to refuse Cookies.</p>

				<p>Most browsers allow you to refuse to accept Cookies. For example:
					<ul>
						<li>Internet Explorer lets you refuse all Cookies by clicking “Tools”, “Internet Options”, “Privacy”, and selecting “Block all Cookies” using the sliding selector;</li>
						<li>Firefox lets you block all Cookies by clicking “Tools”, “Options”, and un-checking “Accept Cookies from sites” in the “Privacy” box.</li>
						<li>Google Chrome lets you adjust your cookie permissions by clicking “Options”, “Under the hood”, Content Settings in the “Privacy” section. Click on the Cookies tab in the Content Settings.</li>
						<li>Safari lets you block Cookies by clicking “Preferences”, selecting the “Privacy” tab and “Block Cookies”.</li>
					</ul>
				</p>

				<p>To find your browser and its Cookie settings, please visit <a href="https://www.aboutCookies.org/how-to-control-Cookies/">https://www.aboutCookies.org/how-to-control-Cookies/</a>.</p>

				<h5>Deleting Cookies</h5>
				<p>You can also delete Cookies already stored on your computer:
					<ul>
						<li>Internet Explorer lets you must manually delete cookie files;</li>
						<li>Firefox lets you delete Cookies by, first ensuring that Cookies are to be deleted when you “clear private data” (this setting can be changed by clicking “Tools”, “Options” and “Settings” in the “Private Data” box) and then clicking “Clear private data” in the “Tools” menu.</li>
						<li>Google Chrome lets you adjust your cookie permissions by clicking “Options”, “Under the hood”, Content Settings in the “Privacy” section. Click on the Cookies tab in the Content Settings.</li>
						<li>Safari lets you delete Cookies by clicking “Preferences”, selecting the “Privacy” tab and “Remove All Website Data”.</li>
					</ul>
				</p>

				<p>To find your browser and its Cookie settings, please visit <a href="https://www.aboutCookies.org/how-to-delete-Cookies/">https://www.aboutCookies.org/how-to-delete-Cookies/</a>.</p>
			</div>
		</div>
	</section>
@endsection