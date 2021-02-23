Drop table if exists  admin;

CREATE TABLE `admin` (
  `admin_name` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `state` enum('main','sub') DEFAULT 'main',
  `username` varchar(200) DEFAULT NULL,
  `admin_password` varchar(60) DEFAULT NULL,
  `login_verified` text,
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` text,
  `transactioncode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO admin VALUES("atomixbd","bashar@excelcobd.com","main","bat24x","2528bf549ed2e62e2054678616c5de93","","1","User,Investment,Plan,Content,Financials,Preferences,Settings,Referral,SubAdmin,Support","21232f297a57a5a743894a0e4a801fc3");
INSERT INTO admin VALUES("","john4apps27@gmail.com","main","SubAdmin","c96850d3fb8cbbb6d1244fb38e7c6e03","","6","User,Investment,Plan,Referral","");



Drop table if exists  admin_commission;

CREATE TABLE `admin_commission` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(10,8) DEFAULT NULL,
  `description` text,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO admin_commission VALUES("1","0.00018000","earning from member withdrawal 2","2017-02-19");
INSERT INTO admin_commission VALUES("2","0.00200000","earning from member withdrawal 8","2017-02-21");
INSERT INTO admin_commission VALUES("3","0.00100000","earning from member withdrawal 8","2017-02-21");
INSERT INTO admin_commission VALUES("4","0.18000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("5","0.00200000","earning from member withdrawal 8","2017-02-22");
INSERT INTO admin_commission VALUES("6","0.00100000","earning from member withdrawal 8","2017-02-22");
INSERT INTO admin_commission VALUES("7","0.00010000","earning from member withdrawal 2","2017-02-22");
INSERT INTO admin_commission VALUES("8","0.00010000","earning from member withdrawal 2","2017-02-22");
INSERT INTO admin_commission VALUES("9","0.00100000","earning from member withdrawal 8","2017-02-22");
INSERT INTO admin_commission VALUES("10","0.20000000","earning from member withdrawal 14","2017-02-22");
INSERT INTO admin_commission VALUES("11","0.00100000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("12","0.00100000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("13","0.00100000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("14","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("15","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("16","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("17","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("18","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("19","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("20","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("21","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("22","0.00200000","earning from member withdrawal 2","2017-02-22");
INSERT INTO admin_commission VALUES("23","0.20000000","earning from member withdrawal 13","2017-02-22");
INSERT INTO admin_commission VALUES("24","0.40000000","earning from member withdrawal 14","2017-02-22");
INSERT INTO admin_commission VALUES("25","0.20000000","earning from member withdrawal 14","2017-02-22");
INSERT INTO admin_commission VALUES("26","0.20000000","earning from member withdrawal 14","2017-02-22");
INSERT INTO admin_commission VALUES("27","0.20000000","earning from member withdrawal 14","2017-02-22");
INSERT INTO admin_commission VALUES("28","0.20000000","earning from member withdrawal 14","2017-02-22");
INSERT INTO admin_commission VALUES("29","0.10000000","earning from member withdrawal 14","2017-02-22");
INSERT INTO admin_commission VALUES("30","0.60000000","earning from member withdrawal 13","2017-02-23");
INSERT INTO admin_commission VALUES("31","0.10000000","earning from member withdrawal 1","2017-02-23");
INSERT INTO admin_commission VALUES("32","0.00200000","earning from member withdrawal 1","2017-02-27");
INSERT INTO admin_commission VALUES("33","1.00000000","earning from member withdrawal 6","2017-02-27");



Drop table if exists  admin_settings;

CREATE TABLE `admin_settings` (
  `set_id` int(11) NOT NULL AUTO_INCREMENT,
  `set_name` varchar(50) DEFAULT NULL,
  `set_value` text,
  PRIMARY KEY (`set_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

INSERT INTO admin_settings VALUES("1","Site Name","Bitcoin Arbitrage Trading");
INSERT INTO admin_settings VALUES("2","Site Moto","");
INSERT INTO admin_settings VALUES("3","Admin Email","support@bat24x.com");
INSERT INTO admin_settings VALUES("4","E-Gold Number","123456");
INSERT INTO admin_settings VALUES("5","E-Gold Pass Pharse","aaaaaaaaaaaaa");
INSERT INTO admin_settings VALUES("6","Minimum Withdraw Amount","0.01");
INSERT INTO admin_settings VALUES("7","Maximum Withdraw Amount","500.00");
INSERT INTO admin_settings VALUES("8","Number of Withdraw Allowed in a Month","30");
INSERT INTO admin_settings VALUES("9","Referral Commission","");
INSERT INTO admin_settings VALUES("10","Int-Gold Number","111111");
INSERT INTO admin_settings VALUES("11","Paypal Number","111111");
INSERT INTO admin_settings VALUES("12","Stormpay","23221");
INSERT INTO admin_settings VALUES("13","E-Bullion Number","234234");
INSERT INTO admin_settings VALUES("14","Money Bookers","234234");
INSERT INTO admin_settings VALUES("15","Admin Withdraw Commission in %","0");
INSERT INTO admin_settings VALUES("16","Uploaded Path","uploadimages");
INSERT INTO admin_settings VALUES("17","Admin Fund Transfer Commission in %","6");
INSERT INTO admin_settings VALUES("18","Authentication Limit","15");
INSERT INTO admin_settings VALUES("19","Meta Keywords","");
INSERT INTO admin_settings VALUES("20","Company Logo","uploadimages/logo.jpg");
INSERT INTO admin_settings VALUES("25","Released Deposit Commission in %","1");
INSERT INTO admin_settings VALUES("27","AlertPay","admin@bat24x.com");
INSERT INTO admin_settings VALUES("28","Liberity reserve","");
INSERT INTO admin_settings VALUES("29","Safe Pay","456456");
INSERT INTO admin_settings VALUES("30","Perfect Money","");
INSERT INTO admin_settings VALUES("31","unique_email","off");
INSERT INTO admin_settings VALUES("32","unique_ip","off");
INSERT INTO admin_settings VALUES("33","Referral Status","on");
INSERT INTO admin_settings VALUES("34","ins_withdraw_min","");
INSERT INTO admin_settings VALUES("35","ins_withdraw_max","");
INSERT INTO admin_settings VALUES("36","googleanalytical","");
INSERT INTO admin_settings VALUES("37","siteurl","http://bat24x.com");
INSERT INTO admin_settings VALUES("40","withdrawal_type","1");
INSERT INTO admin_settings VALUES("41","Partner Admin Mail Id","");
INSERT INTO admin_settings VALUES("42","RepresentativeAdmin Mail Id","admin@bat24x.com");
INSERT INTO admin_settings VALUES("43","Representative commission","");
INSERT INTO admin_settings VALUES("44","set_value","uploadimages/20170127190310533Bitcoin-logo wh.png");
INSERT INTO admin_settings VALUES("45","footer","Copyright Bitcoin Arbitrage Trading 2017");
INSERT INTO admin_settings VALUES("46","set_value","banner01.png");
INSERT INTO admin_settings VALUES("47","Calculator","on");
INSERT INTO admin_settings VALUES("48","Payout","on");
INSERT INTO admin_settings VALUES("49","Last Invest","on");
INSERT INTO admin_settings VALUES("50","Top Invest","on");
INSERT INTO admin_settings VALUES("51","business_day","on");
INSERT INTO admin_settings VALUES("52","started","on");
INSERT INTO admin_settings VALUES("53","runningdays","on");
INSERT INTO admin_settings VALUES("54","totaldeposited","on");
INSERT INTO admin_settings VALUES("55","totalwithdrawal","on");
INSERT INTO admin_settings VALUES("56","todaydeposit","on");
INSERT INTO admin_settings VALUES("57","todaywithdraw","on");
INSERT INTO admin_settings VALUES("58","totalmembers","on");
INSERT INTO admin_settings VALUES("59","activemembers","on");
INSERT INTO admin_settings VALUES("60","newmembers","on");
INSERT INTO admin_settings VALUES("61","friend","I just know you would want to see\nit too, so check it out.");
INSERT INTO admin_settings VALUES("62","friend","I just found out about something\npretty cool, and you were the first person I thought of when I saw it.");
INSERT INTO admin_settings VALUES("63","statistics","on");
INSERT INTO admin_settings VALUES("64","sitestatus","on");
INSERT INTO admin_settings VALUES("65","siteofflinemessage","Site is in Offline");
INSERT INTO admin_settings VALUES("66","userlogin","on");
INSERT INTO admin_settings VALUES("67","userreg","on");
INSERT INTO admin_settings VALUES("68","keyboard","off");
INSERT INTO admin_settings VALUES("69","captcha","on");
INSERT INTO admin_settings VALUES("70","emailactivation","off");
INSERT INTO admin_settings VALUES("71","passwordlength","6");
INSERT INTO admin_settings VALUES("72","username","on");
INSERT INTO admin_settings VALUES("73","release_comm","15");
INSERT INTO admin_settings VALUES("74","transactionwithdraw","on");
INSERT INTO admin_settings VALUES("75","mailnotification","on");
INSERT INTO admin_settings VALUES("76","compundrange","30");
INSERT INTO admin_settings VALUES("77","compundrange1","50");



Drop table if exists  advertisement_banners;

CREATE TABLE `advertisement_banners` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_url` varchar(100) DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `payment_thro` int(11) DEFAULT NULL,
  `status` enum('new','approved','suspended') DEFAULT 'new',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO advertisement_banners VALUES("2","http://www.hyip.com/images/10.03K(468x60)-2.gif","http://www.hyip.com","4","2","approved");



Drop table if exists  advertisement_plans;

CREATE TABLE `advertisement_plans` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_name` varchar(100) DEFAULT NULL,
  `plan_description` text,
  `cost` double DEFAULT NULL,
  `clicks_assured` int(11) DEFAULT NULL,
  PRIMARY KEY (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO advertisement_plans VALUES("3","asfasf","asfasdf","45","345");



Drop table if exists  alerts_table;

CREATE TABLE `alerts_table` (
  `alerts_id` int(40) NOT NULL AUTO_INCREMENT,
  `alerts_details` varchar(100) DEFAULT NULL,
  `alerts_type` varchar(100) DEFAULT NULL,
  `alerts_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`alerts_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




Drop table if exists  cms_table;

CREATE TABLE `cms_table` (
  `cms_id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8,
  PRIMARY KEY (`cms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

INSERT INTO cms_table VALUES("1","Home","&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;abt&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;&lt;br class=&quot;col-xs-4 text-center&quot; /&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;abt&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;&amp;nbsp;ビットコイン&lt;/span&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;p&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quam arcu, dignissim vitae neque&lt;/span&gt;&lt;/p&gt;\n&lt;div id=&quot;stcpDiv&quot; style=&quot;position: absolute; top: -1999px; left: -1988px;&quot;&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;গাইবান্ধা-১ (সুন্দরগঞ্জ) আসনের আওয়ামী লীগ দলীয়&lt;/span&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;abt&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;abt&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;&lt;br /&gt;\n&lt;div id=&quot;stcpDiv&quot; style=&quot;position: absolute; top: -1999px; left: -1988px;&quot;&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;গাইবান্ধা-১ (সুন্দরগঞ্জ) আসনের আওয়ামী লীগ দলীয়&lt;/span&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;");
INSERT INTO cms_table VALUES("2","About Us","&lt;p style=&quot;text-align: justify;&quot;&gt;Bitcoin Arbitrage Trade invests in Bitcoin (BTC) and fiat currencies (ex: US Dollars) allowing for not only excellent global liquidity, but also a safe trading market. Due to price differences across different exchanges Bitcoin Arbitrage Trade can purchase Bitcoins in lower priced markets and sell them in higher priced markets, automatically and simultaneously. Next, Bitcoin Arbitrage Trade waits for a favorable price reversal to execute a trade in the reverse order of the previous trade, or, according to market conditions&amp;hellip;Our technology ensures this process is continuous and that every transaction is profitable.&lt;/p&gt;\n&lt;p&gt;&lt;em&gt;&lt;/em&gt;&lt;img style=&quot;display: block; margin-left: 190px; margin-right: auto;&quot; src=&quot;images/Profit-follo.png&quot; alt=&quot;&quot; /&gt;&lt;/p&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;Risk&amp;nbsp;Management&lt;br /&gt;Bitcoin Arbitrage Trade purchases in Bitcoins, but funds are saved in two forms: BTC and USD (or other fiat currencies.) At the end of each trading day before dividends are awarded to members the Fund ensures two things: an increase in the number of BTC and an equal increase in USD.&lt;br /&gt;Fund (BTC) members will experience changes in the exchange rate of BTC:USD, but like holding Bitcoins in a wallet the amount of Bitcoins are 100% ensured to remain the same and can be withdrawn at any time. The benefit of investing in the Fund (BTC) is the daily Bitcoin dividends paid to members.&lt;br /&gt;Fund (USD) members don&#039;t experience any currency exchange risks (USD:BTC.) The moment a member purchases Fund (USD) shares the shares&#039; total value is calculated at the current exchange rate and will be the same exchange rate used on redemption of the shares. Regardless of exchange rate changes, the total assets of Fund (USD) members do not change except the increase from daily USD dividends. In regards to these members, Bitcoins held by Fund (BTC) members are the arbitrage tools of Fund (USD) members, and vice versa.&lt;br /&gt;At the time of redemption, Fund (USD) members receive their original share value denominated in BTC, which can be immediately converted into USD for the full USD value of the original shares.&lt;br /&gt;In addition, we have chosen to use large-scale exchanges that adhere to international standards to ensure funds are allocated safely.&lt;br /&gt;How We Maintain Yields&lt;br /&gt;First, Bitcoin assets and USD assets are maintained at a certain proportion to ensure maximization of arbitrage earnings. By controlling the scale of the two Funds we can keep our arbitrage operation within a specific scope.&lt;br /&gt;Second, according to the market&amp;rsquo;s current liquidity we allow members to invest in the Fund, controlling the Fund&amp;rsquo;s total assets in order to allow us to maintain a relatively stable earnings rate. Therefore, after the Fund reaches a certain asset level there may be a period of time where no more additional investment in the Fund is allowed. When a member redeems their shares then other members can purchase shares up to the amount redeemed. Furthermore, if total market liquidity increases, the Funds earnings base increase which allows new opportunities for members to invest.&lt;br /&gt;The Bitcoin Arbitrage Trade algorithm is constantly being improved to increase yields: the Fund&amp;rsquo;s algorithm sets a minimum rate of return for each transaction to increase the overall yield of the fund.&lt;/p&gt;");
INSERT INTO cms_table VALUES("6","Contact us","");
INSERT INTO cms_table VALUES("7","Terms &amp; conditions","&lt;p&gt;??????&lt;/p&gt;");
INSERT INTO cms_table VALUES("8","Privacy Policy","&lt;p&gt;bat24x.com Privacy Policy&lt;/p&gt;\n&lt;p&gt;This privacy policy has been compiled to better serve those who are concerned with how their &#039;Personally identifiable information&#039; (PII) is being used online. PII, as used in privacy law and information security, is information that can be used on its own or with other information to identify, contact, or locate a single person, or to identify an individual in context. Please read our privacy policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.&lt;/p&gt;\n&lt;p&gt;What personal information do we collect from the people that visit our blog, website or app?&lt;/p&gt;\n&lt;p&gt;When ordering or registering on our site, as appropriate, you may be asked to enter your email address or other details to help you with your experience.&lt;/p&gt;\n&lt;p&gt;When do we collect information?&lt;/p&gt;\n&lt;p&gt;We collect information from you when you subscribe to a newsletter, fill out a form or enter information on our site.&lt;/p&gt;\n&lt;p&gt;How do we use your information?&lt;/p&gt;\n&lt;p&gt;We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;To send periodic emails regarding your order or other products and services.&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;How do we protect visitor information?&lt;/p&gt;\n&lt;p&gt;We do not use vulnerability scanning and/or scanning to PCI standards.&lt;br /&gt; We do not use Malware Scanning.&lt;br /&gt; We do not use an SSL certificate&lt;/p&gt;\n&lt;p&gt;Do we use &#039;cookies&#039;?&lt;/p&gt;\n&lt;p&gt;Yes. Cookies are small files that a site or its service provider transfers to your computer&#039;s hard drive through your Web browser (if you allow) that enables the site&#039;s or service provider&#039;s systems to recognize your browser and capture and remember certain information. For instance, we use cookies to help us remember and process the items in your shopping cart. They are also used to help us understand your preferences based on previous or current site activity, which enables us to provide you with improved services. We also use cookies to help us compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.&lt;/p&gt;\n&lt;p&gt;We use cookies to:&lt;/p&gt;\n&lt;ul&gt;\n&lt;li&gt;Understand and save user&#039;s preferences for future visits.&lt;/li&gt;\n&lt;li&gt;Keep track of advertisements.&lt;/li&gt;\n&lt;li&gt;Compile aggregate data about site traffic and site interactions in order to offer better site experiences and tools in the future. We may also use trusted third party services that track this information on our behalf&lt;/li&gt;\n&lt;/ul&gt;\n&lt;p&gt;You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser (like Internet Explorer) settings. Each browser is a little different, so look at your browser&#039;s Help menu to learn the correct way to modify your cookies.&lt;/p&gt;\n&lt;p&gt;If users disable cookies in their browser:&lt;/p&gt;\n&lt;p&gt;If you disable cookies off, some features will be disabled It will turn off some of the features that make your site experience more efficient and some of our services will not function properly.&lt;/p&gt;\n&lt;p&gt;Third Party Disclosure&lt;/p&gt;\n&lt;p&gt;We sell, trade, or otherwise transfer to outside parties any form or online contact identifier email, name of chat account etc. We engage in this practice because to offer our email list for sale in the event we&#039;re going to sell the website.&lt;/p&gt;\n&lt;p&gt;Third party links&lt;/p&gt;\n&lt;p&gt;Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.&lt;/p&gt;\n&lt;p&gt;Contacting Us&lt;/p&gt;\n&lt;p&gt;If there are any questions regarding this privacy policy you may contact us using the information below.&lt;/p&gt;\n&lt;p&gt;bat24x.com&lt;br /&gt; support@bat24x.com&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;");
INSERT INTO cms_table VALUES("11","Home Page Offer ","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
INSERT INTO cms_table VALUES("12","Promotion Banner Management","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
INSERT INTO cms_table VALUES("13","Investment","&lt;p&gt;????&lt;/p&gt;");
INSERT INTO cms_table VALUES("25","Risk Disclosure Statements","Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum");
INSERT INTO cms_table VALUES("26","Money Laundering","&lt;p&gt;BAT24X.COM: It is the policy of the firm to prohibit and actively prevent money laundering and any activity that facilitates money laundering or the funding of terrorist or criminal activities by complying with all applicable requirements under the Bank Secrecy Act (BSA) and its implementing regulations.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Money laundering is generally defined as engaging in acts designed to conceal or disguise the true origins of criminally derived proceeds so that the proceeds appear to have derived from legitimate origins or constitute legitimate assets. Generally, money laundering occurs in three stages. Cash first enters the financial system at the &quot;placement&quot; stage, where the cash generated from criminal activities is converted into monetary instruments, such as money orders or traveler&#039;s checks, or deposited into accounts at financial institutions. At the &quot;layering&quot; stage, the funds are transferred or moved into other accounts or other financial institutions to further separate the money from its criminal origin. At the &quot;integration&quot; stage, the funds are reintroduced into the economy and used to purchase legitimate assets or to fund other criminal activities or legitimate businesses.&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Terrorist financing may not involve the proceeds of criminal conduct, but rather an attempt to conceal either the origin of the funds or their intended use, which could be for criminal purposes. Legitimate sources of funds are a key difference between terrorist financiers and traditional criminal organizations. In addition to charitable donations, legitimate sources include foreign government sponsors, business ownership and personal employment. Although the motivation differs between traditional money launderers and terrorist financiers, the actual methods used to fund terrorist operations can be the same as or similar to methods used by other criminals to launder funds. Funding for terrorist attacks does not always require large sums of money and the associated transactions may not be complex.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Our AML policies, procedures and internal controls are designed to ensure compliance with all applicable BSA regulations and FINRA rules and will be reviewed and updated on a regular basis to ensure appropriate policies, procedures and internal controls are in place to account for both changes in regulations and changes in our business.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;");
INSERT INTO cms_table VALUES("31","Footer","Footer content");
INSERT INTO cms_table VALUES("32","Terms","&lt;p&gt;Before you register an account on the site submit the website (the &quot;Site&quot;, &quot;website&quot;) and become an investor Bitcoin Arbitrage Trading (the &quot;Company&quot;), refer to the following Terms and Conditions Agreement (the &quot;Terms&quot;).&lt;/p&gt;\n&lt;p&gt;The Rules set out the general procedure for interaction between the rights and obligations of the investor (the &quot;Investor&quot;) and the Company (hereinafter, if necessary, the content, - &quot;Parties&quot;, &quot;Party&quot;).&lt;/p&gt;\n&lt;p&gt;The rules are accepted and respected by the parties a priori.&lt;/p&gt;\n&lt;p&gt;In case of rejection of any item of the Rules, disagreement with the general doctrine of the Rules or any other differences of opinion, the user is obliged to stop the account registration and leave this section of the site.&lt;/p&gt;\n&lt;p&gt;Terms are considered accepted by the Investor at the fact of registration of the investor account on the Site.&lt;/p&gt;\n&lt;p style=&quot;text-align: left;&quot;&gt;&amp;nbsp;1. General Provisions&lt;/p&gt;\n&lt;p style=&quot;text-align: left; margin-top: -17px; margin-left: 30px;&quot;&gt;1. To register account on the Company`s website and get the status of &quot;investor&quot; can only person who has reached the age of&amp;nbsp; 18. In any case, the investor confirms that he is not less than 18 years old. &lt;br /&gt; 2. All transactions are made by the Parties in the &quot;private transaction&quot; format. The Parties confirm the complete confidentiality of any transaction and any interaction in the framework of the Regulation.&amp;nbsp;&lt;/p&gt;\n&lt;p style=&quot;text-align: left; margin-top: -14px;&quot;&gt;2. The rights and obligations of the Company&lt;br /&gt;3. The company is committed to:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. Use only the investment funds for the conduct of real activity on the Forex market&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp; &amp;nbsp; 2. Ensure the safety of investors funds&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp; &amp;nbsp; 3. To make payments on time in the framework of partnership and investment proposals&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 4. Store the personal information of the Investor and the details of financial transactions in a strictly confidential environment.&lt;br /&gt; 4. The Company is not responsible for any technical malfunctions of electronic payment systems.&lt;br /&gt;5. The Company is not responsible for erroneous financial transactions that were a result of investor incorrect billing&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;br /&gt; 6. The rights and obligations of the Investor&lt;br /&gt;7. The investor is committed to:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. Provide only accurate and correct personal data&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 2. Use the Site of the Company solely for the purpose of investment&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 3. Comply with these rules.&lt;br /&gt; 8. The investor has the right to:&lt;br /&gt;9. Make a profit within the framework of the proposal of the Company&lt;br /&gt;10. Obtain advice and assistance in support of the Company&lt;br /&gt;11. Use the promotional materials for the invitation of new partners.&lt;br /&gt; 12. Provision of the risks&lt;br /&gt;13. Company guarantees the performance of its obligations under and in accordance with these Rules.&lt;br /&gt; 14. Copyright:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. All content posted on the company`s website is protected by copyright law.&lt;br /&gt; 15. Force majeure:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. The Company may suspend performance of its obligations in case of force majeure at any of the Parties for the period necessary to complete stop action and/or the impact of these force majeure.&lt;br /&gt; 16. Changes and additions:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. These Rules may be amended by the Company, made additions and/or updates at any time, without notice.&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 2. The investor undertakes to keep track of all changes to these Rules.&lt;br /&gt; 17. Termination, suspension of cooperation:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. In case of infringement and/or ignoring these Rules by an investor, the Company may suspend or terminate cooperation with the investor unilaterally, without any prior notice.&lt;br /&gt; 18.&amp;nbsp; Disputes settlement:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. Any dispute will be settled by the parties through the negotiation process, without the involvement of third parties, up to the full dispute settlement.&lt;/p&gt;");
INSERT INTO cms_table VALUES("33","Home Bottom","&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a href=&quot;aboutus.php&quot;&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;");
INSERT INTO cms_table VALUES("34","Features","&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;div class=&quot;col-lg-4&quot;&gt;\n&lt;div class=&quot;ftur&quot;&gt;\n&lt;div class=&quot;row&quot;&gt;\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\n&lt;div class=&quot;col-xs-8&quot;&gt;\n&lt;h3&gt;Heading Here&lt;/h3&gt;\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;\n&lt;/div&gt;");



Drop table if exists  contentmodify;

CREATE TABLE `contentmodify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(20) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO contentmodify VALUES("1","About Us","Add Content Here");
INSERT INTO contentmodify VALUES("2","Terms and Conditions","Add Content Here");
INSERT INTO contentmodify VALUES("3","Welcome","Add Content Here");
INSERT INTO contentmodify VALUES("4","How It Works","Add Content Here");
INSERT INTO contentmodify VALUES("5","Investors Info","Add Content Here");
INSERT INTO contentmodify VALUES("6","Art","Add Content Here");
INSERT INTO contentmodify VALUES("7","Voices","Add Content Here");
INSERT INTO contentmodify VALUES("8","Welcome head","Welcome to SITE");
INSERT INTO contentmodify VALUES("9","Welcome Image","uploadimages/imgg1.jpg");



Drop table if exists  country_master;

CREATE TABLE `country_master` (
  `country_id` int(20) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) DEFAULT NULL,
  `dial_code` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=239 DEFAULT CHARSET=latin1;

INSERT INTO country_master VALUES("1","Afghanistan","+93");
INSERT INTO country_master VALUES("2","Albania","+355");
INSERT INTO country_master VALUES("3","Algeria","+213");
INSERT INTO country_master VALUES("4","American Samoa","+684");
INSERT INTO country_master VALUES("5","Andorra","+376");
INSERT INTO country_master VALUES("6","Angola","+244");
INSERT INTO country_master VALUES("7","Anguilla","+1-264");
INSERT INTO country_master VALUES("8","Antarctica","+672");
INSERT INTO country_master VALUES("9","Antigua And Barbuda","+1-268");
INSERT INTO country_master VALUES("10","Argentina","+54");
INSERT INTO country_master VALUES("11","Armenia","+374");
INSERT INTO country_master VALUES("12","Aruba","+297");
INSERT INTO country_master VALUES("13","Australia","+61");
INSERT INTO country_master VALUES("14","Austria","+43");
INSERT INTO country_master VALUES("15","Azerbaijan","+994");
INSERT INTO country_master VALUES("16","Bahamas","+1-242");
INSERT INTO country_master VALUES("17","Bahrain","+973");
INSERT INTO country_master VALUES("18","Bangladesh","+880");
INSERT INTO country_master VALUES("19","Barbados","+1-246");
INSERT INTO country_master VALUES("20","Belarus","+375");
INSERT INTO country_master VALUES("21","Belgium","+32");
INSERT INTO country_master VALUES("22","Belize","+501");
INSERT INTO country_master VALUES("23","Benin","+229");
INSERT INTO country_master VALUES("24","Bermuda","+1-441");
INSERT INTO country_master VALUES("25","Bhutan","+975");
INSERT INTO country_master VALUES("26","Bolivia","+591");
INSERT INTO country_master VALUES("27","Bosnia and Herzegovina","+387");
INSERT INTO country_master VALUES("28","Botswana","+267");
INSERT INTO country_master VALUES("29","Bouvet Island","");
INSERT INTO country_master VALUES("30","Brazil","+55");
INSERT INTO country_master VALUES("31","British Indian Ocean Territory","");
INSERT INTO country_master VALUES("32","Brunei","+673");
INSERT INTO country_master VALUES("33","Bulgaria","+359");
INSERT INTO country_master VALUES("34","Burkina Faso","+226");
INSERT INTO country_master VALUES("35","Burundi","+257");
INSERT INTO country_master VALUES("36","Cambodia","+855");
INSERT INTO country_master VALUES("37","Cameroon","+237");
INSERT INTO country_master VALUES("38","Canada","+1");
INSERT INTO country_master VALUES("39","Cape verde","+238");
INSERT INTO country_master VALUES("40","Cayman Islands","+1-345");
INSERT INTO country_master VALUES("41","Central African Republic","+236");
INSERT INTO country_master VALUES("42","Chad","+235");
INSERT INTO country_master VALUES("43","Chile","+56");
INSERT INTO country_master VALUES("44","China","+86");
INSERT INTO country_master VALUES("45","Christmas Island","+61");
INSERT INTO country_master VALUES("46","Cocos (keeling) Islands","+61");
INSERT INTO country_master VALUES("47","Colombia","+57");
INSERT INTO country_master VALUES("48","Comoros","+269");
INSERT INTO country_master VALUES("49","Congo","+242");
INSERT INTO country_master VALUES("50","Cook Islands","+682");
INSERT INTO country_master VALUES("51","Costa Rica","+506");
INSERT INTO country_master VALUES("52","Croatia","+385");
INSERT INTO country_master VALUES("53","Cuba","+53");
INSERT INTO country_master VALUES("54","Cyprus","+357");
INSERT INTO country_master VALUES("55","Czech Republic","+420");
INSERT INTO country_master VALUES("56","Dem Rep of Congo (Zaire)","+243");
INSERT INTO country_master VALUES("57","Denmark","+45");
INSERT INTO country_master VALUES("58","Djibouti","+253");
INSERT INTO country_master VALUES("59","Dominica","+1-767");
INSERT INTO country_master VALUES("60","Dominican Republic","+1-809");
INSERT INTO country_master VALUES("61","East Timor","+670");
INSERT INTO country_master VALUES("62","Ecuador","+593");
INSERT INTO country_master VALUES("63","Egypt","+20");
INSERT INTO country_master VALUES("64","El Salvador","+503");
INSERT INTO country_master VALUES("65","England","+689");
INSERT INTO country_master VALUES("66","Equatorial Guinea","+240");
INSERT INTO country_master VALUES("67","Eritrea","+291");
INSERT INTO country_master VALUES("68","Estonia","+372");
INSERT INTO country_master VALUES("69","Ethiopia","+251");
INSERT INTO country_master VALUES("70","Falkland Islands","+500");
INSERT INTO country_master VALUES("71","Faroe Islands","+298");
INSERT INTO country_master VALUES("72","Fiji","+679");
INSERT INTO country_master VALUES("73","Finland","+358");
INSERT INTO country_master VALUES("74","France","+33");
INSERT INTO country_master VALUES("75","French Guiana","+594");
INSERT INTO country_master VALUES("76","French Polynesia","+689");
INSERT INTO country_master VALUES("77","French Southern Territories","");
INSERT INTO country_master VALUES("78","Gabon","+241");
INSERT INTO country_master VALUES("79","Gambia","+220");
INSERT INTO country_master VALUES("80","Georgia","+995");
INSERT INTO country_master VALUES("81","Germany","+49");
INSERT INTO country_master VALUES("82","Ghana","+233");
INSERT INTO country_master VALUES("83","Gibraltar","+350");
INSERT INTO country_master VALUES("84","Greece","+30");
INSERT INTO country_master VALUES("85","Greenland","+299");
INSERT INTO country_master VALUES("86","Grenada","+1-473");
INSERT INTO country_master VALUES("87","Guadeloupe","+590");
INSERT INTO country_master VALUES("88","Guam","+1-671");
INSERT INTO country_master VALUES("89","Guatemala","+502");
INSERT INTO country_master VALUES("90","Guinea","+224");
INSERT INTO country_master VALUES("91","Guinea-Bissau","+245");
INSERT INTO country_master VALUES("92","Guyana","+592");
INSERT INTO country_master VALUES("93","Haiti","+509");
INSERT INTO country_master VALUES("94","Heard and McDonald Islands","");
INSERT INTO country_master VALUES("95","Honduras","+504");
INSERT INTO country_master VALUES("96","Hungary","+36");
INSERT INTO country_master VALUES("97","Iceland","+354");
INSERT INTO country_master VALUES("98","India","+91");
INSERT INTO country_master VALUES("99","Indonesia","+62");
INSERT INTO country_master VALUES("100","Iran","+98");
INSERT INTO country_master VALUES("101","Iraq","+964");
INSERT INTO country_master VALUES("102","Ireland","+353");
INSERT INTO country_master VALUES("103","Israel","+972");
INSERT INTO country_master VALUES("104","Italy","+39");
INSERT INTO country_master VALUES("105","Ivory Coast","+225");
INSERT INTO country_master VALUES("106","Jamaica","+1-876");
INSERT INTO country_master VALUES("107","Japan","+81");
INSERT INTO country_master VALUES("108","Jordan","+962");
INSERT INTO country_master VALUES("109","Kazakhstan","+7");
INSERT INTO country_master VALUES("110","Kenya","+254");
INSERT INTO country_master VALUES("111","Kiribati","+686");
INSERT INTO country_master VALUES("112","Korea","+850");
INSERT INTO country_master VALUES("113","Korea (D.P.R.)","+82");
INSERT INTO country_master VALUES("114","Kuwait","+965");
INSERT INTO country_master VALUES("115","Kyrgyzstan","+996");
INSERT INTO country_master VALUES("116","Lao","+856");
INSERT INTO country_master VALUES("117","Latvia","+371");
INSERT INTO country_master VALUES("118","Lebanon","+961");
INSERT INTO country_master VALUES("119","Lesotho","+266");
INSERT INTO country_master VALUES("120","Liberia","+231");
INSERT INTO country_master VALUES("121","Libya","+218");
INSERT INTO country_master VALUES("122","Liechtenstein","+423");
INSERT INTO country_master VALUES("123","Lithuania","+370");
INSERT INTO country_master VALUES("124","Luxembourg","+352");
INSERT INTO country_master VALUES("125","Macedonia","+389");
INSERT INTO country_master VALUES("126","Madagascar","+261");
INSERT INTO country_master VALUES("127","Malawi","+265");
INSERT INTO country_master VALUES("128","Malaysia","+60");
INSERT INTO country_master VALUES("129","Maldives","+960");
INSERT INTO country_master VALUES("130","Mali","+223");
INSERT INTO country_master VALUES("131","Malta","+356");
INSERT INTO country_master VALUES("132","Marshall Islands","+692");
INSERT INTO country_master VALUES("133","Martinique","+596");
INSERT INTO country_master VALUES("134","Mauritania","+222");
INSERT INTO country_master VALUES("135","Mauritius","+230");
INSERT INTO country_master VALUES("136","Mayotte","+269");
INSERT INTO country_master VALUES("137","Mexico","+52");
INSERT INTO country_master VALUES("138","Micronesia","+691");
INSERT INTO country_master VALUES("139","Moldova","+373");
INSERT INTO country_master VALUES("140","Monaco","+377");
INSERT INTO country_master VALUES("141","Mongolia","+976");
INSERT INTO country_master VALUES("142","Montserrat","+1-664");
INSERT INTO country_master VALUES("143","Morocco","+212");
INSERT INTO country_master VALUES("144","Mozambique","+258");
INSERT INTO country_master VALUES("145","Myanmar","+95");
INSERT INTO country_master VALUES("146","Namibia","+264");
INSERT INTO country_master VALUES("147","Nauru","+674");
INSERT INTO country_master VALUES("148","Nepal","+977");
INSERT INTO country_master VALUES("149","Netherlands","+31");
INSERT INTO country_master VALUES("153","Nicaragua","+505");
INSERT INTO country_master VALUES("154","Niger","+227");
INSERT INTO country_master VALUES("155","Nigeria","+234");
INSERT INTO country_master VALUES("156","Niue","+683");
INSERT INTO country_master VALUES("157","Norfolk Island","+672");
INSERT INTO country_master VALUES("158","Northern Mariana Islands","+1-670");
INSERT INTO country_master VALUES("159","Norway","+47");
INSERT INTO country_master VALUES("160","Oman","+968");
INSERT INTO country_master VALUES("161","Other","");
INSERT INTO country_master VALUES("162","Pakistan","+92");
INSERT INTO country_master VALUES("163","Palau","+680");
INSERT INTO country_master VALUES("164","Palestinian Territory, Occupie","+970");
INSERT INTO country_master VALUES("165","Panama","+507");
INSERT INTO country_master VALUES("166","Papua new Guinea","+675");
INSERT INTO country_master VALUES("167","Paraguay","+595");
INSERT INTO country_master VALUES("168","Peru","+51");
INSERT INTO country_master VALUES("169","Philippines","+63");
INSERT INTO country_master VALUES("170","Pitcairn Island","+872");
INSERT INTO country_master VALUES("171","Poland","+48");
INSERT INTO country_master VALUES("172","Portugal","+351");
INSERT INTO country_master VALUES("173","Puerto Rico","+1-787");
INSERT INTO country_master VALUES("174","Qatar","+974");
INSERT INTO country_master VALUES("175","Reunion","+262");
INSERT INTO country_master VALUES("176","Romania","+40");
INSERT INTO country_master VALUES("177","Russia","+998");
INSERT INTO country_master VALUES("178","Rwanda","+250");
INSERT INTO country_master VALUES("179","Saint Kitts And Nevis","+1-869");
INSERT INTO country_master VALUES("180","Saint Lucia","+1-758");
INSERT INTO country_master VALUES("181","Saint Vincent And The Grenadin","+1-784");
INSERT INTO country_master VALUES("182","Samoa","+685");
INSERT INTO country_master VALUES("183","San Marino","+378");
INSERT INTO country_master VALUES("184","Sao Tome and Principe","+239");
INSERT INTO country_master VALUES("185","Saudi Arabia","+966");
INSERT INTO country_master VALUES("186","Scotland","+44");
INSERT INTO country_master VALUES("187","Senegal","+221");
INSERT INTO country_master VALUES("188","Seychelles","+248");
INSERT INTO country_master VALUES("189","Sierra Leone","+232");
INSERT INTO country_master VALUES("190","Singapore","+65");
INSERT INTO country_master VALUES("191","Slovak Republic","+421");
INSERT INTO country_master VALUES("192","Slovenia","+386");
INSERT INTO country_master VALUES("193","Solomon Islands","+677");
INSERT INTO country_master VALUES("194","Somalia","+252");
INSERT INTO country_master VALUES("195","South Africa","+27");
INSERT INTO country_master VALUES("196","South Georgia, Sth Sandwich Islands","");
INSERT INTO country_master VALUES("197","Spain","+34");
INSERT INTO country_master VALUES("198","Sri Lanka","+94");
INSERT INTO country_master VALUES("199","St Helena","+290");
INSERT INTO country_master VALUES("200","St Pierre and Miquelon","+508");
INSERT INTO country_master VALUES("201","Sudan","+249");
INSERT INTO country_master VALUES("202","Suriname","+597");
INSERT INTO country_master VALUES("203","Svalbard And Jan Mayen Islands","");
INSERT INTO country_master VALUES("204","Swaziland","+268");
INSERT INTO country_master VALUES("205","Sweden","+46");
INSERT INTO country_master VALUES("206","Switzerland","+41");
INSERT INTO country_master VALUES("207","Syria","+963");
INSERT INTO country_master VALUES("208","Taiwan","+886");
INSERT INTO country_master VALUES("209","Tikistan","+992");
INSERT INTO country_master VALUES("210","Tanzania","+255");
INSERT INTO country_master VALUES("211","Thailand","+66");
INSERT INTO country_master VALUES("212","Togo","+228");
INSERT INTO country_master VALUES("213","Tokelau","+690");
INSERT INTO country_master VALUES("214","Tonga","+676");
INSERT INTO country_master VALUES("215","Trinidad And Tobago","+1-868");
INSERT INTO country_master VALUES("216","Tunisia","+216");
INSERT INTO country_master VALUES("217","Turkey","+90");
INSERT INTO country_master VALUES("218","Turkmenistan","+993");
INSERT INTO country_master VALUES("219","Turks And Caicos Islands","+1-649");
INSERT INTO country_master VALUES("220","Tuvalu","+688");
INSERT INTO country_master VALUES("221","Uganda","+256");
INSERT INTO country_master VALUES("222","Ukraine","+380");
INSERT INTO country_master VALUES("223","United Arab Emirates","+971");
INSERT INTO country_master VALUES("224","United States","+1");
INSERT INTO country_master VALUES("225","Uruguay","+598");
INSERT INTO country_master VALUES("226","Uzbekistan","+998");
INSERT INTO country_master VALUES("227","Vanuatu","+678");
INSERT INTO country_master VALUES("228","Vatican City State (Holy See)","+39");
INSERT INTO country_master VALUES("229","Venezuela","+58");
INSERT INTO country_master VALUES("230","Vietnam","+84");
INSERT INTO country_master VALUES("231","Virgin Islands (British)","+1");
INSERT INTO country_master VALUES("232","Virgin Islands (US)","+1-340");
INSERT INTO country_master VALUES("233","Wales","+44");
INSERT INTO country_master VALUES("234","Wallis And Futuna Islands","+681");
INSERT INTO country_master VALUES("235","Western Sahara","+685");
INSERT INTO country_master VALUES("236","Yemen","+967");
INSERT INTO country_master VALUES("237","Zambia","+260");
INSERT INTO country_master VALUES("238","Zimbabwe","+263");



Drop table if exists  css;

CREATE TABLE `css` (
  `css_id` int(4) NOT NULL AUTO_INCREMENT,
  `css_name` varchar(200) DEFAULT NULL,
  `css_path` varchar(240) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive',
  PRIMARY KEY (`css_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO css VALUES("1","Normal","style/style.css","active");
INSERT INTO css VALUES("2","Green","style/green.css","inactive");
INSERT INTO css VALUES("3","Brown","style/brown.css","inactive");
INSERT INTO css VALUES("4","Red","style/red.css","inactive");
INSERT INTO css VALUES("5","Orange","style/orange.css","inactive");
INSERT INTO css VALUES("6","Dark Green","style/dgreen.css","inactive");
INSERT INTO css VALUES("7","Yellow","style/yellow.css","inactive");
INSERT INTO css VALUES("8","Bluish","style/bluish.css","inactive");
INSERT INTO css VALUES("9","Lightblue","style/lightblue.css","inactive");
INSERT INTO css VALUES("10","Violet","style/violet.css","inactive");



Drop table if exists  daily_interest;

CREATE TABLE `daily_interest` (
  `daily_interest_id` int(40) NOT NULL AUTO_INCREMENT,
  `plan_id` int(40) DEFAULT NULL,
  `interest` double(40,8) DEFAULT NULL,
  `change_date` date DEFAULT NULL,
  PRIMARY KEY (`daily_interest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  demo_account;

CREATE TABLE `demo_account` (
  `demo_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address1` varchar(200) DEFAULT NULL,
  `address2` varchar(200) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(30) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `hphone` varchar(30) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `cust_user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `cust_id` varchar(100) DEFAULT NULL,
  `money_owner_id` varchar(100) DEFAULT NULL,
  `acct_id` varchar(100) DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`demo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  deposit;

CREATE TABLE `deposit` (
  `deposit_id` int(20) NOT NULL AUTO_INCREMENT,
  `member_id` int(20) DEFAULT NULL,
  `plan_id` int(20) DEFAULT NULL,
  `amount` double(30,8) DEFAULT NULL,
  `compound_amount` double(30,8) DEFAULT NULL,
  `invest_date` datetime DEFAULT NULL,
  `maturity_date` date DEFAULT NULL,
  `status` enum('new','active','matured','released') DEFAULT 'new',
  `intrest_alloted` enum('yes','no') DEFAULT 'no',
  `payment_thro` int(11) DEFAULT NULL,
  `intrest_earned` double(30,8) DEFAULT NULL,
  `intrest_earned_date` date DEFAULT NULL,
  `compound_rate` int(30) DEFAULT NULL,
  `transaction_id` text,
  `cron_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`deposit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

INSERT INTO deposit VALUES("1","1","7","10.00000000","10.00000000","2017-02-23 07:31:04","2017-02-24","matured","no","38","","","","DEP6997686","2017-02-24 00:00:00");
INSERT INTO deposit VALUES("2","2","5","20.00000000","20.00000000","2017-02-23 07:40:34","2017-02-24","matured","no","38","","","","DEP2695023","2017-02-24 00:00:00");
INSERT INTO deposit VALUES("4","5","5","50.00000000","50.00000000","2017-02-23 08:26:09","2017-02-24","matured","no","38","","","","DEP85182","2017-02-24 00:00:00");
INSERT INTO deposit VALUES("5","1","9","7.00000000","7.00000000","2017-02-23 08:39:05","2017-02-23","matured","no","38","","","","DEP6422895","2017-02-24 00:00:00");
INSERT INTO deposit VALUES("6","4","6","9.00000000","9.00000000","2017-02-23 09:16:43","2017-02-24","matured","no","38","","","","DEP622706","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("7","4","8","20.00000000","20.00000000","2017-02-23 16:05:35","2017-02-24","matured","no","38","","","","DEP995565","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("8","1","7","10.00000000","10.00000000","2017-02-24 04:11:23","2017-02-27","released","no","38","","","","DEP4200119","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("9","1","7","10.00000000","10.00000000","2017-02-24 04:13:38","2017-02-27","released","no","38","","","","DEP3059024","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("10","1","7","10.00000000","10.00000000","2017-02-24 04:20:19","2018-07-20","released","no","38","","","","DEP807080","2017-02-27 04:01:01");
INSERT INTO deposit VALUES("11","4","8","10.00000000","10.00000000","2017-02-24 06:54:47","2017-03-10","released","no","38","","","","DEP5356591","2017-02-24 23:57:01");
INSERT INTO deposit VALUES("13","4","8","0.01000000","0.01000000","2017-02-24 08:13:41","2017-03-06","released","no","38","0.00000000","0000-00-00","0","CPBB2KGCSV3F9DJ8V1JUUNV5LL","2017-02-25 08:13:41");
INSERT INTO deposit VALUES("15","6","6","0.00100000","0.00100000","2017-02-25 10:08:07","2017-03-07","released","no","38","0.00000000","0000-00-00","0","CPBB3VRA4A94SANOZUXR22GCSC","2017-02-27 04:01:01");
INSERT INTO deposit VALUES("16","6","9","10.00000000","10.00000000","2017-02-26 10:46:31","2017-03-10","released","no","38","","","","DEP8336102","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("17","6","8","0.00100000","0.00100000","2017-02-26 11:57:32","2017-02-28","released","no","38","0.00000000","0000-00-00","0","CPBB3MJ5AZFHDMQOZLEZESRXPT","2017-02-27 11:57:32");
INSERT INTO deposit VALUES("18","6","6","0.01000000","0.01000000","2017-02-27 05:10:59","2017-02-28","matured","no","38","0.00000000","0000-00-00","0","CPBB0UULUIDKQXYEN085020RSC","2017-02-28 05:10:59");
INSERT INTO deposit VALUES("19","4","9","0.01000000","0.01000000","2017-02-27 05:26:11","2017-03-09","released","no","38","0.00000000","0000-00-00","0","CPBB3WPVDUMY4KIW01I4KGORKK","2017-02-28 05:26:11");
INSERT INTO deposit VALUES("20","1","6","0.10000000","0.10000000","2017-02-27 13:33:02","2017-02-28","released","no","38","0.00000000","0000-00-00","0","CPBB1LUWE3AZUOE8UI1XTREWMZ","2017-02-28 13:33:02");
INSERT INTO deposit VALUES("21","4","9","10.00000000","10.00000000","2017-02-27 14:33:36","2017-03-13","released","no","38","","","","DEP6752205","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("22","4","9","10.00000000","10.00000000","2017-02-27 14:39:19","2017-03-13","released","no","38","","","","DEP179493","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("23","6","6","0.00100000","0.00100000","2017-02-27 14:51:28","2017-02-28","matured","no","38","0.00000000","0000-00-00","0","CPBB0YYOHWP6UUYXL16R7JLBBH","2017-02-28 14:51:28");
INSERT INTO deposit VALUES("24","1","6","0.01000000","0.01000000","2017-02-27 15:35:04","2017-02-28","released","no","38","0.00000000","0000-00-00","0","CPBB4EGBVVGJ6H6FY0WQWODWZE","2017-02-28 15:35:04");
INSERT INTO deposit VALUES("25","4","6","0.00100000","0.00100000","2017-02-27 16:53:03","2017-02-28","matured","no","38","0.00000000","0000-00-00","0","CPBB3TVNCZFP0P2ZWG2ENPCFKN","2017-02-28 16:53:03");
INSERT INTO deposit VALUES("26","5","6","10.00000000","10.00000000","2017-02-27 20:06:14","2017-02-28","released","no","38","","","","DEP189706","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("27","1","9","0.00100000","0.00100000","2017-02-27 20:46:30","2017-03-09","released","no","38","0.00000000","0000-00-00","0","CPBB4J8BS35KDAG2XYUVEX3472","2017-02-28 17:57:01");
INSERT INTO deposit VALUES("28","2","13","5.00000000","5.00000000","2017-02-28 10:22:27","2017-03-02","released","no","38","","","","DEP8304772","2017-02-28 18:23:02");
INSERT INTO deposit VALUES("29","4","6","0.00100000","0.00100000","2017-02-28 13:47:15","2017-03-01","matured","no","38","0.00000000","0000-00-00","0","CPBB2AQVWPDTCH56GT1R0E8LVT","2017-02-28 23:22:01");
INSERT INTO deposit VALUES("30","1","6","50.00000000","50.00000000","2017-03-01 09:27:12","2017-03-02","matured","no","38","","","","DEP1297173","2017-03-01 23:31:01");
INSERT INTO deposit VALUES("31","6","6","0.00100000","0.00100000","2017-03-01 09:34:07","2017-03-02","matured","no","38","0.00000000","0000-00-00","0","CPBB7MYDTJGDIQG15TQFW3WCZS","2017-03-01 23:39:01");
INSERT INTO deposit VALUES("32","6","6","0.00100000","0.00100000","2017-03-01 09:43:15","2017-03-02","matured","no","38","0.00000000","0000-00-00","0","CPBB4FOWRG2CJ4CUWHXP8KYGEA","2017-03-01 23:46:01");
INSERT INTO deposit VALUES("33","2","6","0.00100000","0.00100000","2017-03-01 09:45:12","2017-03-02","matured","no","38","0.00000000","0000-00-00","0","CPBB3OVS7QHZAJ5NVAQZ94THQZ","2017-03-01 23:48:01");
INSERT INTO deposit VALUES("34","9","6","0.00100000","0.00100000","2017-03-01 13:26:32","2017-03-02","matured","no","38","0.00000000","0000-00-00","0","CPBC345HRUOLSYV5VFNC9ADQT6","2017-03-01 23:29:01");
INSERT INTO deposit VALUES("35","9","6","50.00000000","50.00000000","2017-03-01 14:37:09","2017-03-02","matured","no","38","","","","DEP2510050","2017-03-01 23:41:01");
INSERT INTO deposit VALUES("36","9","6","30.00000000","30.00000000","2017-03-03 14:06:05","2017-04-14","released","no","38","","","","DEP5461711","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("37","9","3","150.00000000","150.00000000","2017-03-03 14:16:58","2017-07-07","active","no","38","","","","DEP9299986","2017-03-10 19:30:02");
INSERT INTO deposit VALUES("38","9","5","12.15700000","12.15700000","2017-03-03 14:17:56","2017-05-26","active","no","38","","","","DEP3874510","2017-03-10 19:30:02");
INSERT INTO deposit VALUES("39","9","5","12.15700000","12.15700000","2017-03-03 14:18:22","2017-05-26","active","no","38","","","","DEP663387","2017-03-10 19:30:02");
INSERT INTO deposit VALUES("40","11","6","1.00000000","1.00000000","2017-03-04 09:17:45","2017-04-14","released","no","38","","","","DEP5495828","2017-03-06 07:00:02");
INSERT INTO deposit VALUES("41","12","6","1.00000000","1.00000000","2017-03-07 11:30:21","2017-04-18","released","no","38","","","","DEP211538","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("42","16","5","20.00000000","20.00000000","2017-03-08 12:37:49","2017-05-31","active","no","38","","","","DEP5225544","2017-03-10 19:30:02");
INSERT INTO deposit VALUES("43","17","6","5.00000000","5.00000000","2017-03-08 12:41:04","2017-04-19","active","no","38","","","","DEP6399810","2017-03-10 19:30:02");
INSERT INTO deposit VALUES("44","15","6","0.50000000","0.50000000","2017-03-08 12:43:44","2017-04-19","active","no","38","","","","DEP9368283","2017-03-10 19:30:02");
INSERT INTO deposit VALUES("45","18","6","5.00000000","5.00000000","2017-03-08 14:44:22","2017-04-19","active","no","38","","","","DEP8980900","2017-03-10 19:30:02");
INSERT INTO deposit VALUES("46","1","6","1.00000000","1.00000000","2017-03-08 16:03:57","2017-04-07","released","no","38","","","","DEP3210415","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("47","1","5","10.00000000","10.00000000","2017-03-08 16:05:07","2017-05-07","released","no","38","","","","DEP9820557","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("48","1","3","100.00000000","100.00000000","2017-03-08 16:06:41","2017-06-06","released","no","38","","","","DEP8260914","0000-00-00 00:00:00");
INSERT INTO deposit VALUES("49","14","6","1.00000000","1.00000000","2017-03-08 16:29:09","2017-04-07","released","no","38","0.00000000","0000-00-00","0","CPBC58ODMY9SBDKTIYGLZJEGCZ","2017-03-09 07:00:02");
INSERT INTO deposit VALUES("50","1","6","1.00000000","1.00000000","2017-03-08 16:55:47","2017-04-07","active","no","38","","","","DEP6263351","2017-03-10 20:30:01");
INSERT INTO deposit VALUES("51","25","6","0.01000000","0.01000000","2017-03-09 14:24:07","2017-04-08","active","no","38","0.00000000","0000-00-00","0","CPBC0E1XGUBTQBIVENXL1JLZOU","2017-03-10 20:30:01");
INSERT INTO deposit VALUES("52","2","6","1.11000000","1.11000000","2017-03-09 17:51:08","2017-04-08","active","no","38","","","","DEP755621","2017-03-10 20:30:02");
INSERT INTO deposit VALUES("53","2","6","5.25000000","5.25000000","2017-03-10 11:58:17","2017-04-09","active","no","38","","","","DEP5540808","2017-03-10 20:30:02");



Drop table if exists  deposit_req;

CREATE TABLE `deposit_req` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `amount` double(50,8) DEFAULT NULL,
  `payid` int(11) DEFAULT NULL,
  `planid` int(11) DEFAULT NULL,
  `compound` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`req_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;




Drop table if exists  downlines;

CREATE TABLE `downlines` (
  `down_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `member_id` bigint(20) DEFAULT NULL,
  `intro_id` bigint(20) DEFAULT NULL,
  `sel_down` varchar(20) DEFAULT NULL,
  `placement_id` bigint(20) DEFAULT NULL,
  `left_id` bigint(20) DEFAULT NULL,
  `right_id` bigint(20) DEFAULT NULL,
  `bonus_status` int(1) DEFAULT '0' COMMENT '0-notset,1-send',
  PRIMARY KEY (`down_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO downlines VALUES("1","1","0","left","1","0","0","0");



Drop table if exists  faq;

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text CHARACTER SET ucs2,
  `answer` text CHARACTER SET utf8,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO faq VALUES("1","How I start earn with the company Bitcoin Arbitrage Trading ?","First you must register an account. Then you can select one or several investment proposals and make a deposit. \n		");
INSERT INTO faq VALUES("2","What is the Bitcoin Arbitrage Trading?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Bitcoin arbitrage are used to profit off of the price difference between many different currencies. They constantly search the market for price changes and buy/sell accordingly to generate you a profit.</span></font>");
INSERT INTO faq VALUES("3","How to make a deposit?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Cash in to personal account by using any of the available electronic payment systems.</span></font>");
INSERT INTO faq VALUES("4","What payment systems can I use?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">To add credits, you can use the following electronic payment systems: &nbsp;Bitcoin.</span></font>");
INSERT INTO faq VALUES("5","What is the minimum deposit allowed?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The minimum deposit is 0.01 B</span></font>");
INSERT INTO faq VALUES("6","What is the maximum deposit allowed?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The maximum allowable deposit is 500B. But if you ar willing to make a deposit over 500B , Please fell free to contact one of our representatives via e-mail overlimit@bat24x.com</span></font>");
INSERT INTO faq VALUES("7","How long does it take to process a Cash Out requests ?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">All Cash Out requests for funds are processed automatically. When you create a payment query, that amount will sent to your Wallet. However, It may take up to 24 hours.</span></font>");
INSERT INTO faq VALUES("8","How much is the withdrawal fee?","<div><span style=\"font-size: 13.3333px; font-family: Arial, Verdana;\">There is no withdrawal fee !</span></div><div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">However, when you release the deposited amount before maturity, it will deduct 15% from the deposit amount.</span></font></div>");
INSERT INTO faq VALUES("9","What is the minimum amount I can order for cash-out?","<font face=\"Arial, Verdana\" style=\"font-family: Arial, Verdana; font-size: 10pt; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal;\"><span style=\"font-size: 13.3333px;\">The minimum order for cash-out can be&nbsp;</span></font><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">฿0.01</span></font>");
INSERT INTO faq VALUES("10","What is the maximum amount I can order for cash out?","<div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The maximum order for cash-out can be ฿500. All cash-outs over ฿500 are processed manually due to financial regulation.</span></font></div>");
INSERT INTO faq VALUES("11","How many accounts can a user register?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">You can register only one account. Multiple accounts are forbidden. If we identify the fact of multiple accounts by a single user, all accounts of the infringer will be blocked indefinitely.</span></font>");
INSERT INTO faq VALUES("12","What is the schedule of interest accrual?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Interest is calculated hourly on your balance. You can cash out the profit into your wallet at any time.</span></font>");
INSERT INTO faq VALUES("13","I want to withdraw the accrued interest on the payment system purse, different from the currency of the payment system, to which I made a deposit. Is it possible?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">No. You can withdraw profit only with the same payment system, in which you made the deposit.</span></font>");
INSERT INTO faq VALUES("14","Does the company offer a partnership?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">The company has given investors the opportunity to earn as an affiliate, you can check out our offers in the “Affiliate” section on our site.</span></font>");
INSERT INTO faq VALUES("15","I want to take part in the partnership program. Do I need to invest to become an Affiliate?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">To participate in the affiliate program you do not need to become an investor. Use the promotional materials, your affiliate link and tell us about our investment products for your cooperation with us all who you know. Help friends to find out and understand the nature of our investment proposals, tell them about how to become an investor in the Bitcoin Arbitrage Trading and your additional revenues begin to grow rapidly.</span></font>");
INSERT INTO faq VALUES("16","What does the company makes to protect personal information?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">We use the most advanced encryption protocol. In addition, the site is hosted on a dedicated server and its smooth operation is provided by a powerful defense system against DDoS attacks</span></font>");
INSERT INTO faq VALUES("17","How to recover my password, which I had forgotten or lost?","<div><font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Use the automatic password recovery function. A new password will be sent by the system to the e-mail, which you provided when registering your account. Then you can immediately change the password to a new one.</span></font></div>");
INSERT INTO faq VALUES("18","Where should I go if I have other questions about the work of your company?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">To be able to receive fast and professional assistance, please use our Customer Service – Tickets in your account. Your problem will be solved as quickly as possible.</span></font>");
INSERT INTO faq VALUES("19","How can I get in contact with you?","<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Go to the \"Contacts\" section and write us a message Options.</span></font>");
INSERT INTO faq VALUES("20","How can I get a Debit Card from BAT24X.COM?","We are offering our Debit Card to the customers who deposited in Platinum Plan.");



Drop table if exists  forexnews;

CREATE TABLE `forexnews` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` datetime DEFAULT NULL,
  `news_header` varchar(100) DEFAULT NULL,
  `news_description` text,
  `status` enum('on','off') DEFAULT 'on',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  history;

CREATE TABLE `history` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0',
  `amount` double(30,8) DEFAULT NULL,
  `type` enum('deposit','bonus','penality','earning','withdrawal','commissions','early_deposit_release','early_deposit_charge','release_deposit','add_funds','withdraw_pending','exchange_in','exchange_out','internal_transaction_spend','internal_transaction_receive','intrest_earned','reinvest') DEFAULT NULL,
  `description` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_thro` int(11) DEFAULT '0',
  `no_withdraw` int(4) DEFAULT '0',
  `reference_number` varchar(200) DEFAULT NULL,
  `transaction_id` text,
  `status` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=979 DEFAULT CHARSET=latin1;

INSERT INTO history VALUES("1","1","10.00000000","deposit","Deposit made through Bit Coin","2017-02-23 02:31:04","38","0","","DEP6997686","");
INSERT INTO history VALUES("2","2","20.00000000","deposit","Deposit made through Bit Coin","2017-02-23 02:40:34","38","0","","DEP2695023","");
INSERT INTO history VALUES("3","1","3.00000000","commissions","Referral Commission Earned","2017-02-23 02:40:34","0","0","","REF2533140","");
INSERT INTO history VALUES("100","1","0.10000000","intrest_earned","Interest Earned on 2017-02-27 02:00:02","2017-02-27 02:00:02","0","0","","INT2896483","1");
INSERT INTO history VALUES("5","2","25.00000000","commissions","Referral Commission Earned","2017-02-23 02:48:55","0","0","","REF6272713","");
INSERT INTO history VALUES("6","1","1.00000000","commissions","Referral Commission Earned","2017-02-23 02:48:55","0","0","","REF9427939","");
INSERT INTO history VALUES("7","5","50.00000000","deposit","Deposit made through Bit Coin","2017-02-23 03:26:09","38","0","","DEP85182","");
INSERT INTO history VALUES("8","4","7.50000000","commissions","Referral Commission Earned","2017-02-23 03:26:10","0","0","","REF5938033","");
INSERT INTO history VALUES("10","2","0.50000000","commissions","Referral Commission Earned","2017-02-23 03:26:10","0","0","","REF2327197","");
INSERT INTO history VALUES("11","1","0.50000000","commissions","Referral Commission Earned","2017-02-23 03:26:10","0","0","","REF5254734","");
INSERT INTO history VALUES("12","1","7.00000000","deposit","Deposit made through Bit Coin","2017-02-23 03:39:05","38","0","","DEP6422895","");
INSERT INTO history VALUES("13","1","0.07000000","intrest_earned","Interest Earned on 2017-02-23","2017-02-23 00:00:00","0","0","","INT6869233","");
INSERT INTO history VALUES("14","1","0.90000000","withdrawal","withdraw paid","2017-02-23 08:42:45","38","1","","WIT8398736","");
INSERT INTO history VALUES("15","1","1.00000000","withdrawal","Withdraw Request for 1.00000000 by yamada1173","2017-02-23 08:42:45","38","1","WIT1242701","WIT1242701","");
INSERT INTO history VALUES("16","4","9.00000000","deposit","Deposit made through Bit Coin","2017-02-23 04:16:43","38","0","","DEP622706","");
INSERT INTO history VALUES("99","6","0.00000050","intrest_earned","Interest Earned on 2017-02-27 01:00:02","2017-02-27 01:00:02","0","0","","INT3145934","1");
INSERT INTO history VALUES("18","2","0.09000000","commissions","Referral Commission Earned","2017-02-23 04:16:43","0","0","","REF9703941","");
INSERT INTO history VALUES("19","1","0.09000000","commissions","Referral Commission Earned","2017-02-23 04:16:43","0","0","","REF1260444","");
INSERT INTO history VALUES("20","4","20.00000000","deposit","Deposit made through Bit Coin","2017-02-23 11:05:35","38","0","","DEP995565","");
INSERT INTO history VALUES("98","1","0.10000000","intrest_earned","Interest Earned on 2017-02-27 01:00:02","2017-02-27 01:00:02","0","0","","INT7217959","1");
INSERT INTO history VALUES("22","2","0.00000000","commissions","Referral Commission Earned","2017-02-23 11:05:35","0","0","","REF5352189","");
INSERT INTO history VALUES("23","1","0.00000000","commissions","Referral Commission Earned","2017-02-23 11:05:35","0","0","","REF2920807","");
INSERT INTO history VALUES("24","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24","2017-02-24 00:00:00","0","0","","INT7115666","");
INSERT INTO history VALUES("25","2","0.42000000","intrest_earned","Interest Earned on 2017-02-24","2017-02-24 00:00:00","0","0","","INT7103498","");
INSERT INTO history VALUES("27","5","1.05000000","intrest_earned","Interest Earned on 2017-02-24","2017-02-24 00:00:00","0","0","","INT2909031","");
INSERT INTO history VALUES("28","4","0.09000000","intrest_earned","Interest Earned on 2017-02-24","2017-02-24 00:00:00","0","0","","INT1337988","");
INSERT INTO history VALUES("29","4","0.40000000","intrest_earned","Interest Earned on 2017-02-24","2017-02-24 00:00:00","0","0","","INT8644576","");
INSERT INTO history VALUES("30","1","10.00000000","deposit","Deposit made through Bit Coin","2017-02-23 23:11:24","38","0","","DEP4200119","");
INSERT INTO history VALUES("31","1","9.00000000","release_deposit","Release Deposit Earned","2017-02-23 23:12:24","0","0","","REF7011851","");
INSERT INTO history VALUES("32","1","10.00000000","deposit","Deposit made through Bit Coin","2017-02-23 23:13:38","38","0","","DEP3059024","");
INSERT INTO history VALUES("33","1","10.00000000","release_deposit","Release Deposit Earned","2017-02-23 23:14:06","0","0","","REF6056694","");
INSERT INTO history VALUES("34","1","10.00000000","deposit","Deposit made through Bit Coin","2017-02-23 23:20:19","38","0","","DEP807080","");
INSERT INTO history VALUES("35","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 05:21:02","2017-02-24 05:21:02","0","0","","INT3840445","1");
INSERT INTO history VALUES("36","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 06:22:01","2017-02-24 06:22:01","0","0","","INT1308070","1");
INSERT INTO history VALUES("37","4","10.00000000","deposit","Deposit made through Bit Coin","2017-02-24 06:54:47","38","0","","DEP5356591","");
INSERT INTO history VALUES("97","6","0.00000050","intrest_earned","Interest Earned on 2017-02-27 00:00:02","2017-02-27 00:00:02","0","0","","INT2339387","1");
INSERT INTO history VALUES("39","2","0.00000000","commissions","Referral Commission Earned","2017-02-24 06:54:47","0","0","","REF1136506","");
INSERT INTO history VALUES("40","1","0.00000000","commissions","Referral Commission Earned","2017-02-24 06:54:47","0","0","","REF3809292","");
INSERT INTO history VALUES("96","1","0.10000000","intrest_earned","Interest Earned on 2017-02-27 00:00:02","2017-02-27 00:00:02","0","0","","INT2805008","1");
INSERT INTO history VALUES("42","2","0.05000000","commissions","Referral Commission Earned","0000-00-00 00:00:00","0","0","","REF1422192","");
INSERT INTO history VALUES("43","1","0.00000000","commissions","Referral Commission Earned","0000-00-00 00:00:00","0","0","","REF1459029","");
INSERT INTO history VALUES("44","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 07:22:01","2017-02-24 07:22:01","0","0","","INT6256175","1");
INSERT INTO history VALUES("45","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 07:55:02","2017-02-24 07:55:02","0","0","","INT6010020","1");
INSERT INTO history VALUES("46","4","0.01000000","deposit","Deposit made through Bit Coin","2017-02-24 03:13:41","38","0","","DEP3476729","");
INSERT INTO history VALUES("95","4","0.00001000","commissions","Referral Commission Earned","2017-02-26 06:57:33","0","0","","REF1985669","");
INSERT INTO history VALUES("48","2","0.00000000","commissions","Referral Commission Earned","2017-02-24 03:13:41","0","0","","REF8356563","");
INSERT INTO history VALUES("49","1","0.00000000","commissions","Referral Commission Earned","2017-02-24 03:13:41","0","0","","REF2641819","");
INSERT INTO history VALUES("51","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 08:22:01","2017-02-24 08:22:01","0","0","","INT9233464","1");
INSERT INTO history VALUES("52","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 08:56:01","2017-02-24 08:56:01","0","0","","INT2888088","1");
INSERT INTO history VALUES("94","6","0.00100000","deposit","Deposit made through Bit Coin","2017-02-26 06:57:32","38","0","","DEP9229064","");
INSERT INTO history VALUES("54","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 09:22:02","2017-02-24 09:22:02","0","0","","INT8294532","1");
INSERT INTO history VALUES("55","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 09:56:01","2017-02-24 09:56:01","0","0","","INT391898","1");
INSERT INTO history VALUES("93","4","0.10000000","commissions","Referral Commission Earned","0000-00-00 00:00:00","0","0","","REF1669176","");
INSERT INTO history VALUES("57","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 10:23:01","2017-02-24 10:23:01","0","0","","INT8400780","1");
INSERT INTO history VALUES("58","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 10:56:01","2017-02-24 10:56:01","0","0","","INT3456645","1");
INSERT INTO history VALUES("92","6","10.00000000","deposit","Deposit made through Bit Coin","2017-02-26 10:46:31","38","0","","DEP8336102","");
INSERT INTO history VALUES("60","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 11:23:02","2017-02-24 11:23:02","0","0","","INT9246285","1");
INSERT INTO history VALUES("91","4","0.00010000","commissions","Referral Commission Earned","2017-02-25 05:08:08","0","0","","REF3138999","");
INSERT INTO history VALUES("62","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 11:56:01","2017-02-24 11:56:01","0","0","","INT8847670","1");
INSERT INTO history VALUES("90","6","0.00100000","deposit","Deposit made through Bit Coin","2017-02-25 05:08:08","38","0","","DEP5723568","");
INSERT INTO history VALUES("64","2","0.00010000","commissions","Referral Commission Earned","2017-02-24 07:09:16","0","0","","REF2819150","");
INSERT INTO history VALUES("65","1","0.00001000","commissions","Referral Commission Earned","2017-02-24 07:09:16","0","0","","REF7913788","");
INSERT INTO history VALUES("66","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 12:24:01","2017-02-24 12:24:01","0","0","","INT1892477","1");
INSERT INTO history VALUES("67","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 12:56:01","2017-02-24 12:56:01","0","0","","INT9058489","1");
INSERT INTO history VALUES("68","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 13:24:01","2017-02-24 13:24:01","0","0","","INT9094187","1");
INSERT INTO history VALUES("69","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 13:56:01","2017-02-24 13:56:01","0","0","","INT8714463","1");
INSERT INTO history VALUES("70","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 14:24:01","2017-02-24 14:24:01","0","0","","INT8597600","1");
INSERT INTO history VALUES("71","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 14:56:02","2017-02-24 14:56:02","0","0","","INT696311","1");
INSERT INTO history VALUES("72","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 15:24:01","2017-02-24 15:24:01","0","0","","INT6093521","1");
INSERT INTO history VALUES("73","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 15:57:01","2017-02-24 15:57:01","0","0","","INT9702027","1");
INSERT INTO history VALUES("74","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 16:24:01","2017-02-24 16:24:01","0","0","","INT4616850","1");
INSERT INTO history VALUES("75","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 16:57:01","2017-02-24 16:57:01","0","0","","INT7517053","1");
INSERT INTO history VALUES("76","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 17:24:02","2017-02-24 17:24:02","0","0","","INT3512695","1");
INSERT INTO history VALUES("77","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 17:57:01","2017-02-24 17:57:01","0","0","","INT8951459","1");
INSERT INTO history VALUES("78","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 18:25:01","2017-02-24 18:25:01","0","0","","INT6076574","1");
INSERT INTO history VALUES("79","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 18:57:01","2017-02-24 18:57:01","0","0","","INT6324850","1");
INSERT INTO history VALUES("80","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 19:25:01","2017-02-24 19:25:01","0","0","","INT1037014","1");
INSERT INTO history VALUES("81","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 19:57:01","2017-02-24 19:57:01","0","0","","INT4075755","1");
INSERT INTO history VALUES("82","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 20:25:01","2017-02-24 20:25:01","0","0","","INT8726920","1");
INSERT INTO history VALUES("83","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 20:57:01","2017-02-24 20:57:01","0","0","","INT9043074","1");
INSERT INTO history VALUES("84","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 21:25:01","2017-02-24 21:25:01","0","0","","INT353865","1");
INSERT INTO history VALUES("85","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 21:57:01","2017-02-24 21:57:01","0","0","","INT4939429","1");
INSERT INTO history VALUES("86","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 22:25:02","2017-02-24 22:25:02","0","0","","INT3059091","1");
INSERT INTO history VALUES("87","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 22:57:01","2017-02-24 22:57:01","0","0","","INT41902","1");
INSERT INTO history VALUES("88","1","0.10000000","intrest_earned","Interest Earned on 2017-02-24 23:26:01","2017-02-24 23:26:01","0","0","","INT5769995","1");
INSERT INTO history VALUES("89","4","0.20000000","intrest_earned","Interest Earned on 2017-02-24 23:57:01","2017-02-24 23:57:01","0","0","","INT3785794","1");
INSERT INTO history VALUES("101","6","0.00000050","intrest_earned","Interest Earned on 2017-02-27 02:00:02","2017-02-27 02:00:02","0","0","","INT6269076","1");
INSERT INTO history VALUES("102","1","0.10000000","intrest_earned","Interest Earned on 2017-02-27 03:00:02","2017-02-27 03:00:02","0","0","","INT3751028","1");
INSERT INTO history VALUES("103","6","0.00000050","intrest_earned","Interest Earned on 2017-02-27 03:00:02","2017-02-27 03:00:02","0","0","","INT5293434","1");
INSERT INTO history VALUES("104","1","0.10000000","intrest_earned","Interest Earned on 2017-02-27 04:01:01","2017-02-27 04:01:01","0","0","","INT5162066","1");
INSERT INTO history VALUES("105","6","0.00000050","intrest_earned","Interest Earned on 2017-02-27 04:01:01","2017-02-27 04:01:01","0","0","","INT4640457","1");
INSERT INTO history VALUES("106","6","0.00100000","release_deposit","Release Deposit Earned","2017-02-26 23:40:30","0","0","","REF7491844","");
INSERT INTO history VALUES("107","6","10.00000000","release_deposit","Release Deposit Earned","2017-02-26 23:40:36","0","0","","REF1509154","");
INSERT INTO history VALUES("108","6","0.00100000","release_deposit","Release Deposit Earned","2017-02-26 23:40:41","0","0","","REF6130250","");
INSERT INTO history VALUES("109","4","10.00000000","release_deposit","Release Deposit Earned","2017-02-26 23:58:13","0","0","","REF4464214","");
INSERT INTO history VALUES("110","4","0.01000000","release_deposit","Release Deposit Earned","2017-02-26 23:58:18","0","0","","REF401363","");
INSERT INTO history VALUES("111","6","0.01000000","deposit","Deposit made through Bit Coin","2017-02-27 00:10:59","38","0","","DEP3588004","");
INSERT INTO history VALUES("112","4","0.00100000","commissions","Referral Commission Earned","2017-02-27 00:10:59","0","0","","REF7083008","");
INSERT INTO history VALUES("113","4","0.01000000","deposit","Deposit made through Bit Coin","2017-02-27 00:26:12","38","0","","DEP3209576","");
INSERT INTO history VALUES("114","1","0.00000000","release_deposit","Release Deposit Earned","2017-02-27 02:00:48","0","0","","REF8706240","");
INSERT INTO history VALUES("115","1","0.10000000","deposit","Deposit made through Bit Coin","2017-02-27 01:33:02","38","0","","DEP1674113","");
INSERT INTO history VALUES("116","1","0.01800000","withdrawal","withdraw paid","2017-02-27 02:00:31","38","1","","WIT1409454","");
INSERT INTO history VALUES("117","1","0.02000000","withdrawal","Withdraw Request for 0.02000000 by yamada1173","2017-02-27 02:00:31","38","1","WIT8909355","WIT8909355","");
INSERT INTO history VALUES("118","6","9.00000000","withdrawal","withdraw paid","2017-02-27 02:26:34","38","1","","WIT9834381","");
INSERT INTO history VALUES("119","6","10.00000000","withdrawal","Withdraw Request for 10.00000000 by kawasaki","2017-02-27 02:26:34","38","1","WIT3161674","WIT3161674","");
INSERT INTO history VALUES("120","4","10.00000000","deposit","Deposit made through Bit Coin","0000-00-00 00:00:00","38","0","","DEP6752205","");
INSERT INTO history VALUES("121","4","9.00000000","release_deposit","Release Deposit Earned","2017-02-27 03:34:54","0","0","","REF5586315","");
INSERT INTO history VALUES("122","4","0.00900000","release_deposit","Release Deposit Earned","2017-02-27 03:35:27","0","0","","REF2126915","");
INSERT INTO history VALUES("123","4","10.00000000","withdrawal","Withdraw Request for 10.00000000 by ","2017-02-27 02:37:15","38","1","WIT4737416","WIT4737416","");
INSERT INTO history VALUES("124","4","10.00000000","deposit","Deposit made through Bit Coin","0000-00-00 00:00:00","38","0","","DEP179493","");
INSERT INTO history VALUES("125","4","9.00000000","release_deposit","Release Deposit Earned","2017-02-27 03:40:08","0","0","","REF7375674","");
INSERT INTO history VALUES("126","4","50.00000000","withdrawal","Withdraw Request for 50.00000000 by ","2017-02-27 02:40:38","38","1","WIT9551805","WIT9551805","");
INSERT INTO history VALUES("127","1","42.14000000","withdrawal","Withdraw Request for 42.14000000 by yamada1173","2017-02-27 02:44:43","38","1","WIT8609196","WIT8609196","");
INSERT INTO history VALUES("128","1","0.09000000","release_deposit","Release Deposit Earned","2017-02-27 03:46:33","0","0","","REF8388854","");
INSERT INTO history VALUES("129","1","0.09000000","withdrawal","Withdraw Request for 0.09000000 by yamada1173","2017-02-27 02:47:05","38","1","WIT4836621","WIT4836621","");
INSERT INTO history VALUES("130","6","0.00100000","deposit","Deposit made through Bit Coin","2017-02-27 14:51:28","38","0","","DEP8338261","");
INSERT INTO history VALUES("131","4","0.00010000","commissions","Referral Commission Earned","2017-02-27 03:51:28","0","0","","REF1407537","");
INSERT INTO history VALUES("132","4","8.51021000","withdrawal","Withdraw Request for 8.51021000 by kawashima","2017-02-27 02:52:35","38","1","WIT3773250","WIT3773250","");
INSERT INTO history VALUES("133","1","0.01000000","deposit","Deposit made through Bit Coin","2017-02-27 15:35:04","38","0","","DEP3744144","");
INSERT INTO history VALUES("134","4","0.00100000","deposit","Deposit made through Bit Coin","2017-02-27 16:53:03","38","0","","DEP5197791","");
INSERT INTO history VALUES("135","1","0.00850000","release_deposit","Release Deposit Earned","2017-02-27 08:52:32","0","0","","REF1501756","");
INSERT INTO history VALUES("136","5","51.05000000","withdrawal","Withdraw Request for 51.05 by hutakuti","2017-02-27 08:05:36","38","1","","WIT1403281","");
INSERT INTO history VALUES("137","5","10.00000000","deposit","Deposit made through Bit Coin","2017-02-27 20:06:14","38","0","","DEP189706","");
INSERT INTO history VALUES("138","4","1.00000000","commissions","Referral Commission Earned","0000-00-00 00:00:00","0","0","","REF1170296","");
INSERT INTO history VALUES("139","5","8.50000000","release_deposit","Release Deposit Earned","2017-02-27 09:10:18","0","0","","REF6784415","");
INSERT INTO history VALUES("140","1","0.00100000","deposit","Deposit made through Bit Coin","2017-02-27 20:46:30","38","0","","DEP4950802","");
INSERT INTO history VALUES("141","6","0.00000500","intrest_earned","Interest Earned on 2017-02-28","2017-02-28 00:00:00","0","0","","INT7017744","");
INSERT INTO history VALUES("142","6","0.00000050","intrest_earned","Interest Earned on 2017-02-28","2017-02-28 00:00:00","0","0","","INT567695","");
INSERT INTO history VALUES("143","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28","2017-02-28 00:00:00","0","0","","INT3083104","");
INSERT INTO history VALUES("144","2","5.00000000","deposit","Deposit made through Bit Coin","2017-02-28 10:22:27","38","0","","DEP8304772","");
INSERT INTO history VALUES("145","1","0.00150000","commissions","Referral Commission Earned","2017-02-28 10:22:27","0","0","","REF6006326","");
INSERT INTO history VALUES("146","1","0.00000050","intrest_earned","Interest Earned on 2017-02-28 11:22:27","2017-02-28 11:22:27","0","0","","INT1123902","1");
INSERT INTO history VALUES("147","2","0.00200000","intrest_earned","Interest Earned on 2017-02-28 11:22:27","2017-02-28 11:22:27","0","0","","INT4570672","1");
INSERT INTO history VALUES("148","2","0.00200000","intrest_earned","Interest Earned on 2017-02-28 12:23:01","2017-02-28 12:23:01","0","0","","INT6956689","1");
INSERT INTO history VALUES("149","1","0.00000050","intrest_earned","Interest Earned on 2017-02-28 12:55:02","2017-02-28 12:55:02","0","0","","INT9387992","1");
INSERT INTO history VALUES("150","2","0.00200000","intrest_earned","Interest Earned on 2017-02-28 13:23:01","2017-02-28 13:23:01","0","0","","INT5529093","1");
INSERT INTO history VALUES("151","4","0.00100000","deposit","Deposit made through Bit Coin","2017-02-28 13:47:15","38","0","","DEP8179865","");
INSERT INTO history VALUES("152","1","0.00000050","intrest_earned","Interest Earned on 2017-02-28 13:55:02","2017-02-28 13:55:02","0","0","","INT6919989","1");
INSERT INTO history VALUES("153","2","0.00200000","intrest_earned","Interest Earned on 2017-02-28 14:23:01","2017-02-28 14:23:01","0","0","","INT8301615","1");
INSERT INTO history VALUES("154","1","0.00000050","intrest_earned","Interest Earned on 2017-02-28 14:55:03","2017-02-28 14:55:03","0","0","","INT3930669","1");
INSERT INTO history VALUES("155","2","0.00200000","intrest_earned","Interest Earned on 2017-02-28 15:23:01","2017-02-28 15:23:01","0","0","","INT5118323","1");
INSERT INTO history VALUES("156","1","0.00000050","intrest_earned","Interest Earned on 2017-02-28 15:56:02","2017-02-28 15:56:02","0","0","","INT97428","1");
INSERT INTO history VALUES("157","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28 16:22:01","2017-02-28 16:22:01","0","0","","INT2499091","1");
INSERT INTO history VALUES("158","2","0.00200000","intrest_earned","Interest Earned on 2017-02-28 16:23:02","2017-02-28 16:23:02","0","0","","INT6314770","1");
INSERT INTO history VALUES("159","1","0.00000050","intrest_earned","Interest Earned on 2017-02-28 16:57:01","2017-02-28 16:57:01","0","0","","INT9148498","1");
INSERT INTO history VALUES("160","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28 17:22:01","2017-02-28 17:22:01","0","0","","INT586408","1");
INSERT INTO history VALUES("161","2","0.00200000","intrest_earned","Interest Earned on 2017-02-28 17:23:02","2017-02-28 17:23:02","0","0","","INT3092224","1");
INSERT INTO history VALUES("162","1","0.00000050","intrest_earned","Interest Earned on 2017-02-28 17:57:01","2017-02-28 17:57:01","0","0","","INT8641302","1");
INSERT INTO history VALUES("163","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28 18:22:01","2017-02-28 18:22:01","0","0","","INT4501974","1");
INSERT INTO history VALUES("164","2","0.00200000","intrest_earned","Interest Earned on 2017-02-28 18:23:02","2017-02-28 18:23:02","0","0","","INT1972220","1");
INSERT INTO history VALUES("165","1","0.00085000","release_deposit","Release Deposit Earned","2017-02-28 07:41:01","0","0","","REF2653548","");
INSERT INTO history VALUES("166","1","0.01000000","withdrawal","Withdraw Request for 0.01 by yamada1173","2017-02-28 06:46:07","38","1","","WIT2942036","");
INSERT INTO history VALUES("167","2","4.25000000","release_deposit","Release Deposit Earned","2017-02-28 07:44:24","0","0","","REF9959261","");
INSERT INTO history VALUES("168","2","50.30000000","withdrawal","Withdraw Request for 50.3 by yamada333","2017-02-28 06:46:07","38","1","","WIT4008387","");
INSERT INTO history VALUES("169","5","8.50000000","withdrawal","Withdraw Request for 8.5 by hutakuti","2017-03-09 08:33:51","38","1","","WIT5276797","");
INSERT INTO history VALUES("170","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28 19:22:01","2017-02-28 19:22:01","0","0","","INT1032273","1");
INSERT INTO history VALUES("171","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28 20:22:01","2017-02-28 20:22:01","0","0","","INT1672848","1");
INSERT INTO history VALUES("172","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28 21:22:01","2017-02-28 21:22:01","0","0","","INT8705489","1");
INSERT INTO history VALUES("173","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28 22:22:01","2017-02-28 22:22:01","0","0","","INT119527","1");
INSERT INTO history VALUES("174","4","0.00000050","intrest_earned","Interest Earned on 2017-02-28 23:22:01","2017-02-28 23:22:01","0","0","","INT6183326","1");
INSERT INTO history VALUES("175","4","0.00000050","intrest_earned","Interest Earned on 2017-03-01","2017-03-01 00:00:00","0","0","","INT7332421","");
INSERT INTO history VALUES("176","1","50.00000000","deposit","Deposit made through Bit Coin","2017-03-01 09:27:12","38","0","","DEP1297173","");
INSERT INTO history VALUES("177","6","0.00100000","deposit","Deposit made through Bit Coin","2017-03-01 09:34:07","38","0","","DEP4081892","");
INSERT INTO history VALUES("178","4","0.00010000","commissions","Referral Commission Earned","2017-03-01 09:34:07","0","0","","REF8099215","");
INSERT INTO history VALUES("179","6","0.00100000","deposit","Deposit made through Bit Coin","2017-03-01 09:43:15","38","0","","DEP6628104","");
INSERT INTO history VALUES("180","4","0.00010000","commissions","Referral Commission Earned","2017-03-01 09:43:15","0","0","","REF5890436","");
INSERT INTO history VALUES("181","2","0.00100000","deposit","Deposit made through Bit Coin","2017-03-01 09:45:12","38","0","","DEP1803581","");
INSERT INTO history VALUES("182","1","0.00010000","commissions","Referral Commission Earned","2017-03-01 09:45:12","0","0","","REF9234108","");
INSERT INTO history VALUES("183","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 10:28:01","2017-03-01 10:28:01","0","0","","INT3305398","1");
INSERT INTO history VALUES("184","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 10:35:01","2017-03-01 10:35:01","0","0","","INT5353173","1");
INSERT INTO history VALUES("185","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 10:44:01","2017-03-01 10:44:01","0","0","","INT1135860","1");
INSERT INTO history VALUES("186","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 10:46:01","2017-03-01 10:46:01","0","0","","INT3462934","1");
INSERT INTO history VALUES("187","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 11:28:01","2017-03-01 11:28:01","0","0","","INT5798370","1");
INSERT INTO history VALUES("188","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 11:35:02","2017-03-01 11:35:02","0","0","","INT6185705","1");
INSERT INTO history VALUES("189","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 11:44:01","2017-03-01 11:44:01","0","0","","INT3985084","1");
INSERT INTO history VALUES("190","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 11:46:01","2017-03-01 11:46:01","0","0","","INT9754807","1");
INSERT INTO history VALUES("191","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 12:28:01","2017-03-01 12:28:01","0","0","","INT7898587","1");
INSERT INTO history VALUES("192","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 12:36:01","2017-03-01 12:36:01","0","0","","INT8596070","1");
INSERT INTO history VALUES("193","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 12:44:01","2017-03-01 12:44:01","0","0","","INT6101170","1");
INSERT INTO history VALUES("194","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 12:46:01","2017-03-01 12:46:01","0","0","","INT9549124","1");
INSERT INTO history VALUES("195","9","0.00100000","deposit","Deposit made through Bit Coin","2017-03-01 13:26:32","38","0","","DEP3981791","");
INSERT INTO history VALUES("196","6","0.00010000","commissions","Referral Commission Earned","2017-03-01 13:26:32","0","0","","REF3914230","");
INSERT INTO history VALUES("197","4","0.00001000","commissions","Referral Commission Earned","2017-03-01 13:26:32","0","0","","REF1441528","");
INSERT INTO history VALUES("198","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 13:28:01","2017-03-01 13:28:01","0","0","","INT4530974","1");
INSERT INTO history VALUES("199","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 13:36:01","2017-03-01 13:36:01","0","0","","INT9071158","1");
INSERT INTO history VALUES("200","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 13:44:02","2017-03-01 13:44:02","0","0","","INT96077","1");
INSERT INTO history VALUES("201","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 13:46:01","2017-03-01 13:46:01","0","0","","INT6975302","1");
INSERT INTO history VALUES("202","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 14:27:01","2017-03-01 14:27:01","0","0","","INT6206166","1");
INSERT INTO history VALUES("203","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 14:28:02","2017-03-01 14:28:02","0","0","","INT7615580","1");
INSERT INTO history VALUES("204","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 14:36:01","2017-03-01 14:36:01","0","0","","INT7131546","1");
INSERT INTO history VALUES("205","9","50.00000000","deposit","Deposit made through Bit Coin","2017-03-01 14:37:09","38","0","","DEP2510050","");
INSERT INTO history VALUES("206","6","5.00000000","commissions","Referral Commission Earned","2017-03-01 14:37:09","0","0","","REF6261440","");
INSERT INTO history VALUES("207","4","0.50000000","commissions","Referral Commission Earned","2017-03-01 14:37:09","0","0","","REF1091929","");
INSERT INTO history VALUES("208","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 14:45:01","2017-03-01 14:45:01","0","0","","INT2034617","1");
INSERT INTO history VALUES("209","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 14:46:01","2017-03-01 14:46:01","0","0","","INT9745789","1");
INSERT INTO history VALUES("210","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 15:27:02","2017-03-01 15:27:02","0","0","","INT6597347","1");
INSERT INTO history VALUES("211","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 15:28:02","2017-03-01 15:28:02","0","0","","INT4080444","1");
INSERT INTO history VALUES("212","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 15:36:02","2017-03-01 15:36:02","0","0","","INT2792998","1");
INSERT INTO history VALUES("213","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 15:38:01","2017-03-01 15:38:01","0","0","","INT8939861","1");
INSERT INTO history VALUES("214","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 15:45:02","2017-03-01 15:45:02","0","0","","INT3750637","1");
INSERT INTO history VALUES("215","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 15:46:02","2017-03-01 15:46:02","0","0","","INT8354343","1");
INSERT INTO history VALUES("216","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 16:28:01","2017-03-01 16:28:01","0","0","","INT7043405","1");
INSERT INTO history VALUES("217","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 16:29:01","2017-03-01 16:29:01","0","0","","INT2910384","1");
INSERT INTO history VALUES("218","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 16:37:01","2017-03-01 16:37:01","0","0","","INT531350","1");
INSERT INTO history VALUES("219","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 16:38:02","2017-03-01 16:38:02","0","0","","INT3117984","1");
INSERT INTO history VALUES("220","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 16:45:02","2017-03-01 16:45:02","0","0","","INT4512662","1");
INSERT INTO history VALUES("221","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 16:47:01","2017-03-01 16:47:01","0","0","","INT1492132","1");
INSERT INTO history VALUES("222","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 17:28:01","2017-03-01 17:28:01","0","0","","INT8271184","1");
INSERT INTO history VALUES("223","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 17:29:01","2017-03-01 17:29:01","0","0","","INT3310974","1");
INSERT INTO history VALUES("224","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 17:37:02","2017-03-01 17:37:02","0","0","","INT5745934","1");
INSERT INTO history VALUES("225","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 17:39:01","2017-03-01 17:39:01","0","0","","INT2943222","1");
INSERT INTO history VALUES("226","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 17:45:02","2017-03-01 17:45:02","0","0","","INT749079","1");
INSERT INTO history VALUES("227","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 17:47:02","2017-03-01 17:47:02","0","0","","INT2784614","1");
INSERT INTO history VALUES("228","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 18:28:01","2017-03-01 18:28:01","0","0","","INT1439708","1");
INSERT INTO history VALUES("229","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 18:29:01","2017-03-01 18:29:01","0","0","","INT8466685","1");
INSERT INTO history VALUES("230","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 18:37:02","2017-03-01 18:37:02","0","0","","INT6177244","1");
INSERT INTO history VALUES("231","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 18:39:02","2017-03-01 18:39:02","0","0","","INT4486823","1");
INSERT INTO history VALUES("232","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 18:45:02","2017-03-01 18:45:02","0","0","","INT1636422","1");
INSERT INTO history VALUES("233","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 18:48:01","2017-03-01 18:48:01","0","0","","INT4713782","1");
INSERT INTO history VALUES("234","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 19:28:01","2017-03-01 19:28:01","0","0","","INT3485305","1");
INSERT INTO history VALUES("235","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 19:29:02","2017-03-01 19:29:02","0","0","","INT1834572","1");
INSERT INTO history VALUES("236","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 19:38:01","2017-03-01 19:38:01","0","0","","INT6406946","1");
INSERT INTO history VALUES("237","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 19:40:02","2017-03-01 19:40:02","0","0","","INT615631","1");
INSERT INTO history VALUES("238","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 19:45:02","2017-03-01 19:45:02","0","0","","INT6015426","1");
INSERT INTO history VALUES("239","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 19:48:01","2017-03-01 19:48:01","0","0","","INT3834757","1");
INSERT INTO history VALUES("240","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 20:28:01","2017-03-01 20:28:01","0","0","","INT4499313","1");
INSERT INTO history VALUES("241","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 20:30:02","2017-03-01 20:30:02","0","0","","INT3087350","1");
INSERT INTO history VALUES("242","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 20:38:01","2017-03-01 20:38:01","0","0","","INT8204525","1");
INSERT INTO history VALUES("243","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 20:41:01","2017-03-01 20:41:01","0","0","","INT8504773","1");
INSERT INTO history VALUES("244","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 20:45:02","2017-03-01 20:45:02","0","0","","INT8907737","1");
INSERT INTO history VALUES("245","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 20:48:01","2017-03-01 20:48:01","0","0","","INT698922","1");
INSERT INTO history VALUES("246","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 21:28:02","2017-03-01 21:28:02","0","0","","INT7979938","1");
INSERT INTO history VALUES("247","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 21:30:03","2017-03-01 21:30:03","0","0","","INT6865354","1");
INSERT INTO history VALUES("248","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 21:38:02","2017-03-01 21:38:02","0","0","","INT8102413","1");
INSERT INTO history VALUES("249","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 21:41:01","2017-03-01 21:41:01","0","0","","INT6298075","1");
INSERT INTO history VALUES("250","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 21:46:01","2017-03-01 21:46:01","0","0","","INT958117","1");
INSERT INTO history VALUES("251","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 21:48:01","2017-03-01 21:48:01","0","0","","INT8165444","1");
INSERT INTO history VALUES("252","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 22:29:01","2017-03-01 22:29:01","0","0","","INT4247424","1");
INSERT INTO history VALUES("253","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 22:31:01","2017-03-01 22:31:01","0","0","","INT9056139","1");
INSERT INTO history VALUES("254","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 22:39:01","2017-03-01 22:39:01","0","0","","INT6142860","1");
INSERT INTO history VALUES("255","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 22:41:01","2017-03-01 22:41:01","0","0","","INT2090959","1");
INSERT INTO history VALUES("256","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 22:46:01","2017-03-01 22:46:01","0","0","","INT1471795","1");
INSERT INTO history VALUES("257","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 22:48:01","2017-03-01 22:48:01","0","0","","INT7213962","1");
INSERT INTO history VALUES("258","9","0.00000050","intrest_earned","Interest Earned on 2017-03-01 23:29:01","2017-03-01 23:29:01","0","0","","INT1758985","1");
INSERT INTO history VALUES("259","1","0.02500000","intrest_earned","Interest Earned on 2017-03-01 23:31:01","2017-03-01 23:31:01","0","0","","INT428233","1");
INSERT INTO history VALUES("260","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 23:39:01","2017-03-01 23:39:01","0","0","","INT9528866","1");
INSERT INTO history VALUES("261","9","0.02500000","intrest_earned","Interest Earned on 2017-03-01 23:41:01","2017-03-01 23:41:01","0","0","","INT7886273","1");
INSERT INTO history VALUES("262","6","0.00000050","intrest_earned","Interest Earned on 2017-03-01 23:46:01","2017-03-01 23:46:01","0","0","","INT3745832","1");
INSERT INTO history VALUES("263","2","0.00000050","intrest_earned","Interest Earned on 2017-03-01 23:48:01","2017-03-01 23:48:01","0","0","","INT9790459","1");
INSERT INTO history VALUES("264","1","0.02500000","intrest_earned","Interest Earned on 2017-03-02","2017-03-02 00:00:00","0","0","","INT9457164","");
INSERT INTO history VALUES("265","6","0.00000050","intrest_earned","Interest Earned on 2017-03-02","2017-03-02 00:00:00","0","0","","INT2110488","");
INSERT INTO history VALUES("266","6","0.00000050","intrest_earned","Interest Earned on 2017-03-02","2017-03-02 00:00:00","0","0","","INT3831127","");
INSERT INTO history VALUES("267","2","0.00000050","intrest_earned","Interest Earned on 2017-03-02","2017-03-02 00:00:00","0","0","","INT6150483","");
INSERT INTO history VALUES("268","9","0.00000050","intrest_earned","Interest Earned on 2017-03-02","2017-03-02 00:00:00","0","0","","INT7316548","");
INSERT INTO history VALUES("269","9","0.02500000","intrest_earned","Interest Earned on 2017-03-02","2017-03-02 00:00:00","0","0","","INT2926945","");
INSERT INTO history VALUES("270","9","30.00000000","deposit","Deposit made through Bit Coin","2017-03-03 14:06:05","38","0","","DEP5461711","");
INSERT INTO history VALUES("271","6","3.00000000","commissions","Referral Commission Earned","2017-03-03 14:06:05","0","0","","REF9625866","");
INSERT INTO history VALUES("272","4","0.30000000","commissions","Referral Commission Earned","2017-03-03 14:06:05","0","0","","REF203456","");
INSERT INTO history VALUES("273","9","25.50000000","release_deposit","Release Deposit Earned","2017-03-03 03:06:19","0","0","","REF4177455","");
INSERT INTO history VALUES("274","9","150.00000000","deposit","Deposit made through Bit Coin","2017-03-03 14:16:58","38","0","","DEP9299986","");
INSERT INTO history VALUES("275","6","37.50000000","commissions","Referral Commission Earned","2017-03-03 14:16:59","0","0","","REF5337530","");
INSERT INTO history VALUES("276","4","1.50000000","commissions","Referral Commission Earned","2017-03-03 14:16:59","0","0","","REF5031342","");
INSERT INTO history VALUES("277","9","12.15700000","deposit","Deposit made through Bit Coin","2017-03-03 14:17:56","38","0","","DEP3874510","");
INSERT INTO history VALUES("278","6","1.82355000","commissions","Referral Commission Earned","2017-03-03 14:17:56","0","0","","REF2327737","");
INSERT INTO history VALUES("279","4","0.12157000","commissions","Referral Commission Earned","2017-03-03 14:17:56","0","0","","REF1546232","");
INSERT INTO history VALUES("280","9","12.15700000","deposit","Deposit made through Bit Coin","2017-03-03 14:18:22","38","0","","DEP663387","");
INSERT INTO history VALUES("281","6","1.82355000","commissions","Referral Commission Earned","2017-03-03 14:18:22","0","0","","REF4690324","");
INSERT INTO history VALUES("282","4","0.12157000","commissions","Referral Commission Earned","2017-03-03 14:18:22","0","0","","REF3117043","");
INSERT INTO history VALUES("283","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 15:17:01","2017-03-03 15:17:01","0","0","","INT2461592","1");
INSERT INTO history VALUES("284","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 15:18:01","2017-03-03 15:18:01","0","0","","INT811312","1");
INSERT INTO history VALUES("285","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 15:19:01","2017-03-03 15:19:01","0","0","","INT3128027","1");
INSERT INTO history VALUES("286","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 16:17:01","2017-03-03 16:17:01","0","0","","INT905808","1");
INSERT INTO history VALUES("287","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 16:18:01","2017-03-03 16:18:01","0","0","","INT843460","1");
INSERT INTO history VALUES("288","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 16:19:01","2017-03-03 16:19:01","0","0","","INT4926537","1");
INSERT INTO history VALUES("289","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 17:17:01","2017-03-03 17:17:01","0","0","","INT2871019","1");
INSERT INTO history VALUES("290","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 17:18:01","2017-03-03 17:18:01","0","0","","INT1554525","1");
INSERT INTO history VALUES("291","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 17:19:02","2017-03-03 17:19:02","0","0","","INT225917","1");
INSERT INTO history VALUES("292","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 18:17:01","2017-03-03 18:17:01","0","0","","INT7524642","1");
INSERT INTO history VALUES("293","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 18:18:01","2017-03-03 18:18:01","0","0","","INT7089787","1");
INSERT INTO history VALUES("294","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 18:20:01","2017-03-03 18:20:01","0","0","","INT247639","1");
INSERT INTO history VALUES("295","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 19:17:01","2017-03-03 19:17:01","0","0","","INT9165297","1");
INSERT INTO history VALUES("296","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 19:18:01","2017-03-03 19:18:01","0","0","","INT5366308","1");
INSERT INTO history VALUES("297","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 19:20:01","2017-03-03 19:20:01","0","0","","INT7447885","1");
INSERT INTO history VALUES("298","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 20:17:01","2017-03-03 20:17:01","0","0","","INT7392185","1");
INSERT INTO history VALUES("299","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 20:18:01","2017-03-03 20:18:01","0","0","","INT2478147","1");
INSERT INTO history VALUES("300","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 20:20:02","2017-03-03 20:20:02","0","0","","INT7207562","1");
INSERT INTO history VALUES("301","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 21:17:01","2017-03-03 21:17:01","0","0","","INT6335618","1");
INSERT INTO history VALUES("302","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 21:18:01","2017-03-03 21:18:01","0","0","","INT1763135","1");
INSERT INTO history VALUES("303","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 21:20:02","2017-03-03 21:20:02","0","0","","INT993394","1");
INSERT INTO history VALUES("304","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 22:17:01","2017-03-03 22:17:01","0","0","","INT6753915","1");
INSERT INTO history VALUES("305","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 22:18:02","2017-03-03 22:18:02","0","0","","INT5781690","1");
INSERT INTO history VALUES("306","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 22:20:02","2017-03-03 22:20:02","0","0","","INT7429726","1");
INSERT INTO history VALUES("307","9","0.26250000","intrest_earned","Interest Earned on 2017-03-03 23:17:01","2017-03-03 23:17:01","0","0","","INT152475","1");
INSERT INTO history VALUES("308","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 23:19:02","2017-03-03 23:19:02","0","0","","INT6914847","1");
INSERT INTO history VALUES("309","9","0.01063738","intrest_earned","Interest Earned on 2017-03-03 23:21:01","2017-03-03 23:21:01","0","0","","INT4248029","1");
INSERT INTO history VALUES("310","11","1.00000000","deposit","Deposit made through Bit Coin","2017-03-04 09:17:45","38","0","","DEP5495828","");
INSERT INTO history VALUES("311","9","0.10000000","commissions","Referral Commission Earned","2017-03-04 09:17:45","0","0","","REF6514746","");
INSERT INTO history VALUES("312","6","0.01000000","commissions","Referral Commission Earned","2017-03-04 09:17:45","0","0","","REF301437","");
INSERT INTO history VALUES("313","4","0.01000000","commissions","Referral Commission Earned","2017-03-04 09:17:45","0","0","","REF4130203","");
INSERT INTO history VALUES("314","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 00:00:02","2017-03-06 00:00:02","0","0","","INT4462051","1");
INSERT INTO history VALUES("315","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 00:00:02","2017-03-06 00:00:02","0","0","","INT9301387","1");
INSERT INTO history VALUES("316","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 00:00:02","2017-03-06 00:00:02","0","0","","INT7029450","1");
INSERT INTO history VALUES("317","11","0.00050000","intrest_earned","Interest Earned on 2017-03-06 00:00:02","2017-03-06 00:00:02","0","0","","INT6576958","1");
INSERT INTO history VALUES("318","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 01:00:02","2017-03-06 01:00:02","0","0","","INT7600441","1");
INSERT INTO history VALUES("319","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 01:00:02","2017-03-06 01:00:02","0","0","","INT9800291","1");
INSERT INTO history VALUES("320","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 01:00:02","2017-03-06 01:00:02","0","0","","INT7148303","1");
INSERT INTO history VALUES("321","11","0.00050000","intrest_earned","Interest Earned on 2017-03-06 01:00:02","2017-03-06 01:00:02","0","0","","INT9858016","1");
INSERT INTO history VALUES("322","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 02:00:02","2017-03-06 02:00:02","0","0","","INT5018952","1");
INSERT INTO history VALUES("323","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 02:00:02","2017-03-06 02:00:02","0","0","","INT27426","1");
INSERT INTO history VALUES("324","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 02:00:02","2017-03-06 02:00:02","0","0","","INT8671662","1");
INSERT INTO history VALUES("325","11","0.00050000","intrest_earned","Interest Earned on 2017-03-06 02:00:02","2017-03-06 02:00:02","0","0","","INT4307532","1");
INSERT INTO history VALUES("326","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 03:00:02","2017-03-06 03:00:02","0","0","","INT1782552","1");
INSERT INTO history VALUES("327","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 03:00:02","2017-03-06 03:00:02","0","0","","INT3782962","1");
INSERT INTO history VALUES("328","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 03:00:02","2017-03-06 03:00:02","0","0","","INT2716193","1");
INSERT INTO history VALUES("329","11","0.00050000","intrest_earned","Interest Earned on 2017-03-06 03:00:02","2017-03-06 03:00:02","0","0","","INT6983066","1");
INSERT INTO history VALUES("330","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 04:00:02","2017-03-06 04:00:02","0","0","","INT4637712","1");
INSERT INTO history VALUES("331","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 04:00:02","2017-03-06 04:00:02","0","0","","INT8842707","1");
INSERT INTO history VALUES("332","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 04:00:02","2017-03-06 04:00:02","0","0","","INT7319315","1");
INSERT INTO history VALUES("333","11","0.00050000","intrest_earned","Interest Earned on 2017-03-06 04:00:02","2017-03-06 04:00:02","0","0","","INT5174311","1");
INSERT INTO history VALUES("334","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 05:00:02","2017-03-06 05:00:02","0","0","","INT7517638","1");
INSERT INTO history VALUES("335","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 05:00:02","2017-03-06 05:00:02","0","0","","INT8562260","1");
INSERT INTO history VALUES("336","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 05:00:02","2017-03-06 05:00:02","0","0","","INT8763650","1");
INSERT INTO history VALUES("337","11","0.00050000","intrest_earned","Interest Earned on 2017-03-06 05:00:02","2017-03-06 05:00:02","0","0","","INT64547","1");
INSERT INTO history VALUES("338","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 06:00:02","2017-03-06 06:00:02","0","0","","INT1574282","1");
INSERT INTO history VALUES("339","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 06:00:02","2017-03-06 06:00:02","0","0","","INT9101129","1");
INSERT INTO history VALUES("340","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 06:00:02","2017-03-06 06:00:02","0","0","","INT8721118","1");
INSERT INTO history VALUES("341","11","0.00050000","intrest_earned","Interest Earned on 2017-03-06 06:00:02","2017-03-06 06:00:02","0","0","","INT6751420","1");
INSERT INTO history VALUES("342","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 07:00:02","2017-03-06 07:00:02","0","0","","INT853249","1");
INSERT INTO history VALUES("343","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 07:00:02","2017-03-06 07:00:02","0","0","","INT3121209","1");
INSERT INTO history VALUES("344","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 07:00:02","2017-03-06 07:00:02","0","0","","INT491528","1");
INSERT INTO history VALUES("345","11","0.00050000","intrest_earned","Interest Earned on 2017-03-06 07:00:02","2017-03-06 07:00:02","0","0","","INT550829","1");
INSERT INTO history VALUES("346","11","0.85000000","release_deposit","Release Deposit Earned","2017-03-05 20:32:51","0","0","","REF6156069","");
INSERT INTO history VALUES("347","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 08:00:02","2017-03-06 08:00:02","0","0","","INT9215292","1");
INSERT INTO history VALUES("348","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 08:00:02","2017-03-06 08:00:02","0","0","","INT7463310","1");
INSERT INTO history VALUES("349","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 08:00:02","2017-03-06 08:00:02","0","0","","INT7099453","1");
INSERT INTO history VALUES("350","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 09:00:02","2017-03-06 09:00:02","0","0","","INT2859102","1");
INSERT INTO history VALUES("351","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 09:00:02","2017-03-06 09:00:02","0","0","","INT4094671","1");
INSERT INTO history VALUES("352","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 09:00:02","2017-03-06 09:00:02","0","0","","INT523093","1");
INSERT INTO history VALUES("353","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 10:00:02","2017-03-06 10:00:02","0","0","","INT5078841","1");
INSERT INTO history VALUES("354","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 10:00:02","2017-03-06 10:00:02","0","0","","INT108938","1");
INSERT INTO history VALUES("355","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 10:00:02","2017-03-06 10:00:02","0","0","","INT9831722","1");
INSERT INTO history VALUES("356","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 11:00:02","2017-03-06 11:00:02","0","0","","INT5661417","1");
INSERT INTO history VALUES("357","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 11:00:03","2017-03-06 11:00:03","0","0","","INT122331","1");
INSERT INTO history VALUES("358","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 11:00:03","2017-03-06 11:00:03","0","0","","INT566182","1");
INSERT INTO history VALUES("359","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 12:00:02","2017-03-06 12:00:02","0","0","","INT8830694","1");
INSERT INTO history VALUES("360","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 12:30:01","2017-03-06 12:30:01","0","0","","INT7552226","1");
INSERT INTO history VALUES("361","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 12:30:01","2017-03-06 12:30:01","0","0","","INT230474","1");
INSERT INTO history VALUES("362","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 13:30:01","2017-03-06 13:30:01","0","0","","INT9349546","1");
INSERT INTO history VALUES("363","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 13:30:01","2017-03-06 13:30:01","0","0","","INT7580534","1");
INSERT INTO history VALUES("364","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 13:30:01","2017-03-06 13:30:01","0","0","","INT7836769","1");
INSERT INTO history VALUES("365","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 14:30:01","2017-03-06 14:30:01","0","0","","INT9208027","1");
INSERT INTO history VALUES("366","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 14:30:01","2017-03-06 14:30:01","0","0","","INT9599202","1");
INSERT INTO history VALUES("367","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 14:30:01","2017-03-06 14:30:01","0","0","","INT6621226","1");
INSERT INTO history VALUES("368","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 15:30:02","2017-03-06 15:30:02","0","0","","INT9111882","1");
INSERT INTO history VALUES("369","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 15:30:02","2017-03-06 15:30:02","0","0","","INT9490682","1");
INSERT INTO history VALUES("370","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 15:30:02","2017-03-06 15:30:02","0","0","","INT7355421","1");
INSERT INTO history VALUES("371","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 16:30:02","2017-03-06 16:30:02","0","0","","INT4949865","1");
INSERT INTO history VALUES("372","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 16:30:02","2017-03-06 16:30:02","0","0","","INT4499134","1");
INSERT INTO history VALUES("373","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 16:30:02","2017-03-06 16:30:02","0","0","","INT7169775","1");
INSERT INTO history VALUES("374","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 18:00:02","2017-03-06 18:00:02","0","0","","INT8793381","1");
INSERT INTO history VALUES("375","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 18:00:02","2017-03-06 18:00:02","0","0","","INT12281","1");
INSERT INTO history VALUES("376","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 18:00:02","2017-03-06 18:00:02","0","0","","INT4678732","1");
INSERT INTO history VALUES("377","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 19:30:02","2017-03-06 19:30:02","0","0","","INT2072020","1");
INSERT INTO history VALUES("378","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 19:30:02","2017-03-06 19:30:02","0","0","","INT8388497","1");
INSERT INTO history VALUES("379","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 19:30:02","2017-03-06 19:30:02","0","0","","INT4979007","1");
INSERT INTO history VALUES("380","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 20:30:02","2017-03-06 20:30:02","0","0","","INT4540527","1");
INSERT INTO history VALUES("381","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 20:30:02","2017-03-06 20:30:02","0","0","","INT3342289","1");
INSERT INTO history VALUES("382","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 20:30:02","2017-03-06 20:30:02","0","0","","INT2756661","1");
INSERT INTO history VALUES("383","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 21:30:02","2017-03-06 21:30:02","0","0","","INT8155144","1");
INSERT INTO history VALUES("384","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 21:30:02","2017-03-06 21:30:02","0","0","","INT4157377","1");
INSERT INTO history VALUES("385","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 21:30:02","2017-03-06 21:30:02","0","0","","INT5240956","1");
INSERT INTO history VALUES("386","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 22:30:02","2017-03-06 22:30:02","0","0","","INT9945574","1");
INSERT INTO history VALUES("387","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 22:30:02","2017-03-06 22:30:02","0","0","","INT4477458","1");
INSERT INTO history VALUES("388","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 22:30:02","2017-03-06 22:30:02","0","0","","INT3458554","1");
INSERT INTO history VALUES("389","9","0.26250000","intrest_earned","Interest Earned on 2017-03-06 23:30:02","2017-03-06 23:30:02","0","0","","INT9074379","1");
INSERT INTO history VALUES("390","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 23:30:02","2017-03-06 23:30:02","0","0","","INT1204496","1");
INSERT INTO history VALUES("391","9","0.01063738","intrest_earned","Interest Earned on 2017-03-06 23:30:02","2017-03-06 23:30:02","0","0","","INT4779597","1");
INSERT INTO history VALUES("392","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 01:00:01","2017-03-07 01:00:01","0","0","","INT948287","1");
INSERT INTO history VALUES("393","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 01:00:01","2017-03-07 01:00:01","0","0","","INT7966676","1");
INSERT INTO history VALUES("394","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 01:00:01","2017-03-07 01:00:01","0","0","","INT4962076","1");
INSERT INTO history VALUES("395","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 02:00:02","2017-03-07 02:00:02","0","0","","INT619292","1");
INSERT INTO history VALUES("396","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 02:00:02","2017-03-07 02:00:02","0","0","","INT4889924","1");
INSERT INTO history VALUES("397","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 02:00:02","2017-03-07 02:00:02","0","0","","INT8875697","1");
INSERT INTO history VALUES("398","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 03:00:02","2017-03-07 03:00:02","0","0","","INT8454662","1");
INSERT INTO history VALUES("399","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 03:00:02","2017-03-07 03:00:02","0","0","","INT3062992","1");
INSERT INTO history VALUES("400","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 03:00:02","2017-03-07 03:00:02","0","0","","INT2244218","1");
INSERT INTO history VALUES("401","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 04:00:02","2017-03-07 04:00:02","0","0","","INT2536279","1");
INSERT INTO history VALUES("402","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 04:00:02","2017-03-07 04:00:02","0","0","","INT6297976","1");
INSERT INTO history VALUES("403","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 04:00:02","2017-03-07 04:00:02","0","0","","INT3728521","1");
INSERT INTO history VALUES("404","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 05:00:02","2017-03-07 05:00:02","0","0","","INT4603911","1");
INSERT INTO history VALUES("405","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 05:00:02","2017-03-07 05:00:02","0","0","","INT9559227","1");
INSERT INTO history VALUES("406","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 05:00:02","2017-03-07 05:00:02","0","0","","INT5288186","1");
INSERT INTO history VALUES("407","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 06:00:02","2017-03-07 06:00:02","0","0","","INT1362356","1");
INSERT INTO history VALUES("408","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 06:00:02","2017-03-07 06:00:02","0","0","","INT3124556","1");
INSERT INTO history VALUES("409","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 06:00:02","2017-03-07 06:00:02","0","0","","INT5125766","1");
INSERT INTO history VALUES("410","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 07:00:02","2017-03-07 07:00:02","0","0","","INT1629045","1");
INSERT INTO history VALUES("411","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 07:00:02","2017-03-07 07:00:02","0","0","","INT1310918","1");
INSERT INTO history VALUES("412","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 07:00:02","2017-03-07 07:00:02","0","0","","INT6019576","1");
INSERT INTO history VALUES("413","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 08:30:02","2017-03-07 08:30:02","0","0","","INT9973783","1");
INSERT INTO history VALUES("414","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 08:30:02","2017-03-07 08:30:02","0","0","","INT8535323","1");
INSERT INTO history VALUES("415","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 08:30:02","2017-03-07 08:30:02","0","0","","INT2843182","1");
INSERT INTO history VALUES("416","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 09:30:02","2017-03-07 09:30:02","0","0","","INT3082447","1");
INSERT INTO history VALUES("417","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 09:30:02","2017-03-07 09:30:02","0","0","","INT8275953","1");
INSERT INTO history VALUES("418","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 09:30:02","2017-03-07 09:30:02","0","0","","INT7961604","1");
INSERT INTO history VALUES("419","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 10:30:02","2017-03-07 10:30:02","0","0","","INT7861646","1");
INSERT INTO history VALUES("420","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 10:30:02","2017-03-07 10:30:02","0","0","","INT463613","1");
INSERT INTO history VALUES("421","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 10:30:02","2017-03-07 10:30:02","0","0","","INT9483555","1");
INSERT INTO history VALUES("422","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 11:30:03","2017-03-07 11:30:03","0","0","","INT5943343","1");
INSERT INTO history VALUES("423","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 11:30:03","2017-03-07 11:30:03","0","0","","INT1065405","1");
INSERT INTO history VALUES("424","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 11:30:03","2017-03-07 11:30:03","0","0","","INT2709040","1");
INSERT INTO history VALUES("425","12","1.00000000","deposit","Deposit made through Bit Coin","2017-03-07 11:30:21","38","0","","DEP211538","");
INSERT INTO history VALUES("426","12","0.85000000","release_deposit","Release Deposit Earned","2017-03-07 01:28:35","0","0","","REF2366907","");
INSERT INTO history VALUES("427","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 13:00:01","2017-03-07 13:00:01","0","0","","INT2484647","1");
INSERT INTO history VALUES("428","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 13:00:02","2017-03-07 13:00:02","0","0","","INT9281818","1");
INSERT INTO history VALUES("429","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 13:00:02","2017-03-07 13:00:02","0","0","","INT5348632","1");
INSERT INTO history VALUES("430","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 14:00:02","2017-03-07 14:00:02","0","0","","INT1646793","1");
INSERT INTO history VALUES("431","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 14:00:02","2017-03-07 14:00:02","0","0","","INT6953010","1");
INSERT INTO history VALUES("432","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 14:00:02","2017-03-07 14:00:02","0","0","","INT1575102","1");
INSERT INTO history VALUES("433","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 15:00:02","2017-03-07 15:00:02","0","0","","INT3608577","1");
INSERT INTO history VALUES("434","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 15:00:02","2017-03-07 15:00:02","0","0","","INT2839509","1");
INSERT INTO history VALUES("435","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 15:00:02","2017-03-07 15:00:02","0","0","","INT3754211","1");
INSERT INTO history VALUES("436","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 16:30:01","2017-03-07 16:30:01","0","0","","INT128852","1");
INSERT INTO history VALUES("437","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 16:30:02","2017-03-07 16:30:02","0","0","","INT1126684","1");
INSERT INTO history VALUES("438","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 16:30:02","2017-03-07 16:30:02","0","0","","INT3551959","1");
INSERT INTO history VALUES("439","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 17:30:02","2017-03-07 17:30:02","0","0","","INT969689","1");
INSERT INTO history VALUES("440","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 17:30:02","2017-03-07 17:30:02","0","0","","INT3722670","1");
INSERT INTO history VALUES("441","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 17:30:02","2017-03-07 17:30:02","0","0","","INT1764077","1");
INSERT INTO history VALUES("442","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 18:30:02","2017-03-07 18:30:02","0","0","","INT3550353","1");
INSERT INTO history VALUES("443","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 18:30:02","2017-03-07 18:30:02","0","0","","INT887796","1");
INSERT INTO history VALUES("444","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 18:30:02","2017-03-07 18:30:02","0","0","","INT9255151","1");
INSERT INTO history VALUES("445","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 19:30:02","2017-03-07 19:30:02","0","0","","INT1831883","1");
INSERT INTO history VALUES("446","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 19:30:02","2017-03-07 19:30:02","0","0","","INT2920426","1");
INSERT INTO history VALUES("447","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 19:30:02","2017-03-07 19:30:02","0","0","","INT233189","1");
INSERT INTO history VALUES("448","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 20:30:02","2017-03-07 20:30:02","0","0","","INT422210","1");
INSERT INTO history VALUES("449","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 20:30:02","2017-03-07 20:30:02","0","0","","INT4860072","1");
INSERT INTO history VALUES("450","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 20:30:02","2017-03-07 20:30:02","0","0","","INT6389443","1");
INSERT INTO history VALUES("451","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 21:30:02","2017-03-07 21:30:02","0","0","","INT2330209","1");
INSERT INTO history VALUES("452","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 21:30:02","2017-03-07 21:30:02","0","0","","INT1976940","1");
INSERT INTO history VALUES("453","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 21:30:02","2017-03-07 21:30:02","0","0","","INT8065538","1");
INSERT INTO history VALUES("454","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 22:30:02","2017-03-07 22:30:02","0","0","","INT5816353","1");
INSERT INTO history VALUES("455","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 22:30:02","2017-03-07 22:30:02","0","0","","INT2146702","1");
INSERT INTO history VALUES("456","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 22:30:02","2017-03-07 22:30:02","0","0","","INT8520531","1");
INSERT INTO history VALUES("457","9","0.26250000","intrest_earned","Interest Earned on 2017-03-07 23:30:02","2017-03-07 23:30:02","0","0","","INT8745748","1");
INSERT INTO history VALUES("458","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 23:30:02","2017-03-07 23:30:02","0","0","","INT2310518","1");
INSERT INTO history VALUES("459","9","0.01063738","intrest_earned","Interest Earned on 2017-03-07 23:30:02","2017-03-07 23:30:02","0","0","","INT8157399","1");
INSERT INTO history VALUES("460","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 00:30:02","2017-03-08 00:30:02","0","0","","INT7409253","1");
INSERT INTO history VALUES("461","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 00:30:02","2017-03-08 00:30:02","0","0","","INT2493650","1");
INSERT INTO history VALUES("462","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 00:30:02","2017-03-08 00:30:02","0","0","","INT5233745","1");
INSERT INTO history VALUES("463","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 02:00:02","2017-03-08 02:00:02","0","0","","INT8923126","1");
INSERT INTO history VALUES("464","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 02:00:02","2017-03-08 02:00:02","0","0","","INT9344056","1");
INSERT INTO history VALUES("465","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 02:00:02","2017-03-08 02:00:02","0","0","","INT460973","1");
INSERT INTO history VALUES("466","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 03:00:02","2017-03-08 03:00:02","0","0","","INT2152047","1");
INSERT INTO history VALUES("467","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 03:00:02","2017-03-08 03:00:02","0","0","","INT6724244","1");
INSERT INTO history VALUES("468","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 03:00:02","2017-03-08 03:00:02","0","0","","INT4752600","1");
INSERT INTO history VALUES("469","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 04:00:02","2017-03-08 04:00:02","0","0","","INT4522172","1");
INSERT INTO history VALUES("470","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 04:00:02","2017-03-08 04:00:02","0","0","","INT2832338","1");
INSERT INTO history VALUES("471","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 04:00:02","2017-03-08 04:00:02","0","0","","INT7754374","1");
INSERT INTO history VALUES("472","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 05:00:02","2017-03-08 05:00:02","0","0","","INT7605067","1");
INSERT INTO history VALUES("473","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 05:00:02","2017-03-08 05:00:02","0","0","","INT6547983","1");
INSERT INTO history VALUES("474","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 05:00:02","2017-03-08 05:00:02","0","0","","INT3996001","1");
INSERT INTO history VALUES("475","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 06:00:02","2017-03-08 06:00:02","0","0","","INT7092579","1");
INSERT INTO history VALUES("476","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 06:00:02","2017-03-08 06:00:02","0","0","","INT917644","1");
INSERT INTO history VALUES("477","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 06:00:02","2017-03-08 06:00:02","0","0","","INT9718141","1");
INSERT INTO history VALUES("478","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 07:30:04","2017-03-08 07:30:04","0","0","","INT10344","1");
INSERT INTO history VALUES("479","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 07:30:04","2017-03-08 07:30:04","0","0","","INT178389","1");
INSERT INTO history VALUES("480","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 07:30:04","2017-03-08 07:30:04","0","0","","INT9979026","1");
INSERT INTO history VALUES("481","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 09:00:02","2017-03-08 09:00:02","0","0","","INT7367181","1");
INSERT INTO history VALUES("482","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 09:00:02","2017-03-08 09:00:02","0","0","","INT6586396","1");
INSERT INTO history VALUES("483","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 09:00:02","2017-03-08 09:00:02","0","0","","INT4417978","1");
INSERT INTO history VALUES("484","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 10:00:02","2017-03-08 10:00:02","0","0","","INT6897638","1");
INSERT INTO history VALUES("485","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 10:00:03","2017-03-08 10:00:03","0","0","","INT3127194","1");
INSERT INTO history VALUES("486","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 10:00:03","2017-03-08 10:00:03","0","0","","INT6051586","1");
INSERT INTO history VALUES("487","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 11:00:03","2017-03-08 11:00:03","0","0","","INT5319834","1");
INSERT INTO history VALUES("488","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 11:00:03","2017-03-08 11:00:03","0","0","","INT2711934","1");
INSERT INTO history VALUES("489","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 11:00:03","2017-03-08 11:00:03","0","0","","INT1409807","1");
INSERT INTO history VALUES("490","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 12:30:02","2017-03-08 12:30:02","0","0","","INT2715752","1");
INSERT INTO history VALUES("491","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 12:30:02","2017-03-08 12:30:02","0","0","","INT7543919","1");
INSERT INTO history VALUES("492","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 12:30:02","2017-03-08 12:30:02","0","0","","INT9114564","1");
INSERT INTO history VALUES("493","16","20.00000000","deposit","Deposit made through Bit Coin","2017-03-08 12:37:49","38","0","","DEP5225544","");
INSERT INTO history VALUES("494","17","5.00000000","deposit","Deposit made through Bit Coin","2017-03-08 12:41:04","38","0","","DEP6399810","");
INSERT INTO history VALUES("495","15","0.50000000","deposit","Deposit made through Bit Coin","2017-03-08 12:43:44","38","0","","DEP9368283","");
INSERT INTO history VALUES("496","14","0.05000000","commissions","Referral Commission Earned","2017-03-08 12:43:44","0","0","","REF4735829","");
INSERT INTO history VALUES("497","11","0.00500000","commissions","Referral Commission Earned","2017-03-08 12:43:44","0","0","","REF2634450","");
INSERT INTO history VALUES("498","9","0.00500000","commissions","Referral Commission Earned","2017-03-08 12:43:44","0","0","","REF861083","");
INSERT INTO history VALUES("499","6","0.00500000","commissions","Referral Commission Earned","2017-03-08 12:43:44","0","0","","REF5100505","");
INSERT INTO history VALUES("500","4","0.00000000","commissions","Referral Commission Earned","2017-03-08 12:43:44","0","0","","REF8001666","");
INSERT INTO history VALUES("501","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 13:30:02","2017-03-08 13:30:02","0","0","","INT9240867","1");
INSERT INTO history VALUES("502","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 13:30:02","2017-03-08 13:30:02","0","0","","INT1358568","1");
INSERT INTO history VALUES("503","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 13:30:02","2017-03-08 13:30:02","0","0","","INT9920959","1");
INSERT INTO history VALUES("504","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 14:00:01","2017-03-08 14:00:01","0","0","","INT3486858","1");
INSERT INTO history VALUES("505","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 14:00:01","2017-03-08 14:00:01","0","0","","INT8267703","1");
INSERT INTO history VALUES("506","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 14:00:01","2017-03-08 14:00:01","0","0","","INT2565682","1");
INSERT INTO history VALUES("507","18","5.00000000","deposit","Deposit made through Bit Coin","2017-03-08 14:44:22","38","0","","DEP8980900","");
INSERT INTO history VALUES("508","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 15:00:02","2017-03-08 15:00:02","0","0","","INT3072682","1");
INSERT INTO history VALUES("509","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 15:00:02","2017-03-08 15:00:02","0","0","","INT5713816","1");
INSERT INTO history VALUES("510","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 15:00:02","2017-03-08 15:00:02","0","0","","INT3711028","1");
INSERT INTO history VALUES("511","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 15:00:02","2017-03-08 15:00:02","0","0","","INT7457591","1");
INSERT INTO history VALUES("512","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 15:00:02","2017-03-08 15:00:02","0","0","","INT5864247","1");
INSERT INTO history VALUES("513","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 15:00:02","2017-03-08 15:00:02","0","0","","INT2920206","1");
INSERT INTO history VALUES("514","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 16:00:02","2017-03-08 16:00:02","0","0","","INT6936310","1");
INSERT INTO history VALUES("515","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 16:00:02","2017-03-08 16:00:02","0","0","","INT837954","1");
INSERT INTO history VALUES("516","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 16:00:02","2017-03-08 16:00:02","0","0","","INT7791188","1");
INSERT INTO history VALUES("517","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 16:00:02","2017-03-08 16:00:02","0","0","","INT8855203","1");
INSERT INTO history VALUES("518","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 16:00:03","2017-03-08 16:00:03","0","0","","INT7927684","1");
INSERT INTO history VALUES("519","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 16:00:03","2017-03-08 16:00:03","0","0","","INT6020837","1");
INSERT INTO history VALUES("520","18","0.00250000","intrest_earned","Interest Earned on 2017-03-08 16:00:03","2017-03-08 16:00:03","0","0","","INT6422546","1");
INSERT INTO history VALUES("521","1","1.00000000","deposit","Deposit made through Bit Coin","2017-03-08 16:03:57","38","0","","DEP3210415","");
INSERT INTO history VALUES("522","1","10.00000000","deposit","Deposit made through Bit Coin","2017-03-08 16:05:07","38","0","","DEP9820557","");
INSERT INTO history VALUES("523","1","100.00000000","deposit","Deposit made through Bit Coin","2017-03-08 16:06:41","38","0","","DEP8260914","");
INSERT INTO history VALUES("524","14","1.00000000","deposit","Deposit made through Bit Coin","2017-03-08 16:29:09","38","0","","DEP1674702","");
INSERT INTO history VALUES("525","11","0.10000000","commissions","Referral Commission Earned","2017-03-08 16:29:09","0","0","","REF8368478","");
INSERT INTO history VALUES("526","9","0.01000000","commissions","Referral Commission Earned","2017-03-08 16:29:09","0","0","","REF385867","");
INSERT INTO history VALUES("527","6","0.01000000","commissions","Referral Commission Earned","2017-03-08 16:29:09","0","0","","REF1061383","");
INSERT INTO history VALUES("528","4","0.01000000","commissions","Referral Commission Earned","2017-03-08 16:29:09","0","0","","REF1872582","");
INSERT INTO history VALUES("529","1","0.85000000","release_deposit","Release Deposit Earned","2017-03-08 05:38:59","0","0","","REF3472540","");
INSERT INTO history VALUES("530","1","8.50000000","release_deposit","Release Deposit Earned","2017-03-08 05:52:31","0","0","","REF6064927","");
INSERT INTO history VALUES("531","1","85.00000000","release_deposit","Release Deposit Earned","2017-03-08 05:52:51","0","0","","REF776472","");
INSERT INTO history VALUES("532","1","1.00000000","deposit","Deposit made through Bit Coin","2017-03-08 16:55:47","38","0","","DEP6263351","");
INSERT INTO history VALUES("533","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 17:00:02","2017-03-08 17:00:02","0","0","","INT2385002","1");
INSERT INTO history VALUES("534","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 17:00:02","2017-03-08 17:00:02","0","0","","INT4766076","1");
INSERT INTO history VALUES("535","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 17:00:02","2017-03-08 17:00:02","0","0","","INT8433406","1");
INSERT INTO history VALUES("536","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 17:00:02","2017-03-08 17:00:02","0","0","","INT4080002","1");
INSERT INTO history VALUES("537","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 17:30:02","2017-03-08 17:30:02","0","0","","INT1906787","1");
INSERT INTO history VALUES("538","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 17:30:02","2017-03-08 17:30:02","0","0","","INT8823996","1");
INSERT INTO history VALUES("539","18","0.00250000","intrest_earned","Interest Earned on 2017-03-08 17:30:02","2017-03-08 17:30:02","0","0","","INT8933553","1");
INSERT INTO history VALUES("540","14","0.00050000","intrest_earned","Interest Earned on 2017-03-08 17:30:02","2017-03-08 17:30:02","0","0","","INT540028","1");
INSERT INTO history VALUES("541","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 18:00:02","2017-03-08 18:00:02","0","0","","INT660367","1");
INSERT INTO history VALUES("542","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 18:00:02","2017-03-08 18:00:02","0","0","","INT773754","1");
INSERT INTO history VALUES("543","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 18:00:03","2017-03-08 18:00:03","0","0","","INT9984372","1");
INSERT INTO history VALUES("544","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 18:00:03","2017-03-08 18:00:03","0","0","","INT6328671","1");
INSERT INTO history VALUES("545","1","0.00050000","intrest_earned","Interest Earned on 2017-03-08 18:00:03","2017-03-08 18:00:03","0","0","","INT5280459","1");
INSERT INTO history VALUES("546","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 18:30:02","2017-03-08 18:30:02","0","0","","INT4626210","1");
INSERT INTO history VALUES("547","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 18:30:02","2017-03-08 18:30:02","0","0","","INT1191599","1");
INSERT INTO history VALUES("548","18","0.00250000","intrest_earned","Interest Earned on 2017-03-08 18:30:02","2017-03-08 18:30:02","0","0","","INT1059361","1");
INSERT INTO history VALUES("549","14","0.00050000","intrest_earned","Interest Earned on 2017-03-08 18:30:03","2017-03-08 18:30:03","0","0","","INT2808659","1");
INSERT INTO history VALUES("550","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 19:30:02","2017-03-08 19:30:02","0","0","","INT3713266","1");
INSERT INTO history VALUES("551","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 19:30:02","2017-03-08 19:30:02","0","0","","INT4335197","1");
INSERT INTO history VALUES("552","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 19:30:02","2017-03-08 19:30:02","0","0","","INT6083771","1");
INSERT INTO history VALUES("553","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 19:30:02","2017-03-08 19:30:02","0","0","","INT3411804","1");
INSERT INTO history VALUES("554","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 19:30:02","2017-03-08 19:30:02","0","0","","INT5626918","1");
INSERT INTO history VALUES("555","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 19:30:03","2017-03-08 19:30:03","0","0","","INT2501234","1");
INSERT INTO history VALUES("556","18","0.00250000","intrest_earned","Interest Earned on 2017-03-08 19:30:03","2017-03-08 19:30:03","0","0","","INT7983300","1");
INSERT INTO history VALUES("557","14","0.00050000","intrest_earned","Interest Earned on 2017-03-08 19:30:03","2017-03-08 19:30:03","0","0","","INT9743628","1");
INSERT INTO history VALUES("558","1","0.00050000","intrest_earned","Interest Earned on 2017-03-08 19:30:03","2017-03-08 19:30:03","0","0","","INT5794282","1");
INSERT INTO history VALUES("559","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 20:30:02","2017-03-08 20:30:02","0","0","","INT6145703","1");
INSERT INTO history VALUES("560","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 20:30:02","2017-03-08 20:30:02","0","0","","INT4624963","1");
INSERT INTO history VALUES("561","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 20:30:02","2017-03-08 20:30:02","0","0","","INT8808442","1");
INSERT INTO history VALUES("562","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 20:30:02","2017-03-08 20:30:02","0","0","","INT5901828","1");
INSERT INTO history VALUES("563","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 20:30:03","2017-03-08 20:30:03","0","0","","INT8970027","1");
INSERT INTO history VALUES("564","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 20:30:03","2017-03-08 20:30:03","0","0","","INT5248028","1");
INSERT INTO history VALUES("565","18","0.00250000","intrest_earned","Interest Earned on 2017-03-08 20:30:03","2017-03-08 20:30:03","0","0","","INT9722539","1");
INSERT INTO history VALUES("566","14","0.00050000","intrest_earned","Interest Earned on 2017-03-08 20:30:03","2017-03-08 20:30:03","0","0","","INT817266","1");
INSERT INTO history VALUES("567","1","0.00050000","intrest_earned","Interest Earned on 2017-03-08 20:30:03","2017-03-08 20:30:03","0","0","","INT6316713","1");
INSERT INTO history VALUES("568","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 21:30:02","2017-03-08 21:30:02","0","0","","INT1895497","1");
INSERT INTO history VALUES("569","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 21:30:02","2017-03-08 21:30:02","0","0","","INT6347074","1");
INSERT INTO history VALUES("570","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 21:30:02","2017-03-08 21:30:02","0","0","","INT6825275","1");
INSERT INTO history VALUES("571","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 21:30:02","2017-03-08 21:30:02","0","0","","INT5157818","1");
INSERT INTO history VALUES("572","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 22:00:01","2017-03-08 22:00:01","0","0","","INT9314360","1");
INSERT INTO history VALUES("573","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 22:00:01","2017-03-08 22:00:01","0","0","","INT1825403","1");
INSERT INTO history VALUES("574","18","0.00250000","intrest_earned","Interest Earned on 2017-03-08 22:00:01","2017-03-08 22:00:01","0","0","","INT9195582","1");
INSERT INTO history VALUES("575","14","0.00050000","intrest_earned","Interest Earned on 2017-03-08 22:00:01","2017-03-08 22:00:01","0","0","","INT3131960","1");
INSERT INTO history VALUES("576","1","0.00050000","intrest_earned","Interest Earned on 2017-03-08 22:00:01","2017-03-08 22:00:01","0","0","","INT5122450","1");
INSERT INTO history VALUES("577","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 22:30:02","2017-03-08 22:30:02","0","0","","INT9736495","1");
INSERT INTO history VALUES("578","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 22:30:02","2017-03-08 22:30:02","0","0","","INT5979081","1");
INSERT INTO history VALUES("579","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 22:30:02","2017-03-08 22:30:02","0","0","","INT371997","1");
INSERT INTO history VALUES("580","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 22:30:02","2017-03-08 22:30:02","0","0","","INT1043670","1");
INSERT INTO history VALUES("581","17","0.00250000","intrest_earned","Interest Earned on 2017-03-08 23:00:03","2017-03-08 23:00:03","0","0","","INT7500175","1");
INSERT INTO history VALUES("582","15","0.00025000","intrest_earned","Interest Earned on 2017-03-08 23:00:03","2017-03-08 23:00:03","0","0","","INT740545","1");
INSERT INTO history VALUES("583","18","0.00250000","intrest_earned","Interest Earned on 2017-03-08 23:00:03","2017-03-08 23:00:03","0","0","","INT218796","1");
INSERT INTO history VALUES("584","14","0.00050000","intrest_earned","Interest Earned on 2017-03-08 23:00:03","2017-03-08 23:00:03","0","0","","INT3461406","1");
INSERT INTO history VALUES("585","1","0.00050000","intrest_earned","Interest Earned on 2017-03-08 23:00:03","2017-03-08 23:00:03","0","0","","INT2796439","1");
INSERT INTO history VALUES("586","9","0.26250000","intrest_earned","Interest Earned on 2017-03-08 23:30:02","2017-03-08 23:30:02","0","0","","INT6274856","1");
INSERT INTO history VALUES("587","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 23:30:02","2017-03-08 23:30:02","0","0","","INT281054","1");
INSERT INTO history VALUES("588","9","0.01063738","intrest_earned","Interest Earned on 2017-03-08 23:30:02","2017-03-08 23:30:02","0","0","","INT5938279","1");
INSERT INTO history VALUES("589","16","0.01750000","intrest_earned","Interest Earned on 2017-03-08 23:30:02","2017-03-08 23:30:02","0","0","","INT3197814","1");
INSERT INTO history VALUES("590","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 00:30:02","2017-03-09 00:30:02","0","0","","INT3229930","1");
INSERT INTO history VALUES("591","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 00:30:03","2017-03-09 00:30:03","0","0","","INT5841448","1");
INSERT INTO history VALUES("592","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 00:30:03","2017-03-09 00:30:03","0","0","","INT7671816","1");
INSERT INTO history VALUES("593","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 00:30:03","2017-03-09 00:30:03","0","0","","INT6710478","1");
INSERT INTO history VALUES("594","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 00:30:03","2017-03-09 00:30:03","0","0","","INT4891055","1");
INSERT INTO history VALUES("595","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 00:30:03","2017-03-09 00:30:03","0","0","","INT8649947","1");
INSERT INTO history VALUES("596","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 00:30:03","2017-03-09 00:30:03","0","0","","INT3897790","1");
INSERT INTO history VALUES("597","14","0.00050000","intrest_earned","Interest Earned on 2017-03-09 00:30:03","2017-03-09 00:30:03","0","0","","INT307423","1");
INSERT INTO history VALUES("598","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 00:30:03","2017-03-09 00:30:03","0","0","","INT278785","1");
INSERT INTO history VALUES("599","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 01:30:02","2017-03-09 01:30:02","0","0","","INT817729","1");
INSERT INTO history VALUES("600","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 02:00:02","2017-03-09 02:00:02","0","0","","INT1487953","1");
INSERT INTO history VALUES("601","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 02:00:02","2017-03-09 02:00:02","0","0","","INT4727435","1");
INSERT INTO history VALUES("602","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 02:00:02","2017-03-09 02:00:02","0","0","","INT8446914","1");
INSERT INTO history VALUES("603","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 02:00:02","2017-03-09 02:00:02","0","0","","INT1970889","1");
INSERT INTO history VALUES("604","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 02:00:02","2017-03-09 02:00:02","0","0","","INT1400564","1");
INSERT INTO history VALUES("605","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 02:00:02","2017-03-09 02:00:02","0","0","","INT1318672","1");
INSERT INTO history VALUES("606","14","0.00050000","intrest_earned","Interest Earned on 2017-03-09 02:00:02","2017-03-09 02:00:02","0","0","","INT5713119","1");
INSERT INTO history VALUES("607","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 02:00:02","2017-03-09 02:00:02","0","0","","INT518477","1");
INSERT INTO history VALUES("608","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 02:30:02","2017-03-09 02:30:02","0","0","","INT7166002","1");
INSERT INTO history VALUES("609","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 03:00:02","2017-03-09 03:00:02","0","0","","INT9947032","1");
INSERT INTO history VALUES("610","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 03:00:02","2017-03-09 03:00:02","0","0","","INT9809459","1");
INSERT INTO history VALUES("611","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 03:00:02","2017-03-09 03:00:02","0","0","","INT9888706","1");
INSERT INTO history VALUES("612","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 03:00:02","2017-03-09 03:00:02","0","0","","INT9028582","1");
INSERT INTO history VALUES("613","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 03:00:02","2017-03-09 03:00:02","0","0","","INT8345771","1");
INSERT INTO history VALUES("614","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 03:00:02","2017-03-09 03:00:02","0","0","","INT7079243","1");
INSERT INTO history VALUES("615","14","0.00050000","intrest_earned","Interest Earned on 2017-03-09 03:00:02","2017-03-09 03:00:02","0","0","","INT5910594","1");
INSERT INTO history VALUES("616","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 03:00:02","2017-03-09 03:00:02","0","0","","INT9920191","1");
INSERT INTO history VALUES("617","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 03:30:02","2017-03-09 03:30:02","0","0","","INT7604397","1");
INSERT INTO history VALUES("618","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 04:00:02","2017-03-09 04:00:02","0","0","","INT2157680","1");
INSERT INTO history VALUES("619","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 04:00:02","2017-03-09 04:00:02","0","0","","INT31553","1");
INSERT INTO history VALUES("620","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 04:00:02","2017-03-09 04:00:02","0","0","","INT69373","1");
INSERT INTO history VALUES("621","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 04:00:02","2017-03-09 04:00:02","0","0","","INT3880099","1");
INSERT INTO history VALUES("622","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 04:00:02","2017-03-09 04:00:02","0","0","","INT8069515","1");
INSERT INTO history VALUES("623","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 04:00:02","2017-03-09 04:00:02","0","0","","INT9095966","1");
INSERT INTO history VALUES("624","14","0.00050000","intrest_earned","Interest Earned on 2017-03-09 04:00:02","2017-03-09 04:00:02","0","0","","INT6066560","1");
INSERT INTO history VALUES("625","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 04:00:02","2017-03-09 04:00:02","0","0","","INT7621877","1");
INSERT INTO history VALUES("626","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 04:30:02","2017-03-09 04:30:02","0","0","","INT4762800","1");
INSERT INTO history VALUES("627","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 05:00:02","2017-03-09 05:00:02","0","0","","INT1041882","1");
INSERT INTO history VALUES("628","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 05:00:02","2017-03-09 05:00:02","0","0","","INT7364969","1");
INSERT INTO history VALUES("629","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 05:00:02","2017-03-09 05:00:02","0","0","","INT2476520","1");
INSERT INTO history VALUES("630","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 05:00:02","2017-03-09 05:00:02","0","0","","INT417041","1");
INSERT INTO history VALUES("631","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 05:00:02","2017-03-09 05:00:02","0","0","","INT5179477","1");
INSERT INTO history VALUES("632","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 05:00:02","2017-03-09 05:00:02","0","0","","INT4048820","1");
INSERT INTO history VALUES("633","14","0.00050000","intrest_earned","Interest Earned on 2017-03-09 05:00:02","2017-03-09 05:00:02","0","0","","INT9898808","1");
INSERT INTO history VALUES("634","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 05:00:02","2017-03-09 05:00:02","0","0","","INT9230481","1");
INSERT INTO history VALUES("635","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 05:30:02","2017-03-09 05:30:02","0","0","","INT2528871","1");
INSERT INTO history VALUES("636","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 06:00:02","2017-03-09 06:00:02","0","0","","INT3516807","1");
INSERT INTO history VALUES("637","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 06:00:02","2017-03-09 06:00:02","0","0","","INT8176719","1");
INSERT INTO history VALUES("638","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 06:00:02","2017-03-09 06:00:02","0","0","","INT7197466","1");
INSERT INTO history VALUES("639","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 06:00:02","2017-03-09 06:00:02","0","0","","INT1686048","1");
INSERT INTO history VALUES("640","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 06:00:02","2017-03-09 06:00:02","0","0","","INT2120889","1");
INSERT INTO history VALUES("641","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 06:00:02","2017-03-09 06:00:02","0","0","","INT1107792","1");
INSERT INTO history VALUES("642","14","0.00050000","intrest_earned","Interest Earned on 2017-03-09 06:00:02","2017-03-09 06:00:02","0","0","","INT2875640","1");
INSERT INTO history VALUES("643","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 06:00:02","2017-03-09 06:00:02","0","0","","INT5820183","1");
INSERT INTO history VALUES("644","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 06:30:02","2017-03-09 06:30:02","0","0","","INT4673959","1");
INSERT INTO history VALUES("645","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 07:00:02","2017-03-09 07:00:02","0","0","","INT5487474","1");
INSERT INTO history VALUES("646","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 07:00:02","2017-03-09 07:00:02","0","0","","INT7043444","1");
INSERT INTO history VALUES("647","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 07:00:02","2017-03-09 07:00:02","0","0","","INT9244170","1");
INSERT INTO history VALUES("648","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 07:00:02","2017-03-09 07:00:02","0","0","","INT3790169","1");
INSERT INTO history VALUES("649","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 07:00:02","2017-03-09 07:00:02","0","0","","INT2915058","1");
INSERT INTO history VALUES("650","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 07:00:02","2017-03-09 07:00:02","0","0","","INT9689861","1");
INSERT INTO history VALUES("651","14","0.00050000","intrest_earned","Interest Earned on 2017-03-09 07:00:02","2017-03-09 07:00:02","0","0","","INT4013945","1");
INSERT INTO history VALUES("652","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 07:00:02","2017-03-09 07:00:02","0","0","","INT6892341","1");
INSERT INTO history VALUES("653","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 07:30:02","2017-03-09 07:30:02","0","0","","INT8627201","1");
INSERT INTO history VALUES("654","14","0.85000000","release_deposit","Release Deposit Earned","2017-03-08 20:49:59","0","0","","REF4551263","");
INSERT INTO history VALUES("655","14","0.90000000","withdrawal","Withdraw Request for 0.9 by bitars777","2017-03-09 08:33:46","38","1","","WIT8543043","");
INSERT INTO history VALUES("656","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 08:00:02","2017-03-09 08:00:02","0","0","","INT7249593","1");
INSERT INTO history VALUES("657","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 08:00:02","2017-03-09 08:00:02","0","0","","INT3804420","1");
INSERT INTO history VALUES("658","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 08:00:02","2017-03-09 08:00:02","0","0","","INT3238836","1");
INSERT INTO history VALUES("659","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 08:00:02","2017-03-09 08:00:02","0","0","","INT35813","1");
INSERT INTO history VALUES("660","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 08:00:02","2017-03-09 08:00:02","0","0","","INT7369172","1");
INSERT INTO history VALUES("661","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 08:00:02","2017-03-09 08:00:02","0","0","","INT3553825","1");
INSERT INTO history VALUES("662","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 08:00:02","2017-03-09 08:00:02","0","0","","INT2677268","1");
INSERT INTO history VALUES("663","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 08:30:02","2017-03-09 08:30:02","0","0","","INT5730490","1");
INSERT INTO history VALUES("664","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 09:00:02","2017-03-09 09:00:02","0","0","","INT5177904","1");
INSERT INTO history VALUES("665","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 09:00:02","2017-03-09 09:00:02","0","0","","INT7098742","1");
INSERT INTO history VALUES("666","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 09:00:02","2017-03-09 09:00:02","0","0","","INT5468227","1");
INSERT INTO history VALUES("667","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 09:00:02","2017-03-09 09:00:02","0","0","","INT1248296","1");
INSERT INTO history VALUES("668","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 09:00:02","2017-03-09 09:00:02","0","0","","INT3792656","1");
INSERT INTO history VALUES("669","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 09:00:02","2017-03-09 09:00:02","0","0","","INT7402886","1");
INSERT INTO history VALUES("670","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 09:00:02","2017-03-09 09:00:02","0","0","","INT1353550","1");
INSERT INTO history VALUES("671","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 10:00:01","2017-03-09 10:00:01","0","0","","INT192177","1");
INSERT INTO history VALUES("672","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 10:00:02","2017-03-09 10:00:02","0","0","","INT2784897","1");
INSERT INTO history VALUES("673","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 10:00:02","2017-03-09 10:00:02","0","0","","INT5490674","1");
INSERT INTO history VALUES("674","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 10:00:02","2017-03-09 10:00:02","0","0","","INT7290118","1");
INSERT INTO history VALUES("675","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 10:00:02","2017-03-09 10:00:02","0","0","","INT5464045","1");
INSERT INTO history VALUES("676","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 10:00:02","2017-03-09 10:00:02","0","0","","INT7962838","1");
INSERT INTO history VALUES("677","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 10:00:02","2017-03-09 10:00:02","0","0","","INT8997672","1");
INSERT INTO history VALUES("678","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 10:00:02","2017-03-09 10:00:02","0","0","","INT6020382","1");
INSERT INTO history VALUES("679","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 11:00:03","2017-03-09 11:00:03","0","0","","INT2044485","1");
INSERT INTO history VALUES("680","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 11:00:03","2017-03-09 11:00:03","0","0","","INT6439233","1");
INSERT INTO history VALUES("681","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 11:00:03","2017-03-09 11:00:03","0","0","","INT3752890","1");
INSERT INTO history VALUES("682","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 11:00:03","2017-03-09 11:00:03","0","0","","INT118005","1");
INSERT INTO history VALUES("683","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 11:00:03","2017-03-09 11:00:03","0","0","","INT5714148","1");
INSERT INTO history VALUES("684","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 11:00:03","2017-03-09 11:00:03","0","0","","INT9093836","1");
INSERT INTO history VALUES("685","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 11:00:03","2017-03-09 11:00:03","0","0","","INT4050866","1");
INSERT INTO history VALUES("686","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 11:00:03","2017-03-09 11:00:03","0","0","","INT7594410","1");
INSERT INTO history VALUES("687","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 12:30:01","2017-03-09 12:30:01","0","0","","INT8751116","1");
INSERT INTO history VALUES("688","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 12:30:02","2017-03-09 12:30:02","0","0","","INT8416353","1");
INSERT INTO history VALUES("689","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 12:30:02","2017-03-09 12:30:02","0","0","","INT5878663","1");
INSERT INTO history VALUES("690","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 12:30:03","2017-03-09 12:30:03","0","0","","INT8084312","1");
INSERT INTO history VALUES("691","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 12:30:03","2017-03-09 12:30:03","0","0","","INT2947889","1");
INSERT INTO history VALUES("692","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 12:30:03","2017-03-09 12:30:03","0","0","","INT3260206","1");
INSERT INTO history VALUES("693","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 12:30:03","2017-03-09 12:30:03","0","0","","INT9446185","1");
INSERT INTO history VALUES("694","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 12:30:03","2017-03-09 12:30:03","0","0","","INT4165634","1");
INSERT INTO history VALUES("695","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 13:30:02","2017-03-09 13:30:02","0","0","","INT964117","1");
INSERT INTO history VALUES("696","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 13:30:02","2017-03-09 13:30:02","0","0","","INT7973682","1");
INSERT INTO history VALUES("697","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 13:30:02","2017-03-09 13:30:02","0","0","","INT1986190","1");
INSERT INTO history VALUES("698","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 14:00:01","2017-03-09 14:00:01","0","0","","INT6271798","1");
INSERT INTO history VALUES("699","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 14:00:02","2017-03-09 14:00:02","0","0","","INT3382319","1");
INSERT INTO history VALUES("700","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 14:00:02","2017-03-09 14:00:02","0","0","","INT1123192","1");
INSERT INTO history VALUES("701","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 14:00:02","2017-03-09 14:00:02","0","0","","INT2157531","1");
INSERT INTO history VALUES("702","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 14:00:02","2017-03-09 14:00:02","0","0","","INT8958912","1");
INSERT INTO history VALUES("703","25","0.01000000","deposit","Deposit made through Bit Coin","2017-03-09 14:24:07","38","0","","DEP8099499","");
INSERT INTO history VALUES("704","14","0.00100000","commissions","Referral Commission Earned","2017-03-09 14:24:07","0","0","","REF3563669","");
INSERT INTO history VALUES("705","11","0.00010000","commissions","Referral Commission Earned","2017-03-09 14:24:07","0","0","","REF1752342","");
INSERT INTO history VALUES("706","9","0.00010000","commissions","Referral Commission Earned","2017-03-09 14:24:07","0","0","","REF841366","");
INSERT INTO history VALUES("707","6","0.00010000","commissions","Referral Commission Earned","2017-03-09 14:24:07","0","0","","REF3510758","");
INSERT INTO history VALUES("708","4","0.00000000","commissions","Referral Commission Earned","2017-03-09 14:24:08","0","0","","REF3137118","");
INSERT INTO history VALUES("709","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 15:00:02","2017-03-09 15:00:02","0","0","","INT8337224","1");
INSERT INTO history VALUES("710","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 15:00:02","2017-03-09 15:00:02","0","0","","INT8950148","1");
INSERT INTO history VALUES("711","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 15:00:02","2017-03-09 15:00:02","0","0","","INT7163765","1");
INSERT INTO history VALUES("712","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 15:00:02","2017-03-09 15:00:02","0","0","","INT8286049","1");
INSERT INTO history VALUES("713","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 15:00:02","2017-03-09 15:00:02","0","0","","INT5893886","1");
INSERT INTO history VALUES("714","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 15:00:02","2017-03-09 15:00:02","0","0","","INT9292373","1");
INSERT INTO history VALUES("715","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 15:00:02","2017-03-09 15:00:02","0","0","","INT9277164","1");
INSERT INTO history VALUES("716","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 15:00:02","2017-03-09 15:00:02","0","0","","INT9442860","1");
INSERT INTO history VALUES("717","25","0.00000500","intrest_earned","Interest Earned on 2017-03-09 15:30:02","2017-03-09 15:30:02","0","0","","INT8759388","1");
INSERT INTO history VALUES("718","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 16:00:02","2017-03-09 16:00:02","0","0","","INT2173660","1");
INSERT INTO history VALUES("719","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 16:00:02","2017-03-09 16:00:02","0","0","","INT7545955","1");
INSERT INTO history VALUES("720","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 16:30:02","2017-03-09 16:30:02","0","0","","INT4348411","1");
INSERT INTO history VALUES("721","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 16:30:02","2017-03-09 16:30:02","0","0","","INT2560327","1");
INSERT INTO history VALUES("722","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 16:30:02","2017-03-09 16:30:02","0","0","","INT8243560","1");
INSERT INTO history VALUES("723","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 16:30:02","2017-03-09 16:30:02","0","0","","INT2175664","1");
INSERT INTO history VALUES("724","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 16:30:02","2017-03-09 16:30:02","0","0","","INT301313","1");
INSERT INTO history VALUES("725","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 16:30:02","2017-03-09 16:30:02","0","0","","INT3931506","1");
INSERT INTO history VALUES("726","25","0.00000500","intrest_earned","Interest Earned on 2017-03-09 16:30:02","2017-03-09 16:30:02","0","0","","INT2944197","1");
INSERT INTO history VALUES("727","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 17:00:02","2017-03-09 17:00:02","0","0","","INT2636310","1");
INSERT INTO history VALUES("728","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 17:00:02","2017-03-09 17:00:02","0","0","","INT9578937","1");
INSERT INTO history VALUES("729","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 17:30:02","2017-03-09 17:30:02","0","0","","INT2960836","1");
INSERT INTO history VALUES("730","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 17:30:02","2017-03-09 17:30:02","0","0","","INT7051369","1");
INSERT INTO history VALUES("731","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 17:30:02","2017-03-09 17:30:02","0","0","","INT179952","1");
INSERT INTO history VALUES("732","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 17:30:02","2017-03-09 17:30:02","0","0","","INT9607988","1");
INSERT INTO history VALUES("733","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 17:30:02","2017-03-09 17:30:02","0","0","","INT6033335","1");
INSERT INTO history VALUES("734","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 17:30:02","2017-03-09 17:30:02","0","0","","INT6993799","1");
INSERT INTO history VALUES("735","25","0.00000500","intrest_earned","Interest Earned on 2017-03-09 17:30:02","2017-03-09 17:30:02","0","0","","INT9332774","1");
INSERT INTO history VALUES("736","2","1.11000000","deposit","Deposit made through Bit Coin","2017-03-09 17:51:08","38","0","","DEP755621","");
INSERT INTO history VALUES("737","1","0.11100000","commissions","Referral Commission Earned","2017-03-09 17:51:08","0","0","","REF8368299","");
INSERT INTO history VALUES("738","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 18:00:02","2017-03-09 18:00:02","0","0","","INT7701702","1");
INSERT INTO history VALUES("739","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 18:00:02","2017-03-09 18:00:02","0","0","","INT2493575","1");
INSERT INTO history VALUES("740","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT3199381","1");
INSERT INTO history VALUES("741","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT3035018","1");
INSERT INTO history VALUES("742","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT9010073","1");
INSERT INTO history VALUES("743","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT8462097","1");
INSERT INTO history VALUES("744","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT5037414","1");
INSERT INTO history VALUES("745","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT7035521","1");
INSERT INTO history VALUES("746","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT2554389","1");
INSERT INTO history VALUES("747","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT5555803","1");
INSERT INTO history VALUES("748","25","0.00000500","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT472443","1");
INSERT INTO history VALUES("749","2","0.00055500","intrest_earned","Interest Earned on 2017-03-09 19:00:02","2017-03-09 19:00:02","0","0","","INT588306","1");
INSERT INTO history VALUES("750","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT8829332","1");
INSERT INTO history VALUES("751","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT1467583","1");
INSERT INTO history VALUES("752","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT7607390","1");
INSERT INTO history VALUES("753","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT1405534","1");
INSERT INTO history VALUES("754","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT5726775","1");
INSERT INTO history VALUES("755","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT782904","1");
INSERT INTO history VALUES("756","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT9191349","1");
INSERT INTO history VALUES("757","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT5725982","1");
INSERT INTO history VALUES("758","25","0.00000500","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT1835474","1");
INSERT INTO history VALUES("759","2","0.00055500","intrest_earned","Interest Earned on 2017-03-09 20:30:02","2017-03-09 20:30:02","0","0","","INT5271770","1");
INSERT INTO history VALUES("760","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT1780011","1");
INSERT INTO history VALUES("761","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT1634390","1");
INSERT INTO history VALUES("762","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT5358548","1");
INSERT INTO history VALUES("763","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT9022362","1");
INSERT INTO history VALUES("764","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT354816","1");
INSERT INTO history VALUES("765","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT4984643","1");
INSERT INTO history VALUES("766","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT8045201","1");
INSERT INTO history VALUES("767","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT1048997","1");
INSERT INTO history VALUES("768","25","0.00000500","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT4062314","1");
INSERT INTO history VALUES("769","2","0.00055500","intrest_earned","Interest Earned on 2017-03-09 21:30:02","2017-03-09 21:30:02","0","0","","INT1959155","1");
INSERT INTO history VALUES("770","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT5390523","1");
INSERT INTO history VALUES("771","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT3338130","1");
INSERT INTO history VALUES("772","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT3228776","1");
INSERT INTO history VALUES("773","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT3969786","1");
INSERT INTO history VALUES("774","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT3326820","1");
INSERT INTO history VALUES("775","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT4073366","1");
INSERT INTO history VALUES("776","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT7413372","1");
INSERT INTO history VALUES("777","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT5050502","1");
INSERT INTO history VALUES("778","25","0.00000500","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT5505677","1");
INSERT INTO history VALUES("779","2","0.00055500","intrest_earned","Interest Earned on 2017-03-09 22:30:02","2017-03-09 22:30:02","0","0","","INT1432322","1");
INSERT INTO history VALUES("780","9","0.26250000","intrest_earned","Interest Earned on 2017-03-09 23:30:02","2017-03-09 23:30:02","0","0","","INT3747971","1");
INSERT INTO history VALUES("781","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 23:30:02","2017-03-09 23:30:02","0","0","","INT4754642","1");
INSERT INTO history VALUES("782","9","0.01063738","intrest_earned","Interest Earned on 2017-03-09 23:30:02","2017-03-09 23:30:02","0","0","","INT3595199","1");
INSERT INTO history VALUES("783","16","0.01750000","intrest_earned","Interest Earned on 2017-03-09 23:30:03","2017-03-09 23:30:03","0","0","","INT1522061","1");
INSERT INTO history VALUES("784","17","0.00250000","intrest_earned","Interest Earned on 2017-03-09 23:30:03","2017-03-09 23:30:03","0","0","","INT4478586","1");
INSERT INTO history VALUES("785","15","0.00025000","intrest_earned","Interest Earned on 2017-03-09 23:30:03","2017-03-09 23:30:03","0","0","","INT5796742","1");
INSERT INTO history VALUES("786","18","0.00250000","intrest_earned","Interest Earned on 2017-03-09 23:30:03","2017-03-09 23:30:03","0","0","","INT4260426","1");
INSERT INTO history VALUES("787","1","0.00050000","intrest_earned","Interest Earned on 2017-03-09 23:30:03","2017-03-09 23:30:03","0","0","","INT4996485","1");
INSERT INTO history VALUES("788","25","0.00000500","intrest_earned","Interest Earned on 2017-03-09 23:30:03","2017-03-09 23:30:03","0","0","","INT8213195","1");
INSERT INTO history VALUES("789","2","0.00055500","intrest_earned","Interest Earned on 2017-03-09 23:30:03","2017-03-09 23:30:03","0","0","","INT1322490","1");
INSERT INTO history VALUES("790","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 01:00:01","2017-03-10 01:00:01","0","0","","INT8670428","1");
INSERT INTO history VALUES("791","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 01:00:01","2017-03-10 01:00:01","0","0","","INT5100776","1");
INSERT INTO history VALUES("792","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 01:00:01","2017-03-10 01:00:01","0","0","","INT1880202","1");
INSERT INTO history VALUES("793","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 01:00:01","2017-03-10 01:00:01","0","0","","INT314539","1");
INSERT INTO history VALUES("794","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 01:00:01","2017-03-10 01:00:01","0","0","","INT2631035","1");
INSERT INTO history VALUES("795","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 01:00:01","2017-03-10 01:00:01","0","0","","INT7952452","1");
INSERT INTO history VALUES("796","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 01:00:01","2017-03-10 01:00:01","0","0","","INT3570986","1");
INSERT INTO history VALUES("797","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 01:00:01","2017-03-10 01:00:01","0","0","","INT556364","1");
INSERT INTO history VALUES("798","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 01:00:02","2017-03-10 01:00:02","0","0","","INT5811118","1");
INSERT INTO history VALUES("799","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 01:00:02","2017-03-10 01:00:02","0","0","","INT9569341","1");
INSERT INTO history VALUES("800","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT7510420","1");
INSERT INTO history VALUES("801","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT9363774","1");
INSERT INTO history VALUES("802","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT121818","1");
INSERT INTO history VALUES("803","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT3597660","1");
INSERT INTO history VALUES("804","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT7857180","1");
INSERT INTO history VALUES("805","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT141655","1");
INSERT INTO history VALUES("806","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT7753892","1");
INSERT INTO history VALUES("807","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT3790373","1");
INSERT INTO history VALUES("808","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT4911439","1");
INSERT INTO history VALUES("809","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 02:00:02","2017-03-10 02:00:02","0","0","","INT546832","1");
INSERT INTO history VALUES("810","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT6654421","1");
INSERT INTO history VALUES("811","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT1779295","1");
INSERT INTO history VALUES("812","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT7504193","1");
INSERT INTO history VALUES("813","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT7001505","1");
INSERT INTO history VALUES("814","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT9733111","1");
INSERT INTO history VALUES("815","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT4692291","1");
INSERT INTO history VALUES("816","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT4929462","1");
INSERT INTO history VALUES("817","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT4416802","1");
INSERT INTO history VALUES("818","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT1554381","1");
INSERT INTO history VALUES("819","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 03:00:02","2017-03-10 03:00:02","0","0","","INT4190595","1");
INSERT INTO history VALUES("820","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT6890884","1");
INSERT INTO history VALUES("821","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT3536890","1");
INSERT INTO history VALUES("822","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT2849843","1");
INSERT INTO history VALUES("823","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT7534367","1");
INSERT INTO history VALUES("824","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT3879701","1");
INSERT INTO history VALUES("825","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT149811","1");
INSERT INTO history VALUES("826","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT3747219","1");
INSERT INTO history VALUES("827","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT8890751","1");
INSERT INTO history VALUES("828","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT2809242","1");
INSERT INTO history VALUES("829","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 04:00:02","2017-03-10 04:00:02","0","0","","INT1147627","1");
INSERT INTO history VALUES("830","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT9642626","1");
INSERT INTO history VALUES("831","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT7991637","1");
INSERT INTO history VALUES("832","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT9954598","1");
INSERT INTO history VALUES("833","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT163046","1");
INSERT INTO history VALUES("834","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT6895396","1");
INSERT INTO history VALUES("835","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT8096591","1");
INSERT INTO history VALUES("836","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT7026286","1");
INSERT INTO history VALUES("837","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT6729914","1");
INSERT INTO history VALUES("838","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT8143274","1");
INSERT INTO history VALUES("839","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 05:00:02","2017-03-10 05:00:02","0","0","","INT5036619","1");
INSERT INTO history VALUES("840","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT5866703","1");
INSERT INTO history VALUES("841","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT2898416","1");
INSERT INTO history VALUES("842","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT6385627","1");
INSERT INTO history VALUES("843","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT1941116","1");
INSERT INTO history VALUES("844","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT3960795","1");
INSERT INTO history VALUES("845","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT1421402","1");
INSERT INTO history VALUES("846","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT3698116","1");
INSERT INTO history VALUES("847","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT3246127","1");
INSERT INTO history VALUES("848","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT5150163","1");
INSERT INTO history VALUES("849","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 06:30:02","2017-03-10 06:30:02","0","0","","INT4762004","1");
INSERT INTO history VALUES("850","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT1670290","1");
INSERT INTO history VALUES("851","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT5195438","1");
INSERT INTO history VALUES("852","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT138787","1");
INSERT INTO history VALUES("853","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT7326594","1");
INSERT INTO history VALUES("854","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT2554681","1");
INSERT INTO history VALUES("855","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT6126982","1");
INSERT INTO history VALUES("856","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT7535275","1");
INSERT INTO history VALUES("857","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT5673237","1");
INSERT INTO history VALUES("858","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT2838837","1");
INSERT INTO history VALUES("859","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 07:30:02","2017-03-10 07:30:02","0","0","","INT4084846","1");
INSERT INTO history VALUES("860","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 08:30:02","2017-03-10 08:30:02","0","0","","INT24203","1");
INSERT INTO history VALUES("861","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT354934","1");
INSERT INTO history VALUES("862","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT5482828","1");
INSERT INTO history VALUES("863","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT3308961","1");
INSERT INTO history VALUES("864","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT9401074","1");
INSERT INTO history VALUES("865","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT8026232","1");
INSERT INTO history VALUES("866","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT2681108","1");
INSERT INTO history VALUES("867","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT9382773","1");
INSERT INTO history VALUES("868","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT200672","1");
INSERT INTO history VALUES("869","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 08:30:03","2017-03-10 08:30:03","0","0","","INT4464332","1");
INSERT INTO history VALUES("870","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 09:30:02","2017-03-10 09:30:02","0","0","","INT8344872","1");
INSERT INTO history VALUES("871","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT7336019","1");
INSERT INTO history VALUES("872","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT476387","1");
INSERT INTO history VALUES("873","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT8677202","1");
INSERT INTO history VALUES("874","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT3563016","1");
INSERT INTO history VALUES("875","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT9690081","1");
INSERT INTO history VALUES("876","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT3487232","1");
INSERT INTO history VALUES("877","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT8306959","1");
INSERT INTO history VALUES("878","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT6990700","1");
INSERT INTO history VALUES("879","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 09:30:03","2017-03-10 09:30:03","0","0","","INT4710468","1");
INSERT INTO history VALUES("880","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 10:30:02","2017-03-10 10:30:02","0","0","","INT2319417","1");
INSERT INTO history VALUES("881","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT7258663","1");
INSERT INTO history VALUES("882","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT8831076","1");
INSERT INTO history VALUES("883","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT3391982","1");
INSERT INTO history VALUES("884","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT8673195","1");
INSERT INTO history VALUES("885","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT8892087","1");
INSERT INTO history VALUES("886","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT2884417","1");
INSERT INTO history VALUES("887","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT4869946","1");
INSERT INTO history VALUES("888","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT9116609","1");
INSERT INTO history VALUES("889","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 10:30:03","2017-03-10 10:30:03","0","0","","INT8739431","1");
INSERT INTO history VALUES("890","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 11:30:02","2017-03-10 11:30:02","0","0","","INT6179488","1");
INSERT INTO history VALUES("891","2","5.25000000","deposit","Deposit made through Bit Coin","2017-03-10 11:58:17","38","0","","DEP5540808","");
INSERT INTO history VALUES("892","1","0.52500000","commissions","Referral Commission Earned","2017-03-10 11:58:17","0","0","","REF8572484","");
INSERT INTO history VALUES("893","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT9888658","1");
INSERT INTO history VALUES("894","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT9283455","1");
INSERT INTO history VALUES("895","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT4054005","1");
INSERT INTO history VALUES("896","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT3539312","1");
INSERT INTO history VALUES("897","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT3867531","1");
INSERT INTO history VALUES("898","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT7745628","1");
INSERT INTO history VALUES("899","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT7866291","1");
INSERT INTO history VALUES("900","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT8260680","1");
INSERT INTO history VALUES("901","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 12:00:02","2017-03-10 12:00:02","0","0","","INT7435883","1");
INSERT INTO history VALUES("902","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 12:30:02","2017-03-10 12:30:02","0","0","","INT3878218","1");
INSERT INTO history VALUES("903","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT6435614","1");
INSERT INTO history VALUES("904","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT5227904","1");
INSERT INTO history VALUES("905","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT5096477","1");
INSERT INTO history VALUES("906","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT7696997","1");
INSERT INTO history VALUES("907","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT727030","1");
INSERT INTO history VALUES("908","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT344984","1");
INSERT INTO history VALUES("909","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT2999301","1");
INSERT INTO history VALUES("910","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT9415881","1");
INSERT INTO history VALUES("911","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT1524303","1");
INSERT INTO history VALUES("912","2","0.00262500","intrest_earned","Interest Earned on 2017-03-10 13:00:02","2017-03-10 13:00:02","0","0","","INT3946164","1");
INSERT INTO history VALUES("913","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 14:00:02","2017-03-10 14:00:02","0","0","","INT7676412","1");
INSERT INTO history VALUES("914","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 14:00:02","2017-03-10 14:00:02","0","0","","INT4944586","1");
INSERT INTO history VALUES("915","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 14:00:02","2017-03-10 14:00:02","0","0","","INT5347099","1");
INSERT INTO history VALUES("916","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 14:00:02","2017-03-10 14:00:02","0","0","","INT7412858","1");
INSERT INTO history VALUES("917","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 14:00:02","2017-03-10 14:00:02","0","0","","INT341816","1");
INSERT INTO history VALUES("918","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 14:00:02","2017-03-10 14:00:02","0","0","","INT9169468","1");
INSERT INTO history VALUES("919","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 14:00:02","2017-03-10 14:00:02","0","0","","INT5447840","1");
INSERT INTO history VALUES("920","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 14:00:03","2017-03-10 14:00:03","0","0","","INT6287002","1");
INSERT INTO history VALUES("921","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 14:00:03","2017-03-10 14:00:03","0","0","","INT7622050","1");
INSERT INTO history VALUES("922","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 14:00:03","2017-03-10 14:00:03","0","0","","INT6091468","1");
INSERT INTO history VALUES("923","2","0.00262500","intrest_earned","Interest Earned on 2017-03-10 14:00:03","2017-03-10 14:00:03","0","0","","INT2081180","1");
INSERT INTO history VALUES("924","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 15:00:02","2017-03-10 15:00:02","0","0","","INT8323278","1");
INSERT INTO history VALUES("925","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 15:00:02","2017-03-10 15:00:02","0","0","","INT4524179","1");
INSERT INTO history VALUES("926","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 15:00:02","2017-03-10 15:00:02","0","0","","INT7882283","1");
INSERT INTO history VALUES("927","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 15:00:02","2017-03-10 15:00:02","0","0","","INT2484834","1");
INSERT INTO history VALUES("928","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 15:00:02","2017-03-10 15:00:02","0","0","","INT8261187","1");
INSERT INTO history VALUES("929","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 15:00:02","2017-03-10 15:00:02","0","0","","INT6589894","1");
INSERT INTO history VALUES("930","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 15:00:02","2017-03-10 15:00:02","0","0","","INT7985726","1");
INSERT INTO history VALUES("931","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 15:30:02","2017-03-10 15:30:02","0","0","","INT8039522","1");
INSERT INTO history VALUES("932","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 15:30:02","2017-03-10 15:30:02","0","0","","INT793544","1");
INSERT INTO history VALUES("933","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 15:30:02","2017-03-10 15:30:02","0","0","","INT8885083","1");
INSERT INTO history VALUES("934","2","0.00262500","intrest_earned","Interest Earned on 2017-03-10 15:30:02","2017-03-10 15:30:02","0","0","","INT246890","1");
INSERT INTO history VALUES("935","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 16:00:02","2017-03-10 16:00:02","0","0","","INT5051187","1");
INSERT INTO history VALUES("936","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 16:00:02","2017-03-10 16:00:02","0","0","","INT9963299","1");
INSERT INTO history VALUES("937","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 16:00:02","2017-03-10 16:00:02","0","0","","INT235229","1");
INSERT INTO history VALUES("938","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 16:00:02","2017-03-10 16:00:02","0","0","","INT8693050","1");
INSERT INTO history VALUES("939","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 16:00:02","2017-03-10 16:00:02","0","0","","INT4192470","1");
INSERT INTO history VALUES("940","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 16:00:02","2017-03-10 16:00:02","0","0","","INT6219179","1");
INSERT INTO history VALUES("941","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 16:00:02","2017-03-10 16:00:02","0","0","","INT8226427","1");
INSERT INTO history VALUES("942","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 16:30:02","2017-03-10 16:30:02","0","0","","INT841008","1");
INSERT INTO history VALUES("943","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 16:30:02","2017-03-10 16:30:02","0","0","","INT810096","1");
INSERT INTO history VALUES("944","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 16:30:02","2017-03-10 16:30:02","0","0","","INT9892691","1");
INSERT INTO history VALUES("945","2","0.00262500","intrest_earned","Interest Earned on 2017-03-10 16:30:02","2017-03-10 16:30:02","0","0","","INT2469186","1");
INSERT INTO history VALUES("946","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 17:00:02","2017-03-10 17:00:02","0","0","","INT266759","1");
INSERT INTO history VALUES("947","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 17:00:02","2017-03-10 17:00:02","0","0","","INT9482274","1");
INSERT INTO history VALUES("948","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 17:00:02","2017-03-10 17:00:02","0","0","","INT4776551","1");
INSERT INTO history VALUES("949","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 17:00:02","2017-03-10 17:00:02","0","0","","INT3234718","1");
INSERT INTO history VALUES("950","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 17:00:02","2017-03-10 17:00:02","0","0","","INT3266424","1");
INSERT INTO history VALUES("951","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 17:00:02","2017-03-10 17:00:02","0","0","","INT5551486","1");
INSERT INTO history VALUES("952","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 17:00:02","2017-03-10 17:00:02","0","0","","INT8586883","1");
INSERT INTO history VALUES("953","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 17:30:02","2017-03-10 17:30:02","0","0","","INT1220810","1");
INSERT INTO history VALUES("954","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 17:30:02","2017-03-10 17:30:02","0","0","","INT863301","1");
INSERT INTO history VALUES("955","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 17:30:02","2017-03-10 17:30:02","0","0","","INT3734218","1");
INSERT INTO history VALUES("956","2","0.00262500","intrest_earned","Interest Earned on 2017-03-10 17:30:02","2017-03-10 17:30:02","0","0","","INT6129746","1");
INSERT INTO history VALUES("957","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 18:30:01","2017-03-10 18:30:01","0","0","","INT2643006","1");
INSERT INTO history VALUES("958","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 18:30:01","2017-03-10 18:30:01","0","0","","INT6220297","1");
INSERT INTO history VALUES("959","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 18:30:01","2017-03-10 18:30:01","0","0","","INT2084817","1");
INSERT INTO history VALUES("960","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 18:30:01","2017-03-10 18:30:01","0","0","","INT8473045","1");
INSERT INTO history VALUES("961","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 18:30:01","2017-03-10 18:30:01","0","0","","INT1500447","1");
INSERT INTO history VALUES("962","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 18:30:01","2017-03-10 18:30:01","0","0","","INT9047120","1");
INSERT INTO history VALUES("963","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 18:30:01","2017-03-10 18:30:01","0","0","","INT9533790","1");
INSERT INTO history VALUES("964","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 19:00:02","2017-03-10 19:00:02","0","0","","INT5096132","1");
INSERT INTO history VALUES("965","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 19:00:02","2017-03-10 19:00:02","0","0","","INT8946997","1");
INSERT INTO history VALUES("966","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 19:00:02","2017-03-10 19:00:02","0","0","","INT9502053","1");
INSERT INTO history VALUES("967","2","0.00262500","intrest_earned","Interest Earned on 2017-03-10 19:00:02","2017-03-10 19:00:02","0","0","","INT9735098","1");
INSERT INTO history VALUES("968","9","0.26250000","intrest_earned","Interest Earned on 2017-03-10 19:30:02","2017-03-10 19:30:02","0","0","","INT8652673","1");
INSERT INTO history VALUES("969","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 19:30:02","2017-03-10 19:30:02","0","0","","INT4290863","1");
INSERT INTO history VALUES("970","9","0.01063738","intrest_earned","Interest Earned on 2017-03-10 19:30:02","2017-03-10 19:30:02","0","0","","INT786035","1");
INSERT INTO history VALUES("971","16","0.01750000","intrest_earned","Interest Earned on 2017-03-10 19:30:02","2017-03-10 19:30:02","0","0","","INT6925640","1");
INSERT INTO history VALUES("972","17","0.00250000","intrest_earned","Interest Earned on 2017-03-10 19:30:02","2017-03-10 19:30:02","0","0","","INT7240553","1");
INSERT INTO history VALUES("973","15","0.00025000","intrest_earned","Interest Earned on 2017-03-10 19:30:02","2017-03-10 19:30:02","0","0","","INT823688","1");
INSERT INTO history VALUES("974","18","0.00250000","intrest_earned","Interest Earned on 2017-03-10 19:30:02","2017-03-10 19:30:02","0","0","","INT1573232","1");
INSERT INTO history VALUES("975","1","0.00050000","intrest_earned","Interest Earned on 2017-03-10 20:30:01","2017-03-10 20:30:01","0","0","","INT5656512","1");
INSERT INTO history VALUES("976","25","0.00000500","intrest_earned","Interest Earned on 2017-03-10 20:30:01","2017-03-10 20:30:01","0","0","","INT9316394","1");
INSERT INTO history VALUES("977","2","0.00055500","intrest_earned","Interest Earned on 2017-03-10 20:30:02","2017-03-10 20:30:02","0","0","","INT7385001","1");
INSERT INTO history VALUES("978","2","0.00262500","intrest_earned","Interest Earned on 2017-03-10 20:30:02","2017-03-10 20:30:02","0","0","","INT8849816","1");



Drop table if exists  homepage;

CREATE TABLE `homepage` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `banner_status` enum('active','suspend') CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'active',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO homepage VALUES("7","uploadimages/homepage/20110420bannerq.gif","active");



Drop table if exists  instant_pay;

CREATE TABLE `instant_pay` (
  `pay_id` int(20) NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(30) DEFAULT NULL,
  `payment_info` varchar(30) DEFAULT NULL,
  `payout_info` text,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO instant_pay VALUES("1","Payza","Payza Username","payza@payza.com");
INSERT INTO instant_pay VALUES("2","Payza","Payza API Password","QocSQZqdTkaXLAWW");
INSERT INTO instant_pay VALUES("3","Perfect Money","Perfect Money Account Id","");
INSERT INTO instant_pay VALUES("4","Perfect Money","Perfect Money Passphrase Id","");
INSERT INTO instant_pay VALUES("5","Liberty Reserve","Liberty Reserve API Name","");
INSERT INTO instant_pay VALUES("6","Liberty Reserve","Liberty Reserve Security Word","");
INSERT INTO instant_pay VALUES("7","Liberty Reserve ","Liberty Reserve Account Number","U123456");
INSERT INTO instant_pay VALUES("8","Advcash ","Advcash account ID","");
INSERT INTO instant_pay VALUES("9","Advcash ","Advcash API name","");
INSERT INTO instant_pay VALUES("10","Advcash ","Advcash API password","");



Drop table if exists  ipn_handle;

CREATE TABLE `ipn_handle` (
  `handle_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) DEFAULT NULL,
  `amount` double(30,8) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_id` text,
  `post_contents` text,
  `pay_id` int(1) DEFAULT NULL,
  `returncontent` varchar(255) DEFAULT NULL,
  `post_contents1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`handle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

INSERT INTO ipn_handle VALUES("1","4","0.01000000","2017-02-24 07:13:35","CPBB2KGCSV3F9DJ8V1JUUNV5LL","{\"ipn_version\":\"1.0\",\"ipn_id\":\"45fc07076d7050ec1a707dcbc5e40356\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB2KGCSV3F9DJ8V1JUUNV5LL\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"8\",\"quantity\":\"1\",\"first_name\":\"yamada\",\"last_name\":\"taishi\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("2","4","0.01000000","2017-02-24 07:15:11","CPBB2KGCSV3F9DJ8V1JUUNV5LL","{\"ipn_version\":\"1.0\",\"ipn_id\":\"f5c716f5aa128592423a36014000e4f4\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB2KGCSV3F9DJ8V1JUUNV5LL\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"8\",\"quantity\":\"1\",\"first_name\":\"yamada\",\"last_name\":\"taishi\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.01\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.01/0.01 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("3","4","0.01000000","2017-02-24 07:34:06","CPBB2KGCSV3F9DJ8V1JUUNV5LL","{\"ipn_version\":\"1.0\",\"ipn_id\":\"f5a5c8641c22221bc867e04aa54570f0\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB2KGCSV3F9DJ8V1JUUNV5LL\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"8\",\"quantity\":\"1\",\"first_name\":\"yamada\",\"last_name\":\"taishi\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.01\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.01/0.01 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("4","4","0.01000000","2017-02-24 08:08:17","CPBB2KGCSV3F9DJ8V1JUUNV5LL","{\"ipn_version\":\"1.0\",\"ipn_id\":\"fb764e130407a61184b521d0dc051aff\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB2KGCSV3F9DJ8V1JUUNV5LL\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"8\",\"quantity\":\"1\",\"first_name\":\"yamada\",\"last_name\":\"taishi\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.01\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("5","3","0.00100000","2017-02-24 11:49:38","CPBB3CPW60HVSOTHUDBLP3UOK8","{\"ipn_version\":\"1.0\",\"ipn_id\":\"035e49022912120bc5e3f385554be124\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3CPW60HVSOTHUDBLP3UOK8\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"surf920@gmail.com\",\"item_number\":\"3\",\"on1\":\"3\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("6","3","0.00100000","2017-02-24 11:50:43","CPBB3CPW60HVSOTHUDBLP3UOK8","{\"ipn_version\":\"1.0\",\"ipn_id\":\"b68f82f19e8c9c26d4e8050a72285700\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3CPW60HVSOTHUDBLP3UOK8\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"surf920@gmail.com\",\"item_number\":\"3\",\"on1\":\"3\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("7","3","0.01000000","2017-02-24 11:57:08","CPBB0JVAV3GV4RVWPVUWD56CHF","{\"ipn_version\":\"1.0\",\"ipn_id\":\"a016da250917496762cbec84415ce02f\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0JVAV3GV4RVWPVUWD56CHF\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"saakata\",\"last_name\":\"sakata\",\"email\":\"bat24x@gmail.com\",\"item_number\":\"3\",\"on1\":\"3\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("8","3","0.00100000","2017-02-24 12:04:33","CPBB3CPW60HVSOTHUDBLP3UOK8","{\"ipn_version\":\"1.0\",\"ipn_id\":\"3be8b7c4a4429560607265fbffe007e4\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3CPW60HVSOTHUDBLP3UOK8\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"surf920@gmail.com\",\"item_number\":\"3\",\"on1\":\"3\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("9","3","0.01000000","2017-02-25 03:25:06","CPBB0JVAV3GV4RVWPVUWD56CHF","{\"ipn_version\":\"1.0\",\"ipn_id\":\"06b78d25a866300d0f8cd619a538d077\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0JVAV3GV4RVWPVUWD56CHF\",\"status\":\"-1\",\"status_text\":\"Cancelled / Timed Out\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"saakata\",\"last_name\":\"sakata\",\"email\":\"bat24x@gmail.com\",\"item_number\":\"3\",\"on1\":\"3\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Cancelled / Timed Out","payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent");
INSERT INTO ipn_handle VALUES("10","6","0.00100000","2017-02-25 09:42:04","CPBB3VRA4A94SANOZUXR22GCSC","{\"ipn_version\":\"1.0\",\"ipn_id\":\"8435fa8f19112f3a499109de54b3b922\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3VRA4A94SANOZUXR22GCSC\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aa\",\"last_name\":\"bb\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("11","6","0.00100000","2017-02-25 10:00:49","CPBB3VRA4A94SANOZUXR22GCSC","{\"ipn_version\":\"1.0\",\"ipn_id\":\"e31b9c518632f7e435a58b205b583ab6\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3VRA4A94SANOZUXR22GCSC\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aa\",\"last_name\":\"bb\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("12","6","0.00100000","2017-02-26 11:11:09","CPBB3MJ5AZFHDMQOZLEZESRXPT","{\"ipn_version\":\"1.0\",\"ipn_id\":\"7751b6b20f385b056780bb1d45748314\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3MJ5AZFHDMQOZLEZESRXPT\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"8\",\"quantity\":\"1\",\"first_name\":\"dd\",\"last_name\":\"dd\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("13","6","0.00100000","2017-02-26 11:11:21","CPBB3MJ5AZFHDMQOZLEZESRXPT","{\"ipn_version\":\"1.0\",\"ipn_id\":\"79d6a3e68b37b2372a96375ac883cb0c\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3MJ5AZFHDMQOZLEZESRXPT\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"8\",\"quantity\":\"1\",\"first_name\":\"dd\",\"last_name\":\"dd\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("14","6","0.00100000","2017-02-26 11:34:44","CPBB3MJ5AZFHDMQOZLEZESRXPT","{\"ipn_version\":\"1.0\",\"ipn_id\":\"37ac923664466141bbcab1cb9031a865\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3MJ5AZFHDMQOZLEZESRXPT\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"8\",\"quantity\":\"1\",\"first_name\":\"dd\",\"last_name\":\"dd\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.001/0.001 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("15","6","0.00100000","2017-02-26 11:54:16","CPBB3MJ5AZFHDMQOZLEZESRXPT","{\"ipn_version\":\"1.0\",\"ipn_id\":\"08040b10e2bfac4d046410f5ed42bebe\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3MJ5AZFHDMQOZLEZESRXPT\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"8\",\"quantity\":\"1\",\"first_name\":\"dd\",\"last_name\":\"dd\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("16","6","0.01000000","2017-02-27 04:49:55","CPBB0UULUIDKQXYEN085020RSC","{\"ipn_version\":\"1.0\",\"ipn_id\":\"a560dc617490a0e1f4a4cbc7d2ee9f68\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0UULUIDKQXYEN085020RSC\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.01\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.01/0.01 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("17","6","0.01000000","2017-02-27 04:53:06","CPBB0UULUIDKQXYEN085020RSC","{\"ipn_version\":\"1.0\",\"ipn_id\":\"b487527fd07e3f79c2963db41fb8ce9b\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0UULUIDKQXYEN085020RSC\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.01\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.01/0.01 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("18","6","0.01000000","2017-02-27 05:00:12","CPBB0UULUIDKQXYEN085020RSC","{\"ipn_version\":\"1.0\",\"ipn_id\":\"8c417d8a29e57ed94980cccb2761382d\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0UULUIDKQXYEN085020RSC\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.01\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("19","4","0.01000000","2017-02-27 05:09:17","CPBB3WPVDUMY4KIW01I4KGORKK","{\"ipn_version\":\"1.0\",\"ipn_id\":\"c7754a062736c6f9e1d349e432bd203d\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3WPVDUMY4KIW01I4KGORKK\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"9\",\"quantity\":\"1\",\"first_name\":\"ee\",\"last_name\":\"gg\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.01\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.01/0.01 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("20","4","0.01000000","2017-02-27 05:16:12","CPBB3WPVDUMY4KIW01I4KGORKK","{\"ipn_version\":\"1.0\",\"ipn_id\":\"0161716e22fcd065f3b76b9345b8769c\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3WPVDUMY4KIW01I4KGORKK\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"9\",\"quantity\":\"1\",\"first_name\":\"ee\",\"last_name\":\"gg\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.01\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.01/0.01 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("21","4","0.01000000","2017-02-27 05:20:53","CPBB3WPVDUMY4KIW01I4KGORKK","{\"ipn_version\":\"1.0\",\"ipn_id\":\"a5a12ccb1cf1160a17c645233ed02624\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3WPVDUMY4KIW01I4KGORKK\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"9\",\"quantity\":\"1\",\"first_name\":\"ee\",\"last_name\":\"gg\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.01\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("22","1","0.10000000","2017-02-27 13:05:02","CPBB1LUWE3AZUOE8UI1XTREWMZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"30b9bf93d3dd2402286e56ac7f720e46\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB1LUWE3AZUOE8UI1XTREWMZ\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.1\",\"amount2\":\"0.1\",\"subtotal\":\"0.1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.0005\",\"item_amount\":\"0.1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aaaaaa\",\"last_name\":\"xxxxx\",\"email\":\"surf920@gmail.com\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("23","1","0.10000000","2017-02-27 13:10:03","CPBB1LUWE3AZUOE8UI1XTREWMZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"bafc317feffb3b92f5ab67c77e634b85\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB1LUWE3AZUOE8UI1XTREWMZ\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.1/0.1 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.1\",\"amount2\":\"0.1\",\"subtotal\":\"0.1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.0005\",\"item_amount\":\"0.1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aaaaaa\",\"last_name\":\"xxxxx\",\"email\":\"surf920@gmail.com\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0.1\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.1/0.1 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("24","1","0.10000000","2017-02-27 13:18:13","CPBB1LUWE3AZUOE8UI1XTREWMZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"d0a0704aa7d66e179ec863470899ab56\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB1LUWE3AZUOE8UI1XTREWMZ\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.1/0.1 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.1\",\"amount2\":\"0.1\",\"subtotal\":\"0.1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.0005\",\"item_amount\":\"0.1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aaaaaa\",\"last_name\":\"xxxxx\",\"email\":\"surf920@gmail.com\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0.1\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.1/0.1 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("25","1","0.10000000","2017-02-27 13:26:02","CPBB1LUWE3AZUOE8UI1XTREWMZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"79c429ed10075549105e3599b37709e7\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB1LUWE3AZUOE8UI1XTREWMZ\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.1\",\"amount2\":\"0.1\",\"subtotal\":\"0.1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.0005\",\"item_amount\":\"0.1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aaaaaa\",\"last_name\":\"xxxxx\",\"email\":\"surf920@gmail.com\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0.1\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("26","6","0.00100000","2017-02-27 14:25:07","CPBB0YYOHWP6UUYXL16R7JLBBH","{\"ipn_version\":\"1.0\",\"ipn_id\":\"b2af03634a2a040d4ac2bb2d4f8d940b\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0YYOHWP6UUYXL16R7JLBBH\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"xxxx\",\"last_name\":\"xxxx\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("27","6","0.00100000","2017-02-27 14:26:03","CPBB0YYOHWP6UUYXL16R7JLBBH","{\"ipn_version\":\"1.0\",\"ipn_id\":\"cda05cf4ec2f5ef8e121a9095da81a65\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0YYOHWP6UUYXL16R7JLBBH\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"xxxx\",\"last_name\":\"xxxx\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("28","6","0.00100000","2017-02-27 14:38:12","CPBB0YYOHWP6UUYXL16R7JLBBH","{\"ipn_version\":\"1.0\",\"ipn_id\":\"484af3651c16884494a985b107c2f6f0\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0YYOHWP6UUYXL16R7JLBBH\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"xxxx\",\"last_name\":\"xxxx\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.001/0.001 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("29","6","0.00100000","2017-02-27 14:43:19","CPBB0YYOHWP6UUYXL16R7JLBBH","{\"ipn_version\":\"1.0\",\"ipn_id\":\"773aa681ae44a160ef44b0454ccce130\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB0YYOHWP6UUYXL16R7JLBBH\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"xxxx\",\"last_name\":\"xxxx\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("30","1","0.01000000","2017-02-27 15:04:05","CPBB4EGBVVGJ6H6FY0WQWODWZE","{\"ipn_version\":\"1.0\",\"ipn_id\":\"87b3a643bb46017b7a6000682c34c3d5\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4EGBVVGJ6H6FY0WQWODWZE\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"dddd\",\"last_name\":\"cccc\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("31","1","0.01000000","2017-02-27 15:08:01","CPBB4EGBVVGJ6H6FY0WQWODWZE","{\"ipn_version\":\"1.0\",\"ipn_id\":\"8be9ce2742f38de77c6f29217b41041f\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4EGBVVGJ6H6FY0WQWODWZE\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"dddd\",\"last_name\":\"cccc\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0.01\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.01/0.01 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("32","1","0.01000000","2017-02-27 15:18:06","CPBB4EGBVVGJ6H6FY0WQWODWZE","{\"ipn_version\":\"1.0\",\"ipn_id\":\"3c5aaad1013cf724483a99d7403f198d\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4EGBVVGJ6H6FY0WQWODWZE\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"dddd\",\"last_name\":\"cccc\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0.01\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.01/0.01 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("33","1","0.01000000","2017-02-27 15:28:09","CPBB4EGBVVGJ6H6FY0WQWODWZE","{\"ipn_version\":\"1.0\",\"ipn_id\":\"89fabbe5561469206cc66ab9536b06f5\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4EGBVVGJ6H6FY0WQWODWZE\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"dddd\",\"last_name\":\"cccc\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0.01\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("34","4","0.00100000","2017-02-27 15:41:07","CPBB3TVNCZFP0P2ZWG2ENPCFKN","{\"ipn_version\":\"1.0\",\"ipn_id\":\"c2493e418645df008e27393b3a548f03\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3TVNCZFP0P2ZWG2ENPCFKN\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aa\",\"last_name\":\"111\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("35","4","0.00100000","2017-02-27 15:43:13","CPBB3TVNCZFP0P2ZWG2ENPCFKN","{\"ipn_version\":\"1.0\",\"ipn_id\":\"7032ee090595d64dc5f7666df0aabb3a\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3TVNCZFP0P2ZWG2ENPCFKN\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aa\",\"last_name\":\"111\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("36","4","0.00100000","2017-02-27 16:23:05","CPBB3TVNCZFP0P2ZWG2ENPCFKN","{\"ipn_version\":\"1.0\",\"ipn_id\":\"b329abf99ccdf97f319bbfda83913268\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3TVNCZFP0P2ZWG2ENPCFKN\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aa\",\"last_name\":\"111\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.001\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.001/0.001 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("37","4","0.00100000","2017-02-27 16:46:06","CPBB3TVNCZFP0P2ZWG2ENPCFKN","{\"ipn_version\":\"1.0\",\"ipn_id\":\"29eafe3a68eb7e85c80b01e9b159ad1d\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3TVNCZFP0P2ZWG2ENPCFKN\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"aa\",\"last_name\":\"111\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("38","1","0.00100000","2017-02-27 19:58:46","CPBB4J8BS35KDAG2XYUVEX3472","{\"ipn_version\":\"1.0\",\"ipn_id\":\"72539add5b7344e5926817f95526cb86\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4J8BS35KDAG2XYUVEX3472\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"9\",\"quantity\":\"1\",\"first_name\":\"111\",\"last_name\":\"222\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("39","1","0.00100000","2017-02-27 20:42:47","CPBB4J8BS35KDAG2XYUVEX3472","{\"ipn_version\":\"1.0\",\"ipn_id\":\"438cf0f8deb4755f41d6e31b769b7331\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4J8BS35KDAG2XYUVEX3472\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"9\",\"quantity\":\"1\",\"first_name\":\"111\",\"last_name\":\"222\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"1\",\"on1\":\"1\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("40","4","0.00100000","2017-02-28 13:17:06","CPBB2AQVWPDTCH56GT1R0E8LVT","{\"ipn_version\":\"1.0\",\"ipn_id\":\"a78d976f0439cf859a5e079599879d4d\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB2AQVWPDTCH56GT1R0E8LVT\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawashima\",\"last_name\":\"ss\",\"email\":\"surf920@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("41","4","0.00100000","2017-02-28 13:18:08","CPBB2AQVWPDTCH56GT1R0E8LVT","{\"ipn_version\":\"1.0\",\"ipn_id\":\"d5b5b57da478f31921a3c0f1ccac3175\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB2AQVWPDTCH56GT1R0E8LVT\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawashima\",\"last_name\":\"ss\",\"email\":\"surf920@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("42","4","0.00100000","2017-02-28 13:38:18","CPBB2AQVWPDTCH56GT1R0E8LVT","{\"ipn_version\":\"1.0\",\"ipn_id\":\"dab0ebffd585cd215491ffe760467df1\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB2AQVWPDTCH56GT1R0E8LVT\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawashima\",\"last_name\":\"ss\",\"email\":\"surf920@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.001\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.001/0.001 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("43","4","0.00100000","2017-02-28 13:42:06","CPBB2AQVWPDTCH56GT1R0E8LVT","{\"ipn_version\":\"1.0\",\"ipn_id\":\"e0a717bb201ab8ffaf267013cc363aa5\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB2AQVWPDTCH56GT1R0E8LVT\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawashima\",\"last_name\":\"ss\",\"email\":\"surf920@gmail.com\",\"item_number\":\"4\",\"on1\":\"4\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("44","6","0.00100000","2017-03-01 09:08:09","CPBB7MYDTJGDIQG15TQFW3WCZS","{\"ipn_version\":\"1.0\",\"ipn_id\":\"598a843a040be249b3db50985613c4e7\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB7MYDTJGDIQG15TQFW3WCZS\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawasaki\",\"last_name\":\"ssss\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("45","6","0.00100000","2017-03-01 09:10:35","CPBB7MYDTJGDIQG15TQFW3WCZS","{\"ipn_version\":\"1.0\",\"ipn_id\":\"35b7fbbcfde3df29b32c9a9e19af580e\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB7MYDTJGDIQG15TQFW3WCZS\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawasaki\",\"last_name\":\"ssss\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("46","6","0.00100000","2017-03-01 09:20:12","CPBB4FOWRG2CJ4CUWHXP8KYGEA","{\"ipn_version\":\"1.0\",\"ipn_id\":\"a69a46ad99bf96a78ece5d0082ed50f6\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4FOWRG2CJ4CUWHXP8KYGEA\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawasaki\",\"last_name\":\"sss\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("47","6","0.00100000","2017-03-01 09:21:05","CPBB7MYDTJGDIQG15TQFW3WCZS","{\"ipn_version\":\"1.0\",\"ipn_id\":\"d488f98c4d9b2d343b4eef66f8c6db2f\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB7MYDTJGDIQG15TQFW3WCZS\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawasaki\",\"last_name\":\"ssss\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.001/0.001 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("48","6","0.00100000","2017-03-01 09:22:04","CPBB4FOWRG2CJ4CUWHXP8KYGEA","{\"ipn_version\":\"1.0\",\"ipn_id\":\"df6b013e16a8812d5775e9465fe4e62d\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4FOWRG2CJ4CUWHXP8KYGEA\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawasaki\",\"last_name\":\"sss\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("49","6","0.00100000","2017-03-01 09:28:08","CPBB7MYDTJGDIQG15TQFW3WCZS","{\"ipn_version\":\"1.0\",\"ipn_id\":\"4f3e91cbb44eeede707589f500fa9479\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB7MYDTJGDIQG15TQFW3WCZS\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawasaki\",\"last_name\":\"ssss\",\"email\":\"coginc1173@yahoo.co.jp\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("50","2","0.00100000","2017-03-01 09:28:11","CPBB3OVS7QHZAJ5NVAQZ94THQZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"6fd80723413c45c748b77d4d29df9e88\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3OVS7QHZAJ5NVAQZ94THQZ\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"yamada33\",\"last_name\":\"11\",\"email\":\"surf920@gmail.com\",\"item_number\":\"2\",\"on1\":\"2\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("51","6","0.00100000","2017-03-01 09:31:04","CPBB4FOWRG2CJ4CUWHXP8KYGEA","{\"ipn_version\":\"1.0\",\"ipn_id\":\"8e1519be45a8f2584b15d2e5cc8d66f5\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4FOWRG2CJ4CUWHXP8KYGEA\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawasaki\",\"last_name\":\"sss\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.001/0.001 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("52","6","0.00100000","2017-03-01 09:37:13","CPBB4FOWRG2CJ4CUWHXP8KYGEA","{\"ipn_version\":\"1.0\",\"ipn_id\":\"2cf01e5a9c60bf1fb3cc040dfb3539bc\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB4FOWRG2CJ4CUWHXP8KYGEA\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"kawasaki\",\"last_name\":\"sss\",\"email\":\"coginc2009@gmail.com\",\"item_number\":\"6\",\"on1\":\"6\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("53","2","0.00100000","2017-03-01 09:39:06","CPBB3OVS7QHZAJ5NVAQZ94THQZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"ece54cd3dc086d8176a192b782a16b89\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBB3OVS7QHZAJ5NVAQZ94THQZ\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"yamada33\",\"last_name\":\"11\",\"email\":\"surf920@gmail.com\",\"item_number\":\"2\",\"on1\":\"2\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("54","9","0.00100000","2017-03-01 12:17:04","CPBC345HRUOLSYV5VFNC9ADQT6","{\"ipn_version\":\"1.0\",\"ipn_id\":\"176e1bcd330ce9d769d9bbf6463857d5\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC345HRUOLSYV5VFNC9ADQT6\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Takumi\",\"last_name\":\"Suzuki\",\"email\":\"aiueodesuyo99@gmail.com\",\"item_number\":\"9\",\"on1\":\"9\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("55","9","0.00100000","2017-03-01 12:18:06","CPBC345HRUOLSYV5VFNC9ADQT6","{\"ipn_version\":\"1.0\",\"ipn_id\":\"3417dd1e9a030a3f6549eb34628185af\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC345HRUOLSYV5VFNC9ADQT6\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Takumi\",\"last_name\":\"Suzuki\",\"email\":\"aiueodesuyo99@gmail.com\",\"item_number\":\"9\",\"on1\":\"9\",\"received_amount\":\"0.001\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.001/0.001 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("56","9","0.00100000","2017-03-01 13:07:04","CPBC345HRUOLSYV5VFNC9ADQT6","{\"ipn_version\":\"1.0\",\"ipn_id\":\"e220b14164b235dbf2e70c510baa8a97\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC345HRUOLSYV5VFNC9ADQT6\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.001/0.001 received with 1 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Takumi\",\"last_name\":\"Suzuki\",\"email\":\"aiueodesuyo99@gmail.com\",\"item_number\":\"9\",\"on1\":\"9\",\"received_amount\":\"0.001\",\"received_confirms\":\"1\"}","38","Waiting for confirms... (0.001/0.001 received with 1 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("57","9","0.00100000","2017-03-01 13:19:09","CPBC345HRUOLSYV5VFNC9ADQT6","{\"ipn_version\":\"1.0\",\"ipn_id\":\"785b8213cbd38dc078871ba2846a747a\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC345HRUOLSYV5VFNC9ADQT6\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.001\",\"amount2\":\"0.001\",\"subtotal\":\"0.001\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"1.0E-5\",\"item_amount\":\"0.001\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Takumi\",\"last_name\":\"Suzuki\",\"email\":\"aiueodesuyo99@gmail.com\",\"item_number\":\"9\",\"on1\":\"9\",\"received_amount\":\"0.001\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("58","13","1.00000000","2017-03-06 07:07:11","CPBC3OEI7YDFONPCA8LMKJAKGC","{\"ipn_version\":\"1.0\",\"ipn_id\":\"fc77b78f2b9a6e3a037c909da727130d\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC3OEI7YDFONPCA8LMKJAKGC\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Taro\",\"last_name\":\"Tanaka\",\"email\":\"aiueodesuyoneok-3@yahoo.co.jp\",\"item_number\":\"13\",\"on1\":\"13\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("59","13","1.00000000","2017-03-06 22:43:09","CPBC3OEI7YDFONPCA8LMKJAKGC","{\"ipn_version\":\"1.0\",\"ipn_id\":\"051ec938640f2d9d1d255b8a94daeebd\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC3OEI7YDFONPCA8LMKJAKGC\",\"status\":\"-1\",\"status_text\":\"Cancelled / Timed Out\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Taro\",\"last_name\":\"Tanaka\",\"email\":\"aiueodesuyoneok-3@yahoo.co.jp\",\"item_number\":\"13\",\"on1\":\"13\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Cancelled / Timed Out","payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent");
INSERT INTO ipn_handle VALUES("60","15","1.00000000","2017-03-08 14:18:07","CPBC0NNE41GQVEB7EVBXDJEKVJ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"690055e1efa05a73212641eb453c7128\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC0NNE41GQVEB7EVBXDJEKVJ\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"sakata\",\"last_name\":\"yoichi\",\"email\":\"coconala315@gmail.com\",\"item_number\":\"15\",\"on1\":\"15\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("61","15","1.00000000","2017-03-08 14:41:08","CPBC1OG2ULWZ9LUNCKLLMG57YR","{\"ipn_version\":\"1.0\",\"ipn_id\":\"8fd5c02d0a80f793dd4a5de359314d89\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC1OG2ULWZ9LUNCKLLMG57YR\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"sakata\",\"last_name\":\"youichi\",\"email\":\"sakatayoiti@gmail.com\",\"item_number\":\"15\",\"on1\":\"15\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("62","14","1.00000000","2017-03-08 15:56:10","CPBC58ODMY9SBDKTIYGLZJEGCZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"7c1cd77390969192dc5dda052d8c97c2\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC58ODMY9SBDKTIYGLZJEGCZ\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"bnkm2020@gmail.com\",\"item_number\":\"14\",\"on1\":\"14\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("63","14","1.00000000","2017-03-08 15:57:09","CPBC58ODMY9SBDKTIYGLZJEGCZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"10ba5a293ca3ae3475b86fb5c8786e35\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC58ODMY9SBDKTIYGLZJEGCZ\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (1/1 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"bnkm2020@gmail.com\",\"item_number\":\"14\",\"on1\":\"14\",\"received_amount\":\"1\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (1/1 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("64","14","1.00000000","2017-03-08 16:23:08","CPBC58ODMY9SBDKTIYGLZJEGCZ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"e6e491111105d21ca7d2b94bf4b0398a\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC58ODMY9SBDKTIYGLZJEGCZ\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"a\",\"last_name\":\"a\",\"email\":\"bnkm2020@gmail.com\",\"item_number\":\"14\",\"on1\":\"14\",\"received_amount\":\"1\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("65","15","1.00000000","2017-03-09 04:51:11","CPBC0NNE41GQVEB7EVBXDJEKVJ","{\"ipn_version\":\"1.0\",\"ipn_id\":\"23e0c7febacc65a39341654fcf78607f\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC0NNE41GQVEB7EVBXDJEKVJ\",\"status\":\"-1\",\"status_text\":\"Cancelled / Timed Out\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"sakata\",\"last_name\":\"yoichi\",\"email\":\"coconala315@gmail.com\",\"item_number\":\"15\",\"on1\":\"15\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Cancelled / Timed Out","payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent");
INSERT INTO ipn_handle VALUES("66","15","1.00000000","2017-03-09 05:15:09","CPBC1OG2ULWZ9LUNCKLLMG57YR","{\"ipn_version\":\"1.0\",\"ipn_id\":\"e8689e16c5f3e637a927832418078948\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC1OG2ULWZ9LUNCKLLMG57YR\",\"status\":\"-1\",\"status_text\":\"Cancelled / Timed Out\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"sakata\",\"last_name\":\"youichi\",\"email\":\"sakatayoiti@gmail.com\",\"item_number\":\"15\",\"on1\":\"15\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Cancelled / Timed Out","payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent");
INSERT INTO ipn_handle VALUES("67","25","0.01000000","2017-03-09 11:44:11","CPBC0E1XGUBTQBIVENXL1JLZOU","{\"ipn_version\":\"1.0\",\"ipn_id\":\"eaa356dd5ab623ce70fb91f6c8277b47\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC0E1XGUBTQBIVENXL1JLZOU\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"tanno\",\"last_name\":\"yuko\",\"email\":\"yuko.tanno@gmail.com\",\"item_number\":\"25\",\"on1\":\"25\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("68","25","0.01000000","2017-03-09 11:48:11","CPBC0E1XGUBTQBIVENXL1JLZOU","{\"ipn_version\":\"1.0\",\"ipn_id\":\"ee873eb338980b69c723561ff7780252\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC0E1XGUBTQBIVENXL1JLZOU\",\"status\":\"0\",\"status_text\":\"Waiting for confirms... (0.01/0.01 received with 0 confirms)\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"tanno\",\"last_name\":\"yuko\",\"email\":\"yuko.tanno@gmail.com\",\"item_number\":\"25\",\"on1\":\"25\",\"received_amount\":\"0.01\",\"received_confirms\":\"0\"}","38","Waiting for confirms... (0.01/0.01 received with 0 confirms)","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("69","25","0.01000000","2017-03-09 14:17:08","CPBC0E1XGUBTQBIVENXL1JLZOU","{\"ipn_version\":\"1.0\",\"ipn_id\":\"b6df112b6058ca961fdc1ff13ab11578\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC0E1XGUBTQBIVENXL1JLZOU\",\"status\":\"1\",\"status_text\":\"Funds received and confirmed, sending to you shortly...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"tanno\",\"last_name\":\"yuko\",\"email\":\"yuko.tanno@gmail.com\",\"item_number\":\"25\",\"on1\":\"25\",\"received_amount\":\"0.01\",\"received_confirms\":\"2\"}","38","Funds received and confirmed, sending to you shortly...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("70","44","1.00000000","2017-03-09 21:38:11","CPBC5VRZ5HJKJ6EYGB7BH2HI3C","{\"ipn_version\":\"1.0\",\"ipn_id\":\"84909f78a929f7d84afff31d38fe13f1\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC5VRZ5HJKJ6EYGB7BH2HI3C\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Koichi\",\"last_name\":\"Nishimura\",\"email\":\"assetincrease.119@gmail.com\",\"item_number\":\"44\",\"on1\":\"44\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("71","44","0.01000000","2017-03-09 21:41:07","CPBC0NQVHLHFN9B32TEYFQ0GG8","{\"ipn_version\":\"1.0\",\"ipn_id\":\"8599499817b03f73c2aa4a4b072f248c\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC0NQVHLHFN9B32TEYFQ0GG8\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Koichi\",\"last_name\":\"Nishimura\",\"email\":\"assetincrease.119@gmail.com\",\"item_number\":\"44\",\"on1\":\"44\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("72","44","0.01000000","2017-03-09 21:48:09","CPBC4K7LRPEPM9SEDNIGRTXVYD","{\"ipn_version\":\"1.0\",\"ipn_id\":\"f83cdda6d14ddce3e7fe4c047c6d0b8a\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC4K7LRPEPM9SEDNIGRTXVYD\",\"status\":\"0\",\"status_text\":\"Waiting for buyer funds...\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Assetincrease\",\"email\":\"assetincrease.119@gmail.com\",\"item_number\":\"44\",\"on1\":\"44\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Waiting for buyer funds...","payment is pending, you can optionally add a note to the order page");
INSERT INTO ipn_handle VALUES("73","44","1.00000000","2017-03-10 12:41:08","CPBC5VRZ5HJKJ6EYGB7BH2HI3C","{\"ipn_version\":\"1.0\",\"ipn_id\":\"54d0cacc37e94377e96b6e26d686ad1e\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC5VRZ5HJKJ6EYGB7BH2HI3C\",\"status\":\"-1\",\"status_text\":\"Cancelled / Timed Out\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"1\",\"amount2\":\"1\",\"subtotal\":\"1\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"0.005\",\"item_amount\":\"1\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Koichi\",\"last_name\":\"Nishimura\",\"email\":\"assetincrease.119@gmail.com\",\"item_number\":\"44\",\"on1\":\"44\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Cancelled / Timed Out","payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent");
INSERT INTO ipn_handle VALUES("74","44","0.01000000","2017-03-10 12:45:10","CPBC0NQVHLHFN9B32TEYFQ0GG8","{\"ipn_version\":\"1.0\",\"ipn_id\":\"278e9f3ef105f2501cdd05f028943ca9\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC0NQVHLHFN9B32TEYFQ0GG8\",\"status\":\"-1\",\"status_text\":\"Cancelled / Timed Out\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Koichi\",\"last_name\":\"Nishimura\",\"email\":\"assetincrease.119@gmail.com\",\"item_number\":\"44\",\"on1\":\"44\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Cancelled / Timed Out","payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent");
INSERT INTO ipn_handle VALUES("75","44","0.01000000","2017-03-10 12:52:09","CPBC4K7LRPEPM9SEDNIGRTXVYD","{\"ipn_version\":\"1.0\",\"ipn_id\":\"c3c3e87c569424bd23d2b62a4c62de3b\",\"ipn_mode\":\"httpauth\",\"merchant\":\"71b63c939d015eb2976a1cff5b48bf0c\",\"ipn_type\":\"button\",\"txn_id\":\"CPBC4K7LRPEPM9SEDNIGRTXVYD\",\"status\":\"-1\",\"status_text\":\"Cancelled / Timed Out\",\"currency1\":\"BTC\",\"currency2\":\"BTC\",\"amount1\":\"0.01\",\"amount2\":\"0.01\",\"subtotal\":\"0.01\",\"shipping\":\"0\",\"tax\":\"0\",\"fee\":\"5.0E-5\",\"item_amount\":\"0.01\",\"item_name\":\"6\",\"quantity\":\"1\",\"first_name\":\"Assetincrease\",\"email\":\"assetincrease.119@gmail.com\",\"item_number\":\"44\",\"on1\":\"44\",\"received_amount\":\"0\",\"received_confirms\":\"0\"}","38","Cancelled / Timed Out","payment error, this is usually final but payments will sometimes be reopened if there was no exchange rate conversion or with seller consent");



Drop table if exists  latest_news;

CREATE TABLE `latest_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` datetime DEFAULT NULL,
  `news_header` varchar(100) DEFAULT NULL,
  `news_description` text,
  `status` enum('on','off') DEFAULT 'on',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO latest_news VALUES("1","2016-08-22 18:36:53","Latest News1","A New plan ","on");



Drop table if exists  level_commission;

CREATE TABLE `level_commission` (
  `level_id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(60) DEFAULT NULL,
  `level_commission` double(30,8) DEFAULT NULL,
  `plan_id` int(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=319 DEFAULT CHARSET=latin1;

INSERT INTO level_commission VALUES("318","4","1.00000000","6","");
INSERT INTO level_commission VALUES("317","3","1.00000000","6","");
INSERT INTO level_commission VALUES("306","4","1.00000000","5","");
INSERT INTO level_commission VALUES("305","3","1.00000000","5","");
INSERT INTO level_commission VALUES("310","4","1.00000000","3","");
INSERT INTO level_commission VALUES("309","3","1.00000000","3","");
INSERT INTO level_commission VALUES("304","2","1.00000000","5","");
INSERT INTO level_commission VALUES("303","1","15.00000000","5","");
INSERT INTO level_commission VALUES("308","2","1.00000000","3","");
INSERT INTO level_commission VALUES("307","1","25.00000000","3","");
INSERT INTO level_commission VALUES("316","2","1.00000000","6","");
INSERT INTO level_commission VALUES("315","1","10.00000000","6","");
INSERT INTO level_commission VALUES("289","1","0.20000000","10","");
INSERT INTO level_commission VALUES("290","1","0.20000000","11","");



Drop table if exists  live_statistics;

CREATE TABLE `live_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `started` date DEFAULT NULL,
  `runningdays` int(20) DEFAULT NULL,
  `totacc` int(20) DEFAULT NULL,
  `actacc` int(20) DEFAULT NULL,
  `totdep` decimal(10,8) DEFAULT NULL,
  `totwithdraw` decimal(10,8) DEFAULT NULL,
  `newmember` varchar(250) DEFAULT NULL,
  `lastwithdraw` decimal(10,8) DEFAULT NULL,
  `visitoronline` int(20) DEFAULT NULL,
  `memberonline` int(20) DEFAULT NULL,
  `lastupdate` date DEFAULT NULL,
  `lastdep` decimal(10,8) DEFAULT NULL,
  `editrunning` int(20) DEFAULT NULL,
  `editaccounts` int(20) DEFAULT NULL,
  `editactaccounts` int(20) DEFAULT NULL,
  `editdeposit` int(20) DEFAULT NULL,
  `editwithdraw` varchar(110) DEFAULT NULL,
  `editnewmember` int(20) DEFAULT NULL,
  `editlastwithdraw` int(20) DEFAULT NULL,
  `editlastdeposit` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

INSERT INTO live_statistics VALUES("1","2012-09-14","1","1","1","0.00100000","0.00000000","Jhon","0.00000000","1","25","2012-08-30","0.00100000","1","1","1","1","1","1","1","1");



Drop table if exists  mail_subjects;

CREATE TABLE `mail_subjects` (
  `mail_id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` varchar(50) DEFAULT NULL,
  `mailfrom` varchar(100) DEFAULT NULL,
  `mailsubject` varchar(255) DEFAULT NULL,
  `message` text,
  `status` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`mail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO mail_subjects VALUES("1","admin@bat24x.com","Administrator","Verify your e-mail address","<p>Dear [FIRSTNAME],</p><p>Your account has been successfully created.</p><p><br></p><p>Please click the below link to activate your account;</p><p>Email : [EMAIL]</p><p><br></p><p>Copy and paste this link to your browser for active your account:</p></p>[URL]</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminmail</p><p>Thanks and Regards</p><p>Admin #sitename</p>","1");
INSERT INTO mail_subjects VALUES("2","admin@bat24x.com","Administrator","Account Information","<p>Dear [FIRSTNAME],</p><p>This is to confirm that your account verification has successfully done in #sitename. Now you can login using your User Name and Password.</p><p><br></p><p>The following are your login details</p><p>Username : [USERNAME]</p><p>Password : [PASSWORD]</p><p>Your Referal ID : [REFERRAL_ID]</p><p>Your Referal Link : [REFERRAL_LINK]</p><p><br></p><p>Copy and paste this link to your browser for Login:</p></p>#verfyurl</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</p><p>Thanks and Regards</p><p>Bat24x Support Team</p><p>#sitename</p>","1");
INSERT INTO mail_subjects VALUES("3","admin@bat24x.com","Administrator","Retreive Password","<p>Dear [FIRSTNAME],</p><p>Your account Details has been retrieved Successfully.</p><p><br></p><p>The following are your login details</p><p>Username : [USERNAME]</p><p>Password  : [PASSWORD] </p><p><br></p><p>Copy and paste this link to your browser for Login:</p></p>#verfyurl</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</p><p>Thanks and Regards</p><p>Admin #sitename</p>","1");
INSERT INTO mail_subjects VALUES("4","admin@bat24x.com","Administrator","Profile Updated","<p>Dear [FIRSTNAME],</p><p>Your Profile has been successfully updated.</p><p><br></p><p>Please check you profile and account detail.</p><p>Copy and paste this link to your browser for Login:</p></p>#verfyurl</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</p><p>Thanks and Regards</p><p>Admin #sitename</p>","1");
INSERT INTO mail_subjects VALUES("5","admin@bat24x.com","Accounts"," Investment Information","<p>Dear [FIRSTNAME],</p><p>Thank You for your investment with us.</p><p><br></p><p>For your convenience, we have included a copy of your Investment below.</p><p>Investment Amount : [AMT] BTC</p><p>Plan Name : [PLAN] </p><p>Payment Mode : [PAYMENT]</p><p>Transaction Id : [transid]</p><p><br></p><p>Copy and paste this link to your browser for Login:</p></p>#verfyurl</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</p><p>Thanks and Regards</p><p>Bat24x Support Team</p><p>#sitename</p>","1");
INSERT INTO mail_subjects VALUES("6","admin@bat24x.com","Accounts"," Withdrawal Information.","<p>Dear [FIRSTNAME],</p><p>Your payout request made successfully.</p><p><br></p><p>For your convenience, we have included a details of payout request below.</p><p>Payout Amount : [TXTAMT] BTC</p><p>Payout request date : [WITHDRAWDATE]</p><p>Batch Number : [transid]</p><p><br></p><p>Copy and paste this link to your browser for Login:</p></p>#verfyurl</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</p><p>Thanks and Regards</p><p>Bat24x Support Team</p><p>#sitename</p>","1");
INSERT INTO mail_subjects VALUES("7","admin@bat24x.com","Administrator","Welcome Mail","<p>Dear [FIRSTNAME],</p><p><br></p><p>Congratulations and welcome to the #sitename Program! You have been approved as an #sitename. To access your #sitename account, please click on the following link and enter your username and password as provided below</p><p><br></p><p>The following are your login details</p><p>Username : [USERNAME]</p><p>Password : [PASSWORD]</p><p>Your Referal ID : [REFERRAL_ID]</p><p>Your Referal Link : [REFERRAL_LINK]</p><p><br></p><p>Copy and paste this link to your browser for Login:</p></p>#verfyurl</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</p><p>Thanks and Regards</p><p>Admin #sitename</p>","1");
INSERT INTO mail_subjects VALUES("8","admin@bat24x.com","Accounts","Deposit","<p>Hello [FIRSTNAME],</p><p><br></p><p>Congratulations and welcome to the #sitename ! Your Deposit has made successfully in #sitename.</p><p><br></p><p>The following are your deposit details.</p><p>Amount : #amt BTC</p><p>Payment Gateway : #payement</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</p><p>Thanks and Regards</p><p>Bat24x Support Team</p><p>#sitename</p>","1");
INSERT INTO mail_subjects VALUES("9","admin@bat24x.com","Accounts","Payment Made","<p>Dear [FIRSTNAME],</p><p>Welcome to the #sitename !This is to confirm you that your payment has made successfully in #sitename.</p><p>The following are your payment details</p><p>Amount : #amt</p><p>Payment Gateway : #payement</p><p>Copy and paste this link to your browser for Login:</p><p>#verfyurl </p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</strong></p><p><br></p><p>Thanks and Regards</p><p>Bat24x Support Team</p><p>#sitename</p>","1");
INSERT INTO mail_subjects VALUES("10","admin@bat24x.com","Accounts","Withdrawal","<p>Hello [FIRSTNAME],</p><p><br></p><p>Your payout request made successfully.</p><p><br></p><p>For your convenience, we have included a details of payout below.</p><p>Payout Amount : [TXTAMT] BTC</p><p>Payout date : [WITHDRAWDATE]</p><p>Batch Number : [transid]</p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</p><p>Thanks and Regards</p><p>Bat24x Support Team</p><p>#sitename</p>","1");
INSERT INTO mail_subjects VALUES("11","admin@bat24x.com","Accounts","Withdrawcode","<p>Hello [FIRSTNAME],</p><p>We have received a request from your User ID [FIRSTNAME]. This is a double protection email to cross check the authenticity of this operation.</p><p>You are required to enter the code below in the back office to verify this operation.</p><p><br></p><p>The following are your verification code</p><p>Verification code : [Excode]</p><p>IP Addres : [Addr]</p><p>Date & Time : [Date]</p><p><br></p><p>Thanks and Regards</p><p>Admin #sitename</p>","1");
INSERT INTO mail_subjects VALUES("12","admin@bat24x.com","Accounts","Bonus","<p>Dear [FIRSTNAME],</p><p><br></p><p>You have received  Bonus Amount  : [AMT]  from admin </p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at [adminmail]</p><p><br></p>","1");
INSERT INTO mail_subjects VALUES("13","admin@bat24x.com","Accounts","Penalty","<p>Dear [FIRSTNAME],</p><p><br></p><p>You have received  Penalty  Amount  : [AMT]  from admin </p><p><br></p><p>If you have any questions about your account or any other matter, please feel free to contact us at [adminmail]</p><p><br></p>","1");
INSERT INTO mail_subjects VALUES("14","admin@bat24x.com","Accounts","Ticket","<p>Dear [FIRSTNAME],<p>Ticket From #sitename </p><p><br></p>\n<p>Ticket Number : #ticketno</p><p>Subject: #subject</p><p>Status: #status</p><p>Message: #content</p><p>Thanks and Regards</p><p>Admin</p>","1");



Drop table if exists  mandatory_list;

CREATE TABLE `mandatory_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `process_id` int(11) DEFAULT NULL,
  `column_name` varchar(100) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO mandatory_list VALUES("1","1","First Name","");
INSERT INTO mandatory_list VALUES("2","1","Last Name","");
INSERT INTO mandatory_list VALUES("3","1","Country","");
INSERT INTO mandatory_list VALUES("4","1","Email ID","1");
INSERT INTO mandatory_list VALUES("5","1","User Name","1");
INSERT INTO mandatory_list VALUES("6","1","Password","1");
INSERT INTO mandatory_list VALUES("7","1","Confirm Password","1");
INSERT INTO mandatory_list VALUES("8","1","Terms and Conditions","1");



Drop table if exists  members;

CREATE TABLE `members` (
  `member_id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `member_email` varchar(100) DEFAULT NULL,
  `intro_id` int(20) DEFAULT NULL,
  `address1` varchar(75) DEFAULT NULL,
  `address2` varchar(75) DEFAULT NULL,
  `city` varchar(75) DEFAULT NULL,
  `state` varchar(75) DEFAULT NULL,
  `zipcode` varchar(15) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `ccode` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `date_of_join` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `account_no` varchar(50) DEFAULT NULL,
  `payment_method` int(11) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL,
  `status` enum('new','active','suspended','duplicate') DEFAULT 'new',
  `verification_code` varchar(100) DEFAULT NULL,
  `verified` enum('yes','no') DEFAULT 'yes',
  `ip_code` varchar(5) DEFAULT NULL,
  `new_ip` varchar(20) DEFAULT NULL,
  `lr_num` varchar(30) DEFAULT NULL,
  `payza_num` varchar(30) DEFAULT NULL,
  `ego_num` varchar(255) DEFAULT NULL,
  `pm_num` varchar(40) DEFAULT NULL,
  `gdb_num` varchar(40) DEFAULT NULL,
  `st_pay` varchar(40) DEFAULT NULL,
  `paypal` varchar(200) DEFAULT NULL,
  `bitcoin` varchar(200) DEFAULT NULL,
  `payeer` varchar(200) DEFAULT NULL,
  `neteller` varchar(200) DEFAULT NULL,
  `neteller_key` varchar(500) DEFAULT NULL,
  `skrill` varchar(200) DEFAULT NULL,
  `advcash` varchar(200) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `accnum` varchar(30) DEFAULT NULL,
  `bank_branch` varchar(100) DEFAULT NULL,
  `bank_code` varchar(50) DEFAULT NULL,
  `bank_zipcode` varchar(50) DEFAULT NULL,
  `bank_country` varchar(50) DEFAULT NULL,
  `bank_state` varchar(50) DEFAULT NULL,
  `bank_city` varchar(100) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `liberty` varchar(255) DEFAULT NULL,
  `payza` varchar(255) DEFAULT NULL,
  `bank_wire` varchar(250) DEFAULT NULL,
  `refer_id` varchar(30) DEFAULT NULL,
  `onlinestatus` int(2) DEFAULT NULL,
  `nametitle` varchar(5) DEFAULT NULL,
  `suspend_time` datetime DEFAULT '0000-00-00 00:00:00',
  `cron_date` datetime DEFAULT NULL,
  `last_asscess_ip` varchar(30) DEFAULT NULL,
  `current_asscess_ip` varchar(30) DEFAULT NULL,
  `current_login_time` datetime DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

INSERT INTO members VALUES("1","yamada1173","TXpJeE16SXg=","","coginc2009@gmail.com","0","","","","","","7","","","2017-02-23 02:18:47","","","","","","114.134.91.94","active","","yes","","","","","","","","","","14uPAHvgtbQUTcejq8sPQ6yqCnJwzQ3GAd","","","","","","yamada1173","","","","","","","","","","","What is your oldest cousins name?","aaa","","","","","FQ3P3HL6IH5H","","","0000-00-00 00:00:00","2017-03-10 20:30:01","114.134.91.94","114.134.91.94","2017-03-10 11:14:47","2017-03-10 09:36:02");
INSERT INTO members VALUES("2","yamada333","TXpJeE16SXg=","","surf920@gmail.com","1","","","","","","3","","","2017-02-23 02:37:52","","","","","","114.134.91.94","active","","yes","","","","","","","","","","14uPAHvgtbQUTcejq8sPQ6yqCnJwzQ3GAd","","","","","","yamada333","","","","","","","","","","","What is your oldest cousins name?","aaa","","","","","CP74D9J6DJ07","","","0000-00-00 00:00:00","2017-03-10 20:30:02","114.134.91.94","103.59.37.138","2017-03-03 21:14:59","2017-03-02 11:37:10");
INSERT INTO members VALUES("7","kamrul","Y21GcWFXSXhjbUZxYVdJPQ==","","khchow@atomixsystem.com","0","","","","","","13","","","2017-02-27 00:33:11","","","","","","114.134.91.94","active","","yes","","","","","","","","","","ceb7ff59-9784-45e6-9cb9-1a358a497133","","","","","","chowdhury","","","","","","","","","","","What is the first name of your favorite uncle?","rajib","","","","","PV3666ECM4E7","","","0000-00-00 00:00:00","","","114.134.91.94","2017-02-27 05:40:01","0000-00-00 00:00:00");
INSERT INTO members VALUES("4","kawashima","TXpJeE16SXg=","","surf920@gmail.com","3","","","","","","12","","","2017-02-23 03:14:25","","","","","","114.134.91.94","active","","yes","","","","","","","","","","14uPAHvgtbQUTcejq8sPQ6yqCnJwzQ3GAd","","","","","","kawashima","","","","","","","","","","","What is your youngest childs nickname?","aaa","","","","","JUM1063C825N","","","0000-00-00 00:00:00","2017-02-28 23:22:01","114.134.91.94","114.134.91.94","2017-03-02 11:35:26","2017-03-02 09:28:01");
INSERT INTO members VALUES("5","hutakuti","TVRJek5EVTI=","","coconala315@gmail.com","4","","","","","","14","","","2017-02-23 03:25:02","","","","","","114.134.91.94","active","","yes","","","","","","","","","","1GQNFXHe56qYoMBTRtWzvNiineNLkiwjAf","","","","","","yasuhiro hutakuti","","","","","","","","","","","What is the first name of your favorite uncle?","u","","","","","GX4G1JD39O15","","","0000-00-00 00:00:00","","114.134.91.94","114.134.91.94","2017-02-28 18:49:38","2017-02-27 20:03:10");
INSERT INTO members VALUES("6","kawasaki","TXpJeE16SXg=","","coginc1173@yahoo.co.jp","4","","","","","","15","","","2017-02-25 04:24:01","","","","","","114.134.91.94","active","","yes","","","","","","","","","","1EFWhYPtfhMrcUfhq8Wyx2TvxUCMWuNwfd","","","","","","kawasaki","","","","","","","","","","","What is your youngest childs nickname?","qqq","","","","","WC167OC4CL6O","","","0000-00-00 00:00:00","2017-03-01 23:46:01","103.59.37.138","114.134.91.94","2017-03-09 11:18:24","2017-03-04 10:14:50");
INSERT INTO members VALUES("8","superman01000","TVRBeE1ERXc=","","hello@gmail.com","0","","","","nbvnvb","","13","","","2017-02-28 20:31:44","","","","","","41.35.252.172","active","","yes","","","","","","","","","","19hRJipBkUkxVkJFWkXS2kWXfVTUqbpwiX","","","","","","fgfg","","","","","","","","","","","What is the first name of your favorite uncle?","xxxx","","","","","ITLLLF18KF26","","","0000-00-00 00:00:00","","","41.35.252.172","2017-03-01 07:32:01","0000-00-00 00:00:00");
INSERT INTO members VALUES("9","bitgogo123","WW1sME1USXpaMjgwTlRZPQ==","","aiueodesuyo99@gmail.com","6","","","","","","2","","","2017-03-01 01:11:10","","","","","","126.131.38.208","active","","yes","","","","","","","","","","1LYZrNMfJ6LyCqGiX65kgRn4guD57R4o2R","","","","","","Takumi Suzuki","","","","","","","","","","","What is the first name of your favorite uncle?","Takumi Suzuki","","","","","ZDIF080POFEN","","","0000-00-00 00:00:00","2017-03-10 19:30:02","114.134.91.94","114.134.91.94","2017-03-10 11:45:01","2017-03-08 17:03:11");
INSERT INTO members VALUES("10","khokon","YTJodmEyOXVNakF4TlE9PQ==","","samerseu@gmail.com","0","","","","Dhaka","","18","","","2017-03-01 06:34:22","","","","","","103.59.37.138","active","","yes","","","","","","","","","","24gsdg4t4655gr4t46554dg354464656d","","","","","","khokon sarker","","","","","","","","","","","What is your oldest cousins name?","bas","","","","","YP533NOLF0D9","","","0000-00-00 00:00:00","","","114.134.91.94","2017-03-02 11:37:36","0000-00-00 00:00:00");
INSERT INTO members VALUES("11","coin999","Ym1scmIyNXBhMjgxTlRVPQ==","","aiueodesuyoneok-2@yahoo.co.jp","9","","","","","","1","","","2017-03-03 21:24:40","","","","","","126.131.38.208","active","","yes","","","","","","","","","","1LYZrNMfJ6LyCqGiX65kgRn4guD57R4o2R","","","","","","Taro Tanaka","","","","","","","","","","","What is the first name of your favorite uncle?","Taro Tanaka","","","","","FF3GD77AP84F","","","0000-00-00 00:00:00","2017-03-06 07:00:02","114.134.91.94","114.134.91.94","2017-03-06 10:32:09","2017-03-06 09:10:17");
INSERT INTO members VALUES("12","ayumu","YURJMU56YzFOakk9","","h2ksks@gmail.com","0","","","","chiba","","107","","","2017-03-04 00:06:29","","","","","","118.243.194.26","active","","yes","","","","","","","","","","1H9gQYBn95UmuEW2bFK7BtFqUZzLcBzND7","","","","","","hideaki hoshino","","","","","","","","","","","Where did you spend your honeymoon?","oosutoraria","","","","","JY4EEKA0LL8C","","","0000-00-00 00:00:00","","101.128.141.227","101.128.141.227","2017-03-09 00:04:40","2017-03-07 12:27:55");
INSERT INTO members VALUES("13","Taro Tanaka","Ym1scmIyNXBhMjgxTlRVPQ==","","aiueodesuyoneok-3@yahoo.co.jp","11","","","","","","2","","","2017-03-05 19:45:29","","","","","","126.131.38.208","active","","yes","","","","","","","","","","1LYZrNMfJ6LyCqGiX65kgRn4guD57R4o2R","","","","","","coin123","","","","","","","","","","","What is the first name of your favorite uncle?","Taro Tanaka","","","","","VNGEJ56J67M2","","","0000-00-00 00:00:00","","","126.131.38.208","2017-03-06 06:51:26","0000-00-00 00:00:00");
INSERT INTO members VALUES("14","bitars777","WjI4eE1qTm5ielExTmc9PQ==","","bnkm2020@gmail.com","11","","","","","","107","","","2017-03-05 23:17:19","","","","","","126.131.38.208","active","","yes","","","","","","","","","","1LYZrNMfJ6LyCqGiX65kgRn4guD57R4o2R","","","","","","Misaki Maeda","","","","","","","","","","","What is the first name of your favorite uncle?","Misaki Maeda","","","","","DC29171D6IGO","","","0000-00-00 00:00:00","2017-03-09 07:00:02","126.131.38.208","126.131.38.208","2017-03-10 05:47:10","2017-03-09 11:15:35");
INSERT INTO members VALUES("15","bitgroup216","WW1sME1qRTJaM0p2ZFhBMk1UST0=","","coconala315@gmail.com","14","","","","","","107","","","2017-03-08 01:10:43","","","","","","126.131.38.208","active","","yes","","","","","","","","","","141GPheATUtGXM7astB9UHuMfPyv1gRmvq","","","","","","YOICHI SAKATA","","","","","","","","","","","What is the first name of your favorite uncle?","YOICHI SAKATA","","","","","QJL6BONHKC46","","","0000-00-00 00:00:00","2017-03-10 19:30:02","114.134.91.94","114.134.91.94","2017-03-09 14:00:28","2017-03-09 11:30:13");
INSERT INTO members VALUES("16","1111","VkZaU1JtVkJQVDA9","","coginc1173@yahoo.co.jp","0","","","","","","4","","","2017-03-08 00:00:00","","","","Male","1953-02-02","","active","","yes","","","","","","","","","","","","","","","","111","","","","","","","","","","","What is the first name of your favorite uncle?","xxx","","","","","VFJJFN8D8DM5","","","0000-00-00 00:00:00","2017-03-10 19:30:02","","","","");
INSERT INTO members VALUES("17","2222","TWpJeU1nPT0=","","coginc1173@yahoo.co.jp","0","","","","","","6","","","2017-03-08 00:00:00","","","","Male","1955-03-02","","active","","yes","","","","","","","","","","","","","","","","2222","","","","","","","","","","","What is your oldest cousins name?","2222","","","","","YN58NF3M99C9","","","0000-00-00 00:00:00","2017-03-10 19:30:02","","","","");
INSERT INTO members VALUES("18","3333","TXpNek13PT0=","","coginc1173@yahoo.co.jp","0","","","","","","3","","","2017-03-08 00:00:00","","","","Male","1956-07-05","","active","","yes","","","","","","","","","","","","","","","","3333","","","","","","","","","","","What is your oldest cousins name?","3333","","","","","GMI1A6FO5LH2","","","0000-00-00 00:00:00","2017-03-10 19:30:02","","","","");
INSERT INTO members VALUES("20","5555","TlRVMU5RPT0=","","coginc1173@yahoo.co.jp","0","","","","","","3","","","2017-03-08 00:00:00","","","","Male","1964-03-02","","active","","yes","","","","","","","","","","","","","","","","5555","","","","","","","","","","","What is your oldest cousins name?","5555","","","","","WQBEJ3NL3MO3","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("21","6666","Vkd4U1ZrMVZOVkpRVkRBOQ==","","coginc1173@yahoo.co.jp","0","","","","","","3","","","2017-03-08 00:00:00","","","","Male","1956-03-02","","active","","yes","","","","","","","","","","","","","","","","5555","","","","","","","","","","","What is your oldest cousins name?","5555","","","","","XSKIJB3N5J3I","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("22","7777","TnpjM053PT0=","","coginc1173@yahoo.co.jp","0","","","","","","10","","","2017-03-08 00:00:00","","","","Male","1953-02-02","","active","","yes","","","","","","","","","","","","","","","","7777","","","","","","","","","","","What is your oldest cousins name?","7777","","","","","LUFALL9K5NK1","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("23","8888","T0RnNE9BPT0=","","coginc1173@yahoo.co.jp","0","","","","","","7","","","2017-03-08 00:00:00","","","","Male","1959-02-01","","active","","yes","","","","","","","","","","","","","","","","8888","","","","","","","","","","","What is your oldest childs nickname?","8888","","","","","QAE9999HOP5J","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("24","bitaro","WW1sME4zUmhjbTg0","","bit.taro2017@gmail.com","14","","","","","","107","","","2017-03-09 00:06:16","","","","","","119.26.134.192","active","","yes","","","","","","","","","","1AdrEjp2SzEBRKBhbTewhyexNduUoYLPPJ","","","","","","Taro Bitou","","","","","","","","","","","What is your youngest childs nickname?","bit","","","","","MV0A4FE7BI2M","","","0000-00-00 00:00:00","","119.26.134.192","119.26.134.192","2017-03-09 11:08:59","2017-03-09 11:07:41");
INSERT INTO members VALUES("25","yuko03","ZEdGdWJtOTVkV3R2TVRrNE5EQTRNamM9","","yuko.tanno@gmail.com","14","","","","","","107","","","2017-03-09 00:14:12","","","","","","126.151.56.175","active","","yes","","","","","","","","","","13qsChoMsLhdDu1BiYrWKsgn16NFZKigVE","","","","","","tanno yuko","","","","","","","","","","","What is the first name of your favorite uncle?","bon","","","","","HS8JIL1246KN","","","0000-00-00 00:00:00","2017-03-10 20:30:01","126.151.56.175","126.189.17.205","2017-03-10 16:49:47","2017-03-09 11:28:51");
INSERT INTO members VALUES("26","revolutionary","Y21WMmJ6RXhNQT09","","hypereview9@gmail.com","14","","","","","","107","","","2017-03-09 00:36:52","","","","","","119.26.134.192","active","","yes","","","","","","","","","","16yEEp39gUKhkjNC7A4T8cJwbPU8espTQg","","","","","","Satoshi Suzuki","","","","","","","","","","","What is your youngest childs nickname?","satoshi","","","","","DJ5737DAHAMI","","","0000-00-00 00:00:00","","","119.26.134.192","2017-03-09 11:37:26","0000-00-00 00:00:00");
INSERT INTO members VALUES("27","99999","TXpJeE16SXg=","","coginc1173@yahoo.co.jp","0","","","","","","7","","","2017-03-09 00:00:00","","","","Male","1962-04-01","","active","","yes","","","","","","","","","","","","","","","","99999","","","","","","","","","","","What is your oldest childs nickname?","999999","","","","","FYC8CJ51IIHM","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("28","101010","Vm10YVlWVXhSblJXYTFwT1ZsWmFWRll3WkU1UFVUMDk=","","coginc1173@yahoo.co.jp","0","","","","","","5","","","2017-03-09 00:00:00","","","","Male","1957-08-03","","active","","yes","","","","","","","","","","","","","","","","101010","","","","","","","","","","","What is your oldest cousins name?","101010","","","","","EFDJ50N001H0","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("29","11111111","TVRFeE1URXhNVEU9","","coginc1173@yahoo.co.jp","0","","","","","","7","","","2017-03-09 00:00:00","","","","Male","1955-04-02","","active","","yes","","","","","","","","","","","","","","","","11111111","","","","","","","","","","","What is your youngest childs nickname?","11111111","","","","","DLM5459H2418","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("30","121212","TVRJeE1qRXk=","","coginc1173@yahoo.co.jp","0","","","","","","7","","","2017-03-09 00:00:00","","","","Male","1956-05-03","","active","","yes","","","","","","","","","","","","","","","","121212","","","","","","","","","","","What is the first name of your oldest niece?","121212","","","","","GML59I40NO97","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("31","131313","TVRNeE16RXo=","","coginc1173@yahoo.co.jp","0","","","","","","3","","","2017-03-09 00:00:00","","","","Male","1953-03-03","","active","","yes","","","","","","","","","","","","","","","","131313","","","","","","","","","","","What is your oldest cousins name?","131313","","","","","MWJA6JA6EP02","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("32","141414","VkZaU1VtVkZOVVZTVkVFOQ==","","coginc1173@yahoo.co.jp","0","","","","","","9","","","2017-03-09 00:00:00","","","","Male","1971-08-02","","active","","yes","","","","","","","","","","","","","","","","141414","","","","","","","","","","","What is your oldest cousins name?","141414","","","","","JEBL1178F8DH","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("33","151515","TVRVeE5URTE=","","coginc1173@yahoo.co.jp","0","","","","","","10","","","2017-03-09 00:00:00","","","","Male","1962-05-03","","active","","yes","","","","","","","","","","","","","","","","151515","","","","","","","","","","","What is the first name of your oldest niece?","151515","","","","","PEE4N4K63H63","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("34","161616","TVRZeE5qRTI=","","coginc1173@yahoo.co.jp","0","","","","","","11","","","2017-03-09 00:00:00","","","","Male","1961-07-07","","active","","yes","","","","","","","","","","","","","","","","161616","","","","","","","","","","","What is the first name of your oldest nephew?","161616","","","","","LM53AL10LHA5","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("35","171717","TVRjeE56RTM=","","coginc1173@yahoo.co.jp","0","","","","","","8","","","2017-03-09 00:00:00","","","","Male","1968-12-10","","active","","yes","","","","","","","","","","","","","","","","171717","","","","","","","","","","","What is the first name of your oldest niece?","171717","","","","","AYH699O43PL3","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("36","181818","TVRneE9ERTQ=","","coginc1173@yahoo.co.jp","0","","","","","","8","","","2017-03-09 00:00:00","","","","Male","1961-05-03","","active","","yes","","","","","","","","","","","","","","","","181818","","","","","","","","","","","What is your oldest cousins name?","181818","","","","","VLED0N6NBA11","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("37","191919","TVRneE9ERTQ=","","coginc1173@yahoo.co.jp","0","","","","","","5","","","2017-03-09 00:00:00","","","","Male","1953-02-02","","active","","yes","","","","","","","","","","","","","","","","181818","","","","","","","","","","","What is your youngest childs nickname?","181818","","","","","TIE3P3N92285","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("38","202020","VkZaU2NtVkZPVlZTVkZVOQ==","","coginc1173@yahoo.co.jp","0","","","","","","7","","","2017-03-09 00:00:00","","","","Male","1958-09-03","","active","","yes","","","","","","","","","","","","","","","","191919","","","","","","","","","","","What is the first name of your oldest niece?","191919","","","","","PE0N8AJLDN1H","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("39","212121","TWpFeU1USXg=","","coginc1173@yahoo.co.jp","0","","","","","","7","","","2017-03-09 00:00:00","","","","Male","1952-02-03","","active","","yes","","","","","","","","","","","","","","","","212121","","","","","","","","","","","What is the first name of your oldest nephew?","212121","","","","","GG57500FGOP7","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("40","22222222","TWpJeU1qSXlNakk9","","coginc1173@yahoo.co.jp","0","","","","","","6","","","2017-03-09 00:00:00","","","","Male","1958-06-06","","active","","yes","","","","","","","","","","","","","","","","22222222","","","","","","","","","","","What is the first name of your oldest niece?","22222222","","","","","PVB0K368P17F","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("41","242424","TWpReU5ESTA=","","coginc1173@yahoo.co.jp","0","","","","","","12","","","2017-03-09 00:00:00","","","","Male","1972-04-03","","active","","yes","","","","","","","","","","","","","","","","242424","","","","","","","","","","","What is your oldest childs nickname?","242424","","","","","GNA50P4E679I","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("42","252525","TWpVeU5USTE=","","coginc1173@yahoo.co.jp","0","","","","","","11","","","2017-03-09 00:00:00","","","","Male","1950-02-03","","active","","yes","","","","","","","","","","","","","","","","252525","","","","","","","","","","","What is the first name of your favorite aunt?","252525","","","","","TM68LJ6I5LLN","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("43","262626","TWpZeU5qSTI=","","coginc1173@yahoo.co.jp","0","","","","","","4","","","2017-03-09 00:00:00","","","","Male","1958-05-02","","active","","yes","","","","","","","","","","","","","","","","262626","","","","","","","","","","","Where did you meet your spouse?","321321","","","","","ANNHIAF0NM3A","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("44","Assetincrease","TWpSdGRYSmhTMjh4","","assetincrease.119@gmail.com","15","","","","","","107","","","2017-03-09 09:35:30","","","","","","180.145.145.234","active","","yes","","","","","","","","","","Assetinvrease01","","","","","","Koichi Nishimura","","","","","","","","","","","Where did you spend your honeymoon?","HAWAII","","","","","GULJAHLL20L2","","","0000-00-00 00:00:00","","180.145.145.234","180.145.145.234","2017-03-09 21:38:32","2017-03-09 21:35:03");
INSERT INTO members VALUES("45","272727","TWpjeU56STM=","","coginc1173@yahoo.co.jp","0","","","","","","2","","","2017-03-10 00:00:00","","","","Male","1952-01-01","","active","","yes","","","","","","","","","","","","","","","","272727","","","","","","","","","","","Where did you meet your spouse?","272727","","","","","NXE999K0DHJ3","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("46","282828","TWpneU9ESTQ=","","coginc1173@yahoo.co.jp","0","","","","","","7","","","2017-03-10 00:00:00","","","","Male","1953-03-03","","active","","yes","","","","","","","","","","","","","","","","282828","","","","","","","","","","","Where did you meet your spouse?","282828","","","","","GS863AN9D72E","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("47","292929","VkZkd2NtVlZPVlZUVkZVOQ==","","coginc1173@yahoo.co.jp","0","","","","","","2","","","2017-03-10 00:00:00","","","","Male","1953-04-03","","active","","yes","","","","","","","","","","","","","","","","292929","","","","","","","","","","","What is your oldest cousins name?","292929","","","","","QAD6I4JN65FM","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("48","303030","TXpBek1ETXc=","","coginc1173@yahoo.co.jp","0","","","","","","3","","","2017-03-10 00:00:00","","","","Male","1954-01-03","","active","","yes","","","","","","","","","","","","","","","","303030","","","","","","","","","","","Where did you meet your spouse?","303030","","","","","TC6J43OD1147","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("49","apple029","WVhCd2JHVXhNVEE9","","hyiprev-apple@yahoo.co.jp","14","","","","","","107","","","2017-03-10 00:42:45","","","","","","119.26.134.192","active","","yes","","","","","","","","","","16yEEp39gUKhkjNC7A4T8cJwbPU8espTQg","","","","","","Satoshi Tanaka","","","","","","","","","","","What is your youngest childs nickname?","apple","","","","","CI9864NML472","","","0000-00-00 00:00:00","","","119.26.134.192","2017-03-10 11:43:04","0000-00-00 00:00:00");
INSERT INTO members VALUES("50","313131","TXpFek1UTXg=","","coginc1173@yahoo.co.jp","0","","","","","","3","","","2017-03-10 00:00:00","","","","Male","1952-02-01","","active","","yes","","","","","","","","","","","","","","","","313131","","","","","","","","","","","What is your oldest cousins name?","313131","","","","","AJ05INLDH244","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("51","323232","TXpJek1qTXk=","","coginc1173@yahoo.co.jp","0","","","","","","4","","","2017-03-10 00:00:00","","","","Male","1951-03-02","","active","","yes","","","","","","","","","","","","","","","","323232","","","","","","","","","","","Where did you meet your spouse?","323232","","","","","WE86MN677N34","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("52","343434","VkZod1VtVnJOVVZVVkVFOQ==","","coginc1173@yahoo.co.jp","0","","","","","","2","","","2017-03-10 00:00:00","","","","Male","1953-04-02","","active","","yes","","","","","","","","","","","","","","","","343434","","","","","","","","","","","Where did you meet your spouse?","343434","","","","","MT920E833M33","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("53","353535","TXpVek5UTTE=","","coginc1173@yahoo.co.jp","0","","","","","","5","","","2017-03-10 00:00:00","","","","Male","1955-04-02","","active","","yes","","","","","","","","","","","","","","","","353535","","","","","","","","","","","What is the first name of your favorite uncle?","353535","","","","","HJK91EM191F2","","","0000-00-00 00:00:00","","","","","");
INSERT INTO members VALUES("54","363636","TXpZek5qTTI=","","coginc1173@yahoo.co.jp","0","","","","","","5","","","2017-03-10 00:00:00","","","","Male","1953-03-01","","active","","yes","","","","","","","","","","","","","","","","363636","","","","","","","","","","","Where did you meet your spouse?","363636","","","","","ABPG8K686685","","","0000-00-00 00:00:00","","","","","");



Drop table if exists  meta_info;

CREATE TABLE `meta_info` (
  `meta_id` int(20) NOT NULL AUTO_INCREMENT,
  `meta_keyword` text,
  `meta_desc` text,
  `meta_title` text,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO meta_info VALUES("1","Bitcoin Arbitrage Trading","Bitcoin Arbitrage Trading","Bitcoin Arbitrage Trading");



Drop table if exists  news;

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` datetime DEFAULT NULL,
  `news_header` varchar(100) DEFAULT NULL,
  `news_description` text,
  `status` enum('on','off') DEFAULT 'on',
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO news VALUES("1","2012-05-30 08:02:05","ARM HYIP","launched our new ARM HYIP Monitor Site <br><br>&nbsp;Thanks for visiting, and we will be in touch soon &nbsp;							\n						","on");



Drop table if exists  newsletter;

CREATE TABLE `newsletter` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  offlinepay;

CREATE TABLE `offlinepay` (
  `deposit_id` int(11) NOT NULL AUTO_INCREMENT,
  `deposit_date` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `tracking_number` varchar(50) DEFAULT NULL,
  `memo` varchar(150) DEFAULT NULL,
  `mtnc_number` varchar(50) DEFAULT NULL,
  `dd_number` varchar(50) DEFAULT NULL,
  `cheque_number` varchar(50) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `branch` varchar(25) DEFAULT NULL,
  `status` int(6) DEFAULT NULL,
  PRIMARY KEY (`deposit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




Drop table if exists  parterners;

CREATE TABLE `parterners` (
  `parter_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email_id` varchar(200) DEFAULT NULL,
  `eexness_account` varchar(200) DEFAULT NULL,
  `ib_application` text,
  `date_time` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`parter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




Drop table if exists  pass_saver;

CREATE TABLE `pass_saver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `enc_password` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `intro_id` int(11) NOT NULL,
  `bitcoin` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO pass_saver VALUES("1","yamada1173","coginc2009@gmail.com","321321","TXpJeE16SXg=","7","0","14uPAHvgtbQUTcejq8sPQ6yqCnJwzQ3GAd","What is your oldest cousins name?","aaa");
INSERT INTO pass_saver VALUES("2","yamada333","surf920@gmail.com","321321","TXpJeE16SXg=","3","0","14uPAHvgtbQUTcejq8sPQ6yqCnJwzQ3GAd","What is your oldest cousins name?","aaa");
INSERT INTO pass_saver VALUES("3","kawasaki","coginc1173@yahoo.co.jp","321321","TXpJeE16SXg=","7","0","14uPAHvgtbQUTcejq8sPQ6yqCnJwzQ3GAd","What is your oldest cousins name?","aa");
INSERT INTO pass_saver VALUES("4","kawashima","surf920@gmail.com","321321","TXpJeE16SXg=","12","0","14uPAHvgtbQUTcejq8sPQ6yqCnJwzQ3GAd","What is your youngest childs nickname?","aaa");
INSERT INTO pass_saver VALUES("5","hutakuti","coconala315@gmail.com","123456","TVRJek5EVTI=","14","0","1GQNFXHe56qYoMBTRtWzvNiineNLkiwjAf","What is the first name of your favorite uncle?","u");
INSERT INTO pass_saver VALUES("6","kawasaki","coginc1173@yahoo.co.jp","321321","TXpJeE16SXg=","15","0","1EFWhYPtfhMrcUfhq8Wyx2TvxUCMWuNwfd","What is your youngest childs nickname?","qqq");
INSERT INTO pass_saver VALUES("7","kamrul","khchow@atomixsystem.com","rajib1rajib","Y21GcWFXSXhjbUZxYVdJPQ==","13","0","ceb7ff59-9784-45e6-9cb9-1a358a497133","What is the first name of your favorite uncle?","rajib");
INSERT INTO pass_saver VALUES("8","superman01000","hello@gmail.com","101010","TVRBeE1ERXc=","13","0","19hRJipBkUkxVkJFWkXS2kWXfVTUqbpwiX","What is the first name of your favorite uncle?","xxxx");
INSERT INTO pass_saver VALUES("9","bitgogo123","aiueodesuyo99@gmail.com","bit123go456","WW1sME1USXpaMjgwTlRZPQ==","2","0","1LYZrNMfJ6LyCqGiX65kgRn4guD57R4o2R","What is the first name of your favorite uncle?","Takumi Suzuki");
INSERT INTO pass_saver VALUES("10","khokon","samerseu@gmail.com","khokon2015","YTJodmEyOXVNakF4TlE9PQ==","18","0","24gsdg4t4655gr4t46554dg354464656d","What is your oldest cousins name?","bas");
INSERT INTO pass_saver VALUES("11","coin999","aiueodesuyoneok-2@yahoo.co.jp","nikoniko555","Ym1scmIyNXBhMjgxTlRVPQ==","1","0","1LYZrNMfJ6LyCqGiX65kgRn4guD57R4o2R","What is the first name of your favorite uncle?","Taro Tanaka");
INSERT INTO pass_saver VALUES("12","ayumu","h2ksks@gmail.com","h2577562","YURJMU56YzFOakk9","107","0","1H9gQYBn95UmuEW2bFK7BtFqUZzLcBzND7","Where did you spend your honeymoon?","oosutoraria");
INSERT INTO pass_saver VALUES("13","Taro Tanaka","aiueodesuyoneok-3@yahoo.co.jp","nikoniko555","Ym1scmIyNXBhMjgxTlRVPQ==","2","0","1LYZrNMfJ6LyCqGiX65kgRn4guD57R4o2R","What is the first name of your favorite uncle?","Taro Tanaka");
INSERT INTO pass_saver VALUES("14","bitars777","bnkm2020@gmail.com","go123go456","WjI4eE1qTm5ielExTmc9PQ==","107","0","1LYZrNMfJ6LyCqGiX65kgRn4guD57R4o2R","What is the first name of your favorite uncle?","Misaki Maeda");
INSERT INTO pass_saver VALUES("15","bitgroup216","coconala315@gmail.com","bit216group612","WW1sME1qRTJaM0p2ZFhBMk1UST0=","107","0","141GPheATUtGXM7astB9UHuMfPyv1gRmvq","What is the first name of your favorite uncle?","YOICHI SAKATA");
INSERT INTO pass_saver VALUES("16","bitaro","bit.taro2017@gmail.com","bit7taro8","WW1sME4zUmhjbTg0","107","0","1AdrEjp2SzEBRKBhbTewhyexNduUoYLPPJ","What is your youngest childs nickname?","bit");
INSERT INTO pass_saver VALUES("17","yuko03","yuko.tanno@gmail.com","tannoyuko19840827","ZEdGdWJtOTVkV3R2TVRrNE5EQTRNamM9","107","0","13qsChoMsLhdDu1BiYrWKsgn16NFZKigVE","What is the first name of your favorite uncle?","bon");
INSERT INTO pass_saver VALUES("18","revolutionary","hypereview9@gmail.com","revo110","Y21WMmJ6RXhNQT09","107","0","16yEEp39gUKhkjNC7A4T8cJwbPU8espTQg","What is your youngest childs nickname?","satoshi");
INSERT INTO pass_saver VALUES("19","Assetincrease","assetincrease.119@gmail.com","24muraKo1","TWpSdGRYSmhTMjh4","107","0","Assetinvrease01","Where did you spend your honeymoon?","HAWAII");
INSERT INTO pass_saver VALUES("20","apple029","hyiprev-apple@yahoo.co.jp","apple110","WVhCd2JHVXhNVEE9","107","0","16yEEp39gUKhkjNC7A4T8cJwbPU8espTQg","What is your youngest childs nickname?","apple");



Drop table if exists  pay_period;

CREATE TABLE `pay_period` (
  `pay_period_id` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(50) DEFAULT NULL,
  `status` int(4) DEFAULT NULL,
  PRIMARY KEY (`pay_period_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO pay_period VALUES("1","Daily","1");
INSERT INTO pay_period VALUES("2","Weekly","1");
INSERT INTO pay_period VALUES("3","Monthly","1");
INSERT INTO pay_period VALUES("4","Yearly","1");
INSERT INTO pay_period VALUES("5","Hourly","1");



Drop table if exists  pay_transaction;

CREATE TABLE `pay_transaction` (
  `deposit_id` int(11) DEFAULT NULL,
  `trans_amount` int(11) DEFAULT NULL,
  `trans_userid` int(11) DEFAULT NULL,
  `trans_batchnumber` int(11) DEFAULT NULL,
  `trans_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  payment_process;

CREATE TABLE `payment_process` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_name` varchar(100) DEFAULT '',
  `status` enum('on','off') DEFAULT 'on',
  `amount` varchar(50) DEFAULT '0',
  `batch_id` varchar(50) DEFAULT '',
  `account_id` varchar(50) DEFAULT '',
  `buy_form_code` longtext,
  `withdraw_option` int(2) DEFAULT NULL COMMENT '0-manual,1-instant',
  `spwd` varchar(100) DEFAULT NULL,
  `mpwd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

INSERT INTO payment_process VALUES("1","E-Gold","off","0","","","","0","","");
INSERT INTO payment_process VALUES("2","Int-Gold","off","0","","","","0","","");
INSERT INTO payment_process VALUES("3","Paypal","off","0","","","","1","","");
INSERT INTO payment_process VALUES("4","Strompay","off","0","","","","0","","");
INSERT INTO payment_process VALUES("5","E-Bullion","off","0","","","","0","","");
INSERT INTO payment_process VALUES("6","Money Bookers","off","0","","","","0","","");
INSERT INTO payment_process VALUES("7","Payza","on","0","","","","1","","");
INSERT INTO payment_process VALUES("8","Liberty reserve","off","0","","","","0","","");
INSERT INTO payment_process VALUES("9","Safe Pay","off","0","","","","0","","");
INSERT INTO payment_process VALUES("10","Pecunix","off","0","","","","0","","");
INSERT INTO payment_process VALUES("11","Perfect Money","off","0","","","","0","","");
INSERT INTO payment_process VALUES("12","Reinvest Option","on","0","","","","0","","");
INSERT INTO payment_process VALUES("13","Bank Wire","off","0","","","","0","","");
INSERT INTO payment_process VALUES("14","Beneficiary Account Number","off","0","","","","0","","");
INSERT INTO payment_process VALUES("15","Beneficiary Bank Name","off","0","","","","0","","");
INSERT INTO payment_process VALUES("16","Routing Transfer Number (or) SWIFT Code (BIC)","off","0","","","","0","","");
INSERT INTO payment_process VALUES("17","Bank Address","off","0","","","","0","","");
INSERT INTO payment_process VALUES("18","Bank City","off","0","","","","0","","");
INSERT INTO payment_process VALUES("19","Bank State/Province","off","0","","","","0","","");
INSERT INTO payment_process VALUES("20","Bank ZipCode","off","0","","","","0","","");
INSERT INTO payment_process VALUES("21","Bank Country","off","0","","","","0","","");
INSERT INTO payment_process VALUES("22","Bank Wire","on","0","","","","0","","");
INSERT INTO payment_process VALUES("23","GDB ","off","0","","","","0","","");
INSERT INTO payment_process VALUES("24","Liberty Reserve Store Name","on","0","","demo1","","0","","");
INSERT INTO payment_process VALUES("25","Liberty Reserve Store Security Word","on","0","","demo1","","0","","");
INSERT INTO payment_process VALUES("26","Perfect Money Phrase Hash","on","0","","","","0","","");
INSERT INTO payment_process VALUES("27","Payza Security Word","on","0","","5645646","","0","","");
INSERT INTO payment_process VALUES("28","Solid Trust Pay","off","0","","","","0","","");
INSERT INTO payment_process VALUES("29","Solid Trust Pay Secondary Password","on","0","","","","0","","");
INSERT INTO payment_process VALUES("30","Egopay","on","0","","","","1","","");
INSERT INTO payment_process VALUES("31","egopay storepassword","on","0","","","","0","","");
INSERT INTO payment_process VALUES("32","egopay storeid","on","0","","","","0","","");
INSERT INTO payment_process VALUES("33","Egopay Store Name","on","0","","demo","","0","","");
INSERT INTO payment_process VALUES("34","Egopay Account Name","on","0","","acc name","","0","","");
INSERT INTO payment_process VALUES("35","Ego API ID","on","0","","app id","","0","","");
INSERT INTO payment_process VALUES("36","Egopay API Password","on","0","","api password","","0","","");
INSERT INTO payment_process VALUES("37","STP Button Name","on","0","","","","0","","");
INSERT INTO payment_process VALUES("38","Bit Coin","on","0","d94D42d344f8DF30d56cd328E06331bD7f24fa2790b2fBCd6b","71b63c939d015eb2976a1cff5b48bf0c","05a3bd21f8db3239a6249ecdbb426e88df2be166cee140813c78aa00406dc391","0","","");
INSERT INTO payment_process VALUES("39","Payeer","off","","","","","0","","");
INSERT INTO payment_process VALUES("40","neteller","off","0","","","","1","","");
INSERT INTO payment_process VALUES("41","Skrill","off","0","","","","1","","");
INSERT INTO payment_process VALUES("42","Advcash","off","0","","","","1","","");



Drop table if exists  plan;

CREATE TABLE `plan` (
  `plan_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `package_id` int(5) DEFAULT '0',
  `plan_type` varchar(50) DEFAULT NULL,
  `scheme` varchar(25) DEFAULT NULL,
  `spend_min_amount` double(30,8) DEFAULT NULL,
  `spend_max_amount` double(30,8) DEFAULT NULL,
  `period` smallint(4) DEFAULT NULL,
  `period_type` varchar(10) DEFAULT NULL,
  `interest` double(30,8) DEFAULT NULL,
  `intrest_period` int(11) DEFAULT '0',
  `iperiod_type` varchar(50) DEFAULT '',
  `max_interest` double(30,8) DEFAULT NULL,
  `plan_level` text,
  `withdrawal_type` varchar(50) DEFAULT NULL,
  `bonus_status` varchar(50) DEFAULT NULL,
  `bonus_per` decimal(10,8) DEFAULT NULL,
  `interest_type` int(11) DEFAULT NULL,
  `release_status` enum('on','off') DEFAULT NULL,
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO plan VALUES("3","0","Platinum","","100.00000000","500.00000000","90","5","","1","1","0.17500000","","","no","0.00000000","2","on");
INSERT INTO plan VALUES("5","0","gold","","10.00000000","100.00000000","60","5","","1","1","0.08750000","","","no","0.00000000","2","on");
INSERT INTO plan VALUES("6","0","silver","","0.01000000","10.00000000","30","5","","1","1","0.05000000","","","no","0.00000000","2","on");



Drop table if exists  plan_master;

CREATE TABLE `plan_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `duration` int(4) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `pay_period` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `min_dep_amount` double(30,8) DEFAULT NULL,
  `max_dep_amount` double(30,8) DEFAULT NULL,
  `principal_withdrawal_status` int(1) DEFAULT NULL,
  `principal_withdrawal_fee` double(30,8) DEFAULT NULL,
  `min_withdrawal_days` int(11) DEFAULT NULL,
  `max_withdrawal_days` int(11) DEFAULT NULL,
  `weekday_interest_status` int(1) DEFAULT NULL,
  `withdrawal_deposit_package` varchar(50) DEFAULT NULL,
  `payout_days` int(11) DEFAULT NULL,
  `delay_days` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  process;

CREATE TABLE `process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `process_name` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO process VALUES("1","Sign Up");



Drop table if exists  promotional;

CREATE TABLE `promotional` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `banner_status` enum('active','suspend') CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'active',
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO promotional VALUES("1","uploadimages/20161007101118976in.png","active");
INSERT INTO promotional VALUES("2","uploadimages/20161006194831714tick-circle.png","active");
INSERT INTO promotional VALUES("3","uploadimages/20170109115124407BTbanner1.jpg","active");



Drop table if exists  queries;

CREATE TABLE `queries` (
  `query_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(5) DEFAULT NULL,
  `qsub` varchar(50) DEFAULT NULL,
  `qmessage` text,
  `datetime` date DEFAULT NULL,
  `query_from` varchar(25) DEFAULT NULL,
  `query_to` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`query_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  rate_us;

CREATE TABLE `rate_us` (
  `rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `rate_code` text CHARACTER SET latin1 COLLATE latin1_general_ci,
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  representative;

CREATE TABLE `representative` (
  `rep_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email_id` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `yim` varchar(200) DEFAULT NULL,
  `aim` varchar(200) DEFAULT NULL,
  `skype` varchar(200) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `status` int(1) DEFAULT '0' COMMENT '0-suspend,1-active',
  `display_status` int(1) DEFAULT '0' COMMENT '0-suspend,1-active',
  `member_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`rep_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  site_manager;

CREATE TABLE `site_manager` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('yes','no') DEFAULT 'yes',
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO site_manager VALUES("1","Advertise","User is allowed to Advertise with the Site","no");
INSERT INTO site_manager VALUES("2","Article","User can Post or View Articles Related to HYIP","no");
INSERT INTO site_manager VALUES("3","Affiliates","User can Refer Others to the Site and Earn","no");
INSERT INTO site_manager VALUES("4","FAQ","Frequently Asked Questions about the Site","yes");
INSERT INTO site_manager VALUES("5","Latest News","Lastest News in the Site","yes");
INSERT INTO site_manager VALUES("6","Site Statistics","Showing Site Statistics to the User","yes");
INSERT INTO site_manager VALUES("7","Polling","Conduct and Manage Polls","no");
INSERT INTO site_manager VALUES("8","Contact Us","User contact to the administrator","yes");
INSERT INTO site_manager VALUES("9","Release Deposit","Releasing the Deposit option for the user","no");
INSERT INTO site_manager VALUES("10","Forum","A Forum About HYIP","yes");
INSERT INTO site_manager VALUES("11","I/P Check","Performs I/P Address Check while Registration","no");
INSERT INTO site_manager VALUES("12","Turing Code","Perform Turing Code validation while login/signup","no");
INSERT INTO site_manager VALUES("13","Unique Mail ID","Unique Signup Mail ID","yes");
INSERT INTO site_manager VALUES("14","Daily","Daily Interest","yes");
INSERT INTO site_manager VALUES("15","Weekly","Weekly Interest","yes");
INSERT INTO site_manager VALUES("16","Monthly","Monthly Interest","yes");
INSERT INTO site_manager VALUES("17","Yearly","Yearly Interest","yes");
INSERT INTO site_manager VALUES("18","Signup Referral Commission","Send referral commision to the referer while joining new user","no");
INSERT INTO site_manager VALUES("19","Commission in %","send commision to the referer in %","yes");



Drop table if exists  site_statistics;

CREATE TABLE `site_statistics` (
  `stat_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_stat` varchar(100) DEFAULT NULL,
  `site_val` varchar(100) DEFAULT NULL,
  `status` enum('on','off') DEFAULT 'on',
  `mode` int(4) DEFAULT NULL,
  PRIMARY KEY (`stat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO site_statistics VALUES("1","Site Started","2017-1-1","off","1");
INSERT INTO site_statistics VALUES("2","Days Running","247","on","1");
INSERT INTO site_statistics VALUES("3","Total Users","1","on","1");
INSERT INTO site_statistics VALUES("4","Total Deposit","4","on","1");
INSERT INTO site_statistics VALUES("5","Total Earned","6456","on","1");
INSERT INTO site_statistics VALUES("6","Total Ref.Commission","5","on","1");
INSERT INTO site_statistics VALUES("7","Total Withdrawn","1","on","1");
INSERT INTO site_statistics VALUES("8","Percentage Withdrawn","2","on","1");
INSERT INTO site_statistics VALUES("9","Current Available Funds","5.26678","on","1");
INSERT INTO site_statistics VALUES("10","Users Registered Today","1234","on","1");
INSERT INTO site_statistics VALUES("11","Deposit Made Today","25","on","1");
INSERT INTO site_statistics VALUES("12","Last Update","2006-2-15","on","1");
INSERT INTO site_statistics VALUES("14","Compounding","Compounding","off","1");



Drop table if exists  sitebanner;

CREATE TABLE `sitebanner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO sitebanner VALUES("1","");
INSERT INTO sitebanner VALUES("2","");
INSERT INTO sitebanner VALUES("3","");
INSERT INTO sitebanner VALUES("4","");



Drop table if exists  sub_deposit;

CREATE TABLE `sub_deposit` (
  `sub_deposit_id` int(30) NOT NULL AUTO_INCREMENT,
  `deposit_id` int(30) DEFAULT NULL,
  `deposit_amt` double(30,8) DEFAULT NULL,
  `deposit_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`sub_deposit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

INSERT INTO sub_deposit VALUES("1","1","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("2","2","20.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("4","4","50.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("5","5","7.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("6","6","9.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("7","7","20.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("8","8","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("9","9","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("10","10","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("11","11","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("13","13","0.01000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("15","15","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("16","16","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("17","17","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("18","18","0.01000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("19","19","0.01000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("20","20","0.10000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("21","21","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("22","22","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("23","23","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("24","24","0.01000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("25","25","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("26","26","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("27","27","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("28","28","5.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("29","29","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("30","30","50.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("31","31","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("32","32","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("33","33","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("34","34","0.00100000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("35","35","50.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("36","36","30.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("37","37","150.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("38","38","12.15700000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("39","39","12.15700000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("40","40","1.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("41","41","1.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("42","42","20.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("43","43","5.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("44","44","0.50000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("45","45","5.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("46","46","1.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("47","47","10.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("48","48","100.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("49","49","1.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("50","50","1.00000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("51","51","0.01000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("52","52","1.11000000","Deposit made through Bit Coin");
INSERT INTO sub_deposit VALUES("53","53","5.25000000","Deposit made through Bit Coin");



Drop table if exists  tbl_footer;

CREATE TABLE `tbl_footer` (
  `footer_id` int(11) DEFAULT NULL,
  `footer_details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_footer VALUES("1","© 2016 Arm-Hyip");



Drop table if exists  tbl_hits;

CREATE TABLE `tbl_hits` (
  `hits_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(50) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `hit_date` datetime DEFAULT NULL,
  `online_status` int(11) NOT NULL DEFAULT '0',
  `member_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`hits_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO tbl_hits VALUES("1","127.0.0.1","a0163246750639a5ebb821c401be072a","2010-07-13 04:44:53","0","0");
INSERT INTO tbl_hits VALUES("2","127.0.0.1","e4b7d9ec6220dadf9f5cc7623db0e590","2010-07-14 04:35:56","0","0");
INSERT INTO tbl_hits VALUES("3","117.207.66.28","376c77f674259627136af1926a66fb4b","2010-07-19 12:38:42","0","0");
INSERT INTO tbl_hits VALUES("4","122.174.78.153","b3a65cd6ed9847edb8b92ece1909c6ec","2010-07-19 12:38:46","0","0");
INSERT INTO tbl_hits VALUES("5","120.162.180.169","28be096ff8c5337aa9485c3b3fe35165","2010-07-19 08:39:39","0","0");
INSERT INTO tbl_hits VALUES("6","127.0.0.1","7bbccb9e00727b422ecee1f2b9df9807","2010-07-20 05:01:59","0","0");
INSERT INTO tbl_hits VALUES("7","122.174.179.175","4d497e574539375ec5f49cbcb77bd454","2010-07-21 04:16:24","0","0");
INSERT INTO tbl_hits VALUES("8","122.174.190.34","f4a9a2737532ede913fa19f8c5acdbf4","2010-07-21 08:26:17","0","0");
INSERT INTO tbl_hits VALUES("9","41.196.207.134","d70a321369c586463aee8f6b483b5b82","2010-07-21 08:28:14","0","0");
INSERT INTO tbl_hits VALUES("10","118.137.1.111","de0f7715ce40bb4af3013ec4d0ed904b","2010-07-21 10:22:38","0","0");
INSERT INTO tbl_hits VALUES("11","118.137.1.123","46235d625476c1b2fcf9b7b2c8764fab","2010-07-21 10:50:55","0","0");
INSERT INTO tbl_hits VALUES("12","118.137.1.111","4c44454e04e1b1be8b7f1889319cce1c","2010-07-21 10:07:23","0","0");
INSERT INTO tbl_hits VALUES("13","204.236.235.245","caa980ea12cb1b29238bc0538130ed97","2010-07-22 03:26:49","0","0");
INSERT INTO tbl_hits VALUES("14","120.160.113.213","467f025e14e8bca01710945ab43ff82f","2010-07-23 08:59:07","0","0");
INSERT INTO tbl_hits VALUES("15","204.236.235.245","50a366ff96f4a5a0e540318486626f3d","2010-07-23 12:10:58","0","0");
INSERT INTO tbl_hits VALUES("16","204.236.235.245","ab15893699b9f622a5d7683501b7ee45","2010-07-23 08:46:46","0","0");
INSERT INTO tbl_hits VALUES("17","122.174.184.146","b8be2646b678b5149f3747e2851356ce","2010-07-24 07:27:44","0","0");
INSERT INTO tbl_hits VALUES("18","120.161.31.176","fbd999ea57ddcfb7d3478fee720be71b","2010-07-24 01:06:19","0","0");
INSERT INTO tbl_hits VALUES("19","127.0.0.1","722460ac2e9f9d7252f9e34635e7d194","2010-07-26 04:53:54","0","0");
INSERT INTO tbl_hits VALUES("20","127.0.0.1","14423c6cb9f2aebb6acd66ee11445416","2010-07-28 06:01:13","0","0");
INSERT INTO tbl_hits VALUES("21","127.0.0.1","13950e2dd210e8ccb8ae3df4fd02c58f","2010-08-09 04:07:39","0","0");



Drop table if exists  tbl_ip;

CREATE TABLE `tbl_ip` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `ip_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  test_cron;

CREATE TABLE `test_cron` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test` varchar(200) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;

INSERT INTO test_cron VALUES("1","cron","2016-12-30 13:26:01");
INSERT INTO test_cron VALUES("2","cron","2016-12-30 13:27:02");
INSERT INTO test_cron VALUES("3","cron","2016-12-30 13:28:01");
INSERT INTO test_cron VALUES("4","cron","2016-12-30 13:29:01");
INSERT INTO test_cron VALUES("5","cron","2016-12-30 13:30:01");
INSERT INTO test_cron VALUES("6","cron","2016-12-30 13:31:01");
INSERT INTO test_cron VALUES("7","cron","2016-12-30 13:32:01");
INSERT INTO test_cron VALUES("8","cron","2016-12-30 13:33:01");
INSERT INTO test_cron VALUES("9","cron","2016-12-30 13:34:01");
INSERT INTO test_cron VALUES("10","cron","2016-12-30 13:35:01");
INSERT INTO test_cron VALUES("11","cron","2016-12-30 13:36:01");
INSERT INTO test_cron VALUES("12","cron","2016-12-30 13:37:01");
INSERT INTO test_cron VALUES("13","cron","2016-12-30 13:38:01");
INSERT INTO test_cron VALUES("14","cron-1","2016-12-30 13:39:01");
INSERT INTO test_cron VALUES("15","cron-1","2016-12-30 13:40:01");
INSERT INTO test_cron VALUES("16","cron-1","2016-12-30 13:41:01");
INSERT INTO test_cron VALUES("17","cron-1","2016-12-30 13:42:01");
INSERT INTO test_cron VALUES("18","cron-1","2016-12-30 13:43:02");
INSERT INTO test_cron VALUES("19","cron-1","2016-12-30 13:44:01");
INSERT INTO test_cron VALUES("20","cron-1","2016-12-30 13:45:01");
INSERT INTO test_cron VALUES("21","cron-1","2016-12-30 13:46:01");
INSERT INTO test_cron VALUES("22","cron-1","2016-12-30 13:47:01");
INSERT INTO test_cron VALUES("23","cron-1","2016-12-30 13:48:01");
INSERT INTO test_cron VALUES("24","cron-1","2016-12-30 13:49:01");
INSERT INTO test_cron VALUES("25","cron-1","2016-12-30 13:50:01");
INSERT INTO test_cron VALUES("26","cron-1","2016-12-30 13:51:01");
INSERT INTO test_cron VALUES("27","cron-1","2016-12-30 13:52:02");
INSERT INTO test_cron VALUES("28","cron-1","2016-12-30 13:53:01");
INSERT INTO test_cron VALUES("29","cron-1","2016-12-30 13:54:01");
INSERT INTO test_cron VALUES("30","cron-1","2016-12-30 13:55:01");
INSERT INTO test_cron VALUES("31","cron-1","2016-12-30 13:56:01");
INSERT INTO test_cron VALUES("32","cron-1","2016-12-30 13:57:01");
INSERT INTO test_cron VALUES("33","cron-1","2016-12-30 13:58:01");
INSERT INTO test_cron VALUES("34","cron-1","2016-12-30 13:59:01");
INSERT INTO test_cron VALUES("35","cron-1","2016-12-30 14:00:01");
INSERT INTO test_cron VALUES("36","cron-1","2016-12-30 14:01:01");
INSERT INTO test_cron VALUES("37","cron-1","2016-12-30 14:02:01");
INSERT INTO test_cron VALUES("38","cron-1","2016-12-30 14:03:01");
INSERT INTO test_cron VALUES("39","cron-1","2016-12-30 14:04:01");
INSERT INTO test_cron VALUES("40","cron-1","2016-12-30 14:05:01");
INSERT INTO test_cron VALUES("41","cron-1","2016-12-30 14:06:01");
INSERT INTO test_cron VALUES("42","cron-1","2016-12-30 14:07:01");
INSERT INTO test_cron VALUES("43","cron-1","2016-12-30 14:08:01");
INSERT INTO test_cron VALUES("44","cron-1","2016-12-30 14:09:01");
INSERT INTO test_cron VALUES("45","cron-1","2016-12-30 14:10:01");
INSERT INTO test_cron VALUES("46","cron-1","2016-12-30 14:11:01");
INSERT INTO test_cron VALUES("47","cron-1","2016-12-30 14:12:01");
INSERT INTO test_cron VALUES("48","cron-1","2016-12-30 14:13:01");
INSERT INTO test_cron VALUES("49","cron-1","2016-12-30 14:14:01");
INSERT INTO test_cron VALUES("50","cron-1","2016-12-30 14:15:01");
INSERT INTO test_cron VALUES("51","cron-1","2016-12-30 14:16:01");
INSERT INTO test_cron VALUES("52","cron-1","2016-12-30 14:17:01");
INSERT INTO test_cron VALUES("53","cron-1","2016-12-30 14:18:01");
INSERT INTO test_cron VALUES("54","cron-1","2016-12-30 14:19:01");
INSERT INTO test_cron VALUES("55","cron-1","2016-12-30 14:20:01");
INSERT INTO test_cron VALUES("56","cron-1","2016-12-30 14:21:01");
INSERT INTO test_cron VALUES("57","cron-1","2016-12-30 14:22:01");
INSERT INTO test_cron VALUES("58","cron-1","2016-12-30 14:23:02");
INSERT INTO test_cron VALUES("59","cron-1","2016-12-30 14:24:01");
INSERT INTO test_cron VALUES("60","cron-1","2016-12-30 14:25:01");
INSERT INTO test_cron VALUES("61","cron-1","2016-12-30 14:26:01");
INSERT INTO test_cron VALUES("62","cron-1","2016-12-30 14:27:02");
INSERT INTO test_cron VALUES("63","cron-1","2016-12-30 14:28:01");
INSERT INTO test_cron VALUES("64","cron-1","2016-12-30 14:29:01");
INSERT INTO test_cron VALUES("65","cron-1","2016-12-30 14:30:01");
INSERT INTO test_cron VALUES("66","cron-1","2016-12-30 14:31:01");
INSERT INTO test_cron VALUES("67","cron-1","2016-12-30 14:32:01");
INSERT INTO test_cron VALUES("68","cron-1","2016-12-30 14:33:01");
INSERT INTO test_cron VALUES("69","cron-1","2016-12-30 14:34:01");
INSERT INTO test_cron VALUES("70","cron-1","2016-12-30 14:35:01");
INSERT INTO test_cron VALUES("71","cron-1","2016-12-30 14:36:01");
INSERT INTO test_cron VALUES("72","cron-1","2016-12-30 14:37:01");
INSERT INTO test_cron VALUES("73","cron-1","2016-12-30 14:38:01");
INSERT INTO test_cron VALUES("74","cron-1","2016-12-30 14:39:01");
INSERT INTO test_cron VALUES("75","cron-1","2016-12-30 14:40:01");
INSERT INTO test_cron VALUES("76","cron-1","2016-12-30 14:41:01");
INSERT INTO test_cron VALUES("77","cron-1","2016-12-30 14:42:01");
INSERT INTO test_cron VALUES("78","cron-1","2016-12-30 14:43:01");
INSERT INTO test_cron VALUES("79","cron-1","2016-12-30 14:44:02");
INSERT INTO test_cron VALUES("80","cron-1","2016-12-30 14:45:01");
INSERT INTO test_cron VALUES("81","cron-1","2016-12-30 14:46:01");
INSERT INTO test_cron VALUES("82","cron-1","2016-12-30 14:47:01");
INSERT INTO test_cron VALUES("83","cron-1","2016-12-30 14:48:01");
INSERT INTO test_cron VALUES("84","cron-1","2016-12-30 14:49:01");
INSERT INTO test_cron VALUES("85","cron-1","2016-12-30 14:50:01");
INSERT INTO test_cron VALUES("86","cron-1","2016-12-30 14:51:01");
INSERT INTO test_cron VALUES("87","cron-1","2016-12-30 14:52:01");
INSERT INTO test_cron VALUES("88","cron-1","2016-12-30 14:53:01");
INSERT INTO test_cron VALUES("89","cron-1","2016-12-30 14:54:01");
INSERT INTO test_cron VALUES("90","cron-1","2016-12-30 14:55:02");
INSERT INTO test_cron VALUES("91","cron-1","2016-12-30 14:56:01");
INSERT INTO test_cron VALUES("92","cron-1","2016-12-30 14:57:01");
INSERT INTO test_cron VALUES("93","cron-1","2016-12-30 14:58:01");
INSERT INTO test_cron VALUES("94","cron-1","2016-12-30 14:59:01");
INSERT INTO test_cron VALUES("95","cron-1","2016-12-30 15:00:01");
INSERT INTO test_cron VALUES("96","cron-1","2016-12-30 15:01:01");
INSERT INTO test_cron VALUES("97","cron-1","2016-12-30 15:02:01");
INSERT INTO test_cron VALUES("98","cron-1","2016-12-30 15:03:01");
INSERT INTO test_cron VALUES("99","cron-1","2016-12-30 15:04:01");
INSERT INTO test_cron VALUES("100","cron-1","2016-12-30 15:05:01");
INSERT INTO test_cron VALUES("101","cron-1","2016-12-30 15:06:01");
INSERT INTO test_cron VALUES("102","cron-1","2016-12-30 15:07:01");
INSERT INTO test_cron VALUES("103","cron-1","2016-12-30 15:08:01");
INSERT INTO test_cron VALUES("104","cron-1","2016-12-30 15:09:01");
INSERT INTO test_cron VALUES("105","cron-1","2016-12-30 15:10:01");
INSERT INTO test_cron VALUES("106","cron-1","2016-12-30 15:11:01");
INSERT INTO test_cron VALUES("107","cron-1","2016-12-30 15:12:01");
INSERT INTO test_cron VALUES("108","cron-1","2016-12-30 15:13:01");
INSERT INTO test_cron VALUES("109","cron-1","2016-12-30 15:14:01");
INSERT INTO test_cron VALUES("110","cron-1","2016-12-30 15:15:01");
INSERT INTO test_cron VALUES("111","cron-1","2016-12-30 15:16:01");
INSERT INTO test_cron VALUES("112","cron-1","2016-12-30 15:17:01");
INSERT INTO test_cron VALUES("113","cron-1","2016-12-30 15:18:01");
INSERT INTO test_cron VALUES("114","cron-1","2016-12-30 15:19:01");
INSERT INTO test_cron VALUES("115","cron-1","2016-12-30 15:20:01");
INSERT INTO test_cron VALUES("116","cron-1","2016-12-30 15:21:01");
INSERT INTO test_cron VALUES("117","cron-1","2016-12-30 15:22:01");
INSERT INTO test_cron VALUES("118","cron-1","2016-12-30 15:23:01");
INSERT INTO test_cron VALUES("119","cron-1","2016-12-30 15:24:01");
INSERT INTO test_cron VALUES("120","cron-1","2016-12-30 15:25:01");
INSERT INTO test_cron VALUES("121","cron-1","2016-12-30 15:26:01");
INSERT INTO test_cron VALUES("122","cron-1","2016-12-30 15:27:01");
INSERT INTO test_cron VALUES("123","cron-1","2016-12-30 15:28:01");
INSERT INTO test_cron VALUES("124","cron-1","2016-12-30 15:29:01");
INSERT INTO test_cron VALUES("125","cron-1","2016-12-30 15:30:01");
INSERT INTO test_cron VALUES("126","cron-1","2016-12-30 15:31:01");
INSERT INTO test_cron VALUES("127","cron-1","2016-12-30 15:32:01");
INSERT INTO test_cron VALUES("128","cron-1","2016-12-30 15:33:01");
INSERT INTO test_cron VALUES("129","cron-1","2016-12-30 15:34:01");
INSERT INTO test_cron VALUES("130","cron-1","2016-12-30 15:35:01");
INSERT INTO test_cron VALUES("131","cron-1","2016-12-30 15:36:02");
INSERT INTO test_cron VALUES("132","cron-1","2016-12-30 15:37:01");
INSERT INTO test_cron VALUES("133","cron-1","2016-12-30 15:38:01");
INSERT INTO test_cron VALUES("134","cron-1","2016-12-30 15:39:01");
INSERT INTO test_cron VALUES("135","cron-1","2016-12-30 15:40:01");
INSERT INTO test_cron VALUES("136","cron-1","2016-12-30 15:41:01");
INSERT INTO test_cron VALUES("137","cron-1","2016-12-30 15:42:01");
INSERT INTO test_cron VALUES("138","cron-1","2016-12-30 15:43:01");
INSERT INTO test_cron VALUES("139","cron-1","2016-12-30 15:44:01");
INSERT INTO test_cron VALUES("140","cron-1","2016-12-30 15:45:01");
INSERT INTO test_cron VALUES("141","cron-1","2016-12-30 15:46:01");
INSERT INTO test_cron VALUES("142","cron-1","2016-12-30 15:47:01");
INSERT INTO test_cron VALUES("143","cron-1","2016-12-30 15:48:01");
INSERT INTO test_cron VALUES("144","cron-1","2016-12-30 15:49:01");
INSERT INTO test_cron VALUES("145","cron-1","2016-12-30 15:50:01");
INSERT INTO test_cron VALUES("146","cron-1","2016-12-30 15:51:01");
INSERT INTO test_cron VALUES("147","cron-1","2016-12-30 15:52:01");
INSERT INTO test_cron VALUES("148","cron-1","2016-12-30 15:53:01");
INSERT INTO test_cron VALUES("149","cron-1","2016-12-30 15:54:01");
INSERT INTO test_cron VALUES("150","cron-1","2016-12-30 15:55:01");
INSERT INTO test_cron VALUES("151","cron-1","2016-12-30 15:56:01");
INSERT INTO test_cron VALUES("152","cron-1","2016-12-30 15:57:01");
INSERT INTO test_cron VALUES("153","cron-1","2016-12-30 15:58:01");
INSERT INTO test_cron VALUES("154","cron-1","2016-12-30 15:59:01");
INSERT INTO test_cron VALUES("155","cron-1","2016-12-30 16:00:02");
INSERT INTO test_cron VALUES("156","cron-1","2016-12-30 16:01:01");
INSERT INTO test_cron VALUES("157","cron-1","2016-12-30 16:02:01");
INSERT INTO test_cron VALUES("158","cron-1","2016-12-30 16:03:01");
INSERT INTO test_cron VALUES("159","cron-1","2016-12-30 16:04:01");
INSERT INTO test_cron VALUES("160","cron-1","2016-12-30 16:05:01");
INSERT INTO test_cron VALUES("161","cron-1","2016-12-30 16:06:01");
INSERT INTO test_cron VALUES("162","cron-1","2016-12-30 16:07:01");
INSERT INTO test_cron VALUES("163","cron-1","2016-12-30 16:08:01");
INSERT INTO test_cron VALUES("164","cron-1","2016-12-30 16:09:01");
INSERT INTO test_cron VALUES("165","cron-1","2016-12-30 16:10:01");
INSERT INTO test_cron VALUES("166","cron-1","2016-12-30 16:11:02");
INSERT INTO test_cron VALUES("167","cron-1","2016-12-30 16:12:01");
INSERT INTO test_cron VALUES("168","cron-1","2016-12-30 16:13:01");
INSERT INTO test_cron VALUES("169","cron-1","2016-12-30 16:14:01");
INSERT INTO test_cron VALUES("170","cron-1","2016-12-30 16:15:01");
INSERT INTO test_cron VALUES("171","cron-1","2016-12-30 16:16:01");
INSERT INTO test_cron VALUES("172","cron-1","2016-12-30 16:17:01");
INSERT INTO test_cron VALUES("173","cron-1","2016-12-30 16:18:01");
INSERT INTO test_cron VALUES("174","cron-1","2016-12-30 16:19:01");
INSERT INTO test_cron VALUES("175","cron-1","2016-12-30 16:20:01");
INSERT INTO test_cron VALUES("176","cron-1","2016-12-30 16:21:01");
INSERT INTO test_cron VALUES("177","cron-1","2016-12-30 16:22:01");
INSERT INTO test_cron VALUES("178","cron-1","2016-12-30 16:23:01");
INSERT INTO test_cron VALUES("179","cron-1","2016-12-30 16:24:01");
INSERT INTO test_cron VALUES("180","cron-1","2016-12-30 16:25:01");
INSERT INTO test_cron VALUES("181","cron-1","2016-12-30 16:26:01");
INSERT INTO test_cron VALUES("182","cron-1","2016-12-30 16:27:01");
INSERT INTO test_cron VALUES("183","cron-1","2016-12-30 16:28:01");
INSERT INTO test_cron VALUES("184","cron-1","2016-12-30 16:29:01");
INSERT INTO test_cron VALUES("185","cron-1","2016-12-30 16:30:01");
INSERT INTO test_cron VALUES("186","cron-1","2016-12-30 16:31:01");
INSERT INTO test_cron VALUES("187","cron-1","2016-12-30 16:32:01");
INSERT INTO test_cron VALUES("188","cron-1","2016-12-30 16:33:01");
INSERT INTO test_cron VALUES("189","cron-1","2016-12-30 16:34:01");
INSERT INTO test_cron VALUES("190","cron-1","2016-12-30 16:35:02");
INSERT INTO test_cron VALUES("191","cron-1","2016-12-30 16:36:01");
INSERT INTO test_cron VALUES("192","cron-1","2016-12-30 16:37:01");
INSERT INTO test_cron VALUES("193","cron-1","2016-12-30 16:38:01");
INSERT INTO test_cron VALUES("194","cron-1","2016-12-30 16:39:01");
INSERT INTO test_cron VALUES("195","cron-1","2016-12-30 16:40:01");
INSERT INTO test_cron VALUES("196","cron-1","2016-12-30 16:41:01");
INSERT INTO test_cron VALUES("197","cron-1","2016-12-30 16:42:01");
INSERT INTO test_cron VALUES("198","cron-1","2016-12-30 16:43:01");
INSERT INTO test_cron VALUES("199","cron-1","2016-12-30 16:44:01");
INSERT INTO test_cron VALUES("200","cron-1","2016-12-30 16:45:01");
INSERT INTO test_cron VALUES("201","cron-1","2016-12-30 16:46:01");
INSERT INTO test_cron VALUES("202","cron-1","2016-12-30 16:47:01");
INSERT INTO test_cron VALUES("203","cron-1","2016-12-30 16:48:01");
INSERT INTO test_cron VALUES("204","cron-1","2016-12-30 16:49:01");
INSERT INTO test_cron VALUES("205","cron-1","2016-12-30 16:50:01");
INSERT INTO test_cron VALUES("206","cron-1","2016-12-30 16:51:01");
INSERT INTO test_cron VALUES("207","cron-1","2016-12-30 16:52:01");
INSERT INTO test_cron VALUES("208","cron-1","2016-12-30 16:53:02");
INSERT INTO test_cron VALUES("209","cron-1","2016-12-30 16:54:01");
INSERT INTO test_cron VALUES("210","cron-1","2016-12-30 16:55:01");
INSERT INTO test_cron VALUES("211","cron-1","2016-12-30 16:56:01");
INSERT INTO test_cron VALUES("212","cron-1","2016-12-30 16:57:02");
INSERT INTO test_cron VALUES("213","cron-1","2016-12-30 16:58:01");
INSERT INTO test_cron VALUES("214","cron-1","2016-12-30 16:59:01");
INSERT INTO test_cron VALUES("215","cron-1","2016-12-30 17:00:01");
INSERT INTO test_cron VALUES("216","cron-1","2016-12-30 17:01:02");
INSERT INTO test_cron VALUES("217","cron-1","2016-12-30 17:02:01");
INSERT INTO test_cron VALUES("218","cron-1","2016-12-30 17:03:01");
INSERT INTO test_cron VALUES("219","cron-1","2016-12-30 17:04:01");
INSERT INTO test_cron VALUES("220","cron-1","2016-12-30 17:05:02");
INSERT INTO test_cron VALUES("221","cron-1","2016-12-30 17:06:01");
INSERT INTO test_cron VALUES("222","cron-1","2016-12-30 17:07:01");
INSERT INTO test_cron VALUES("223","cron-1","2016-12-30 17:08:01");
INSERT INTO test_cron VALUES("224","cron-1","2016-12-30 17:09:01");
INSERT INTO test_cron VALUES("225","cron-1","2016-12-30 17:10:01");
INSERT INTO test_cron VALUES("226","cron-1","2016-12-30 17:11:01");
INSERT INTO test_cron VALUES("227","cron-1","2016-12-30 17:12:01");
INSERT INTO test_cron VALUES("228","cron-1","2016-12-30 17:13:01");
INSERT INTO test_cron VALUES("229","cron-1","2016-12-30 17:14:01");
INSERT INTO test_cron VALUES("230","cron-1","2016-12-30 17:15:01");
INSERT INTO test_cron VALUES("231","cron-1","2016-12-30 17:16:01");
INSERT INTO test_cron VALUES("232","cron-1","2016-12-30 17:17:02");
INSERT INTO test_cron VALUES("233","cron-1","2016-12-30 17:18:01");
INSERT INTO test_cron VALUES("234","cron-1","2016-12-30 17:19:01");
INSERT INTO test_cron VALUES("235","cron-1","2016-12-30 17:20:01");
INSERT INTO test_cron VALUES("236","cron-1","2016-12-30 17:21:01");
INSERT INTO test_cron VALUES("237","cron-1","2016-12-30 17:22:01");
INSERT INTO test_cron VALUES("238","cron-1","2016-12-30 17:23:01");
INSERT INTO test_cron VALUES("239","cron-1","2016-12-30 17:24:01");
INSERT INTO test_cron VALUES("240","cron-1","2016-12-30 17:25:01");
INSERT INTO test_cron VALUES("241","cron-1","2016-12-30 17:26:01");
INSERT INTO test_cron VALUES("242","cron-1","2016-12-30 17:27:01");
INSERT INTO test_cron VALUES("243","cron-1","2016-12-30 17:28:01");
INSERT INTO test_cron VALUES("244","cron-1","2016-12-30 17:29:01");
INSERT INTO test_cron VALUES("245","cron-1","2016-12-30 17:30:01");
INSERT INTO test_cron VALUES("246","cron-1","2016-12-30 17:31:01");
INSERT INTO test_cron VALUES("247","cron-1","2016-12-30 17:32:01");
INSERT INTO test_cron VALUES("248","cron-1","2016-12-30 17:33:01");



Drop table if exists  testimonial;

CREATE TABLE `testimonial` (
  `test_id` int(95) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `test_name` varchar(100) DEFAULT NULL,
  `test_email_id` varchar(500) DEFAULT NULL,
  `test_city` varchar(300) DEFAULT NULL,
  `test_state` varchar(300) DEFAULT NULL,
  `test_country` varchar(300) DEFAULT NULL,
  `test_title` varchar(500) DEFAULT NULL,
  `test_desc` text,
  `test_status` int(1) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`test_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO testimonial VALUES("1","1","","","","","","testimonial","testimonial testimonial testimonial","1","2012-01-25 11:08:28","127.0.0.1");
INSERT INTO testimonial VALUES("7","25","","","","","","Hello","sakjasdhfkasd","1","2017-01-19 13:18:02","114.134.91.94");



Drop table if exists  ticket_conversation;

CREATE TABLE `ticket_conversation` (
  `con_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `adminid` int(1) DEFAULT NULL,
  `userid` bigint(20) DEFAULT NULL,
  `ticket_no` varchar(30) DEFAULT NULL,
  `from_id` text,
  `to_id` text,
  `tkt_message` text,
  `ticket_status` varchar(40) DEFAULT NULL,
  `con_date` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0-new,1-onhold,2-reopen,3-fixed,4-close',
  PRIMARY KEY (`con_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




Drop table if exists  tickets;

CREATE TABLE `tickets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `userid` bigint(20) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `contact_mailid` varchar(100) DEFAULT NULL,
  `ticket_no` varchar(30) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text,
  `ticket_status` varchar(30) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0-new,1-onhold,2-fixed,3-reopen,4-close',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  topic_detail;

CREATE TABLE `topic_detail` (
  `topic_id` int(5) NOT NULL AUTO_INCREMENT,
  `topic` varchar(50) DEFAULT NULL,
  `posteddate` date DEFAULT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO topic_detail VALUES("1","web design","2005-07-23");
INSERT INTO topic_detail VALUES("2","Coding hash","2005-07-25");
INSERT INTO topic_detail VALUES("3","php coding","2005-07-23");
INSERT INTO topic_detail VALUES("4","photo shop","2005-07-07");
INSERT INTO topic_detail VALUES("5","RDBMS Concepts","2005-07-23");
INSERT INTO topic_detail VALUES("6","J2EE","2005-07-23");
INSERT INTO topic_detail VALUES("7","adv java","2005-07-23");
INSERT INTO topic_detail VALUES("8","sample coding","2005-07-28");
INSERT INTO topic_detail VALUES("9","new test","2005-08-11");
INSERT INTO topic_detail VALUES("11","dsf","2005-08-21");



Drop table if exists  update_program;

CREATE TABLE `update_program` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) DEFAULT NULL,
  `prog_id` int(11) DEFAULT NULL,
  `referral_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  useronline;

CREATE TABLE `useronline` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) DEFAULT '',
  `timestamp` varchar(15) DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

INSERT INTO useronline VALUES("109","127.0.0.1","1328093873");
INSERT INTO useronline VALUES("100","127.0.0.1","1328093345");
INSERT INTO useronline VALUES("107","127.0.0.1","1328093868");
INSERT INTO useronline VALUES("108","127.0.0.1","1328093873");
INSERT INTO useronline VALUES("106","127.0.0.1","1328093868");
INSERT INTO useronline VALUES("105","127.0.0.1","1328093857");
INSERT INTO useronline VALUES("104","127.0.0.1","1328093857");
INSERT INTO useronline VALUES("103","127.0.0.1","1328093845");
INSERT INTO useronline VALUES("101","127.0.0.1","1328093517");
INSERT INTO useronline VALUES("102","127.0.0.1","1328093845");



Drop table if exists  users_online;

CREATE TABLE `users_online` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(16) DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  withdraw;

CREATE TABLE `withdraw` (
  `withdraw_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(20) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `withdraw_date` date DEFAULT NULL,
  `amount` double(30,8) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`withdraw_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




Drop table if exists  withdraw_pay;

CREATE TABLE `withdraw_pay` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `withdraw_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `amount` double(30,8) DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




