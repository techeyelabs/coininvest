-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2020 at 07:08 AM
-- Server version: 5.7.32
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atkinson_gold`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `state` enum('main','sub') DEFAULT 'main',
  `username` varchar(200) DEFAULT NULL,
  `admin_password` varchar(60) DEFAULT NULL,
  `login_verified` text,
  `admin_id` int(11) NOT NULL,
  `permission` text,
  `transactioncode` varchar(255) DEFAULT NULL,
  `two_step_code` varchar(550) DEFAULT NULL,
  `access_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `email`, `state`, `username`, `admin_password`, `login_verified`, `admin_id`, `permission`, `transactioncode`, `two_step_code`, `access_time`) VALUES
('admin', 'gold1990eg@protonmail.com', 'main', 'CGPTexDA3', '732f64cadb30888cbef7b52aba43708c', '', 1, 'User,Investment,Plan,Content,Financials,Preferences,Settings,Referral,SubAdmin,Support', '21232f297a57a5a743894a0e4a801fc3', 'Wjeoi8A6KsJx', '2019-02-15 12:00:00'),
(NULL, 'john4apps27@gmail.com', 'main', 'admin', 'e10adc3949ba59abbe56e057f20f883e', NULL, 6, 'User,Investment,Plan,Content,Financials,Preferences,Settings,Referral,SubAdmin,Support', NULL, 'SesonPtAi6Qs', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_commission`
--

CREATE TABLE `admin_commission` (
  `comm_id` int(11) NOT NULL,
  `amount` decimal(10,8) DEFAULT NULL,
  `description` text,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `set_id` int(11) NOT NULL,
  `set_name` varchar(50) DEFAULT NULL,
  `set_value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`set_id`, `set_name`, `set_value`) VALUES
(1, 'Site Name', 'AtKinSons'),
(2, 'Site Moto', ''),
(3, 'Admin Email', 'service.atkinsons@gmail.com'),
(4, 'E-Gold Number', '123456'),
(5, 'E-Gold Pass Pharse', 'aaaaaaaaaaaaa'),
(6, 'Minimum Withdraw Amount', '0.01'),
(7, 'Maximum Withdraw Amount', '500.00'),
(8, 'Number of Withdraw Allowed in a Month', '30'),
(9, 'Referral Commission', ''),
(10, 'Int-Gold Number', '111111'),
(11, 'Paypal Number', '111111'),
(12, 'Stormpay', '23221'),
(13, 'E-Bullion Number', '234234'),
(14, 'Money Bookers', '234234'),
(15, 'Admin Withdraw Commission in %', '0'),
(16, 'Uploaded Path', 'uploadimages'),
(17, 'Admin Fund Transfer Commission in %', '6'),
(18, 'Authentication Limit', '15'),
(19, 'Meta Keywords', ''),
(20, 'Company Logo', 'uploadimages/logo.jpg'),
(25, 'Released Deposit Commission in %', '1'),
(27, 'AlertPay', 'service.atkinsons@gmail.com'),
(28, 'Liberity reserve', ''),
(29, 'Safe Pay', '456456'),
(30, 'Perfect Money', ''),
(31, 'unique_email', 'off'),
(32, 'unique_ip', 'off'),
(33, 'Referral Status', 'on'),
(34, 'ins_withdraw_min', ''),
(35, 'ins_withdraw_max', ''),
(36, 'googleanalytical', ''),
(37, 'siteurl', 'http://atkinsonsbullion-invest-gold-mining.bio-vax.com'),
(40, 'withdrawal_type', '1'),
(41, 'Partner Admin Mail Id', ''),
(42, 'RepresentativeAdmin Mail Id', 'service.atkinsons@gmail.com'),
(43, 'Representative commission', ''),
(44, 'set_value', 'uploadimages/20170426101749496Final_Logo.png'),
(45, 'footer', 'GoldCoin'),
(46, 'set_value', 'banner01.png'),
(47, 'Calculator', 'on'),
(48, 'Payout', 'on'),
(49, 'Last Invest', 'on'),
(50, 'Top Invest', 'on'),
(51, 'business_day', 'on'),
(52, 'started', 'on'),
(53, 'runningdays', 'on'),
(54, 'totaldeposited', 'on'),
(55, 'totalwithdrawal', 'on'),
(56, 'todaydeposit', 'on'),
(57, 'todaywithdraw', 'on'),
(58, 'totalmembers', 'on'),
(59, 'activemembers', 'on'),
(60, 'newmembers', 'on'),
(61, 'friend', 'I just know you would want to see\nit too, so check it out.'),
(62, 'friend', 'I just found out about something\npretty cool, and you were the first person I thought of when I saw it.'),
(63, 'statistics', 'on'),
(64, 'sitestatus', 'on'),
(65, 'siteofflinemessage', 'Site is in Offline'),
(66, 'userlogin', 'on'),
(67, 'userreg', 'on'),
(68, 'keyboard', 'off'),
(69, 'captcha', 'on'),
(70, 'emailactivation', 'off'),
(71, 'passwordlength', '6'),
(72, 'username', 'on'),
(73, 'release_comm', '15'),
(74, 'transactionwithdraw', 'on'),
(75, 'mailnotification', 'on'),
(76, 'compundrange', '30'),
(77, 'compundrange1', '50');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_banners`
--

CREATE TABLE `advertisement_banners` (
  `banner_id` int(11) NOT NULL,
  `banner_url` varchar(100) DEFAULT NULL,
  `site_url` varchar(100) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `payment_thro` int(11) DEFAULT NULL,
  `status` enum('new','approved','suspended') DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement_banners`
--

INSERT INTO `advertisement_banners` (`banner_id`, `banner_url`, `site_url`, `plan_id`, `payment_thro`, `status`) VALUES
(2, 'http://www.hyip.com/images/10.03K(468x60)-2.gif', 'http://atkinsonsbullion-invest-gold-mining.bio-vax.com', 4, 2, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_plans`
--

CREATE TABLE `advertisement_plans` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(100) DEFAULT NULL,
  `plan_description` text,
  `cost` double DEFAULT NULL,
  `clicks_assured` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertisement_plans`
--

INSERT INTO `advertisement_plans` (`plan_id`, `plan_name`, `plan_description`, `cost`, `clicks_assured`) VALUES
(3, 'asfasf', 'asfasdf', 45, 345);

-- --------------------------------------------------------

--
-- Table structure for table `alerts_table`
--

CREATE TABLE `alerts_table` (
  `alerts_id` int(40) NOT NULL,
  `alerts_details` varchar(100) DEFAULT NULL,
  `alerts_type` varchar(100) DEFAULT NULL,
  `alerts_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blocktrail_ipn`
--

CREATE TABLE `blocktrail_ipn` (
  `id` int(11) NOT NULL,
  `wallet` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `amount` float(10,8) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `response_text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cb_response`
--

CREATE TABLE `cb_response` (
  `int` int(11) NOT NULL,
  `merchantID` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `appID` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `orderID` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '1=new,2=pending,3=paid,4=failed,5=expired,6=test',
  `res_text` text COLLATE utf8_unicode_ci NOT NULL,
  `res_time` datetime NOT NULL,
  `ip` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_table`
--

CREATE TABLE `cms_table` (
  `cms_id` int(20) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `content` longtext CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_table`
--

INSERT INTO `cms_table` (`cms_id`, `title`, `content`) VALUES
(1, 'Home', '&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;abt&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;&lt;br class=&quot;col-xs-4 text-center&quot; /&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;abt&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;&amp;nbsp;ãƒ“ãƒƒãƒˆã‚³ã‚¤ãƒ³&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam quam arcu, dignissim vitae neque&lt;/span&gt;&lt;/p&gt;\r\n&lt;div id=&quot;stcpDiv&quot; style=&quot;position: absolute; top: -1999px; left: -1988px;&quot;&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;à¦—à¦¾à¦‡à¦¬à¦¾à¦¨à§à¦§à¦¾-à§§ (à¦¸à§à¦¨à§à¦¦à¦°à¦—à¦žà§à¦œ) à¦†à¦¸à¦¨à§‡à¦° à¦†à¦“à§Ÿà¦¾à¦®à§€ à¦²à§€à¦— à¦¦à¦²à§€à§Ÿ&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;abt&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;abt&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;&lt;br /&gt;\r\n&lt;div id=&quot;stcpDiv&quot; style=&quot;position: absolute; top: -1999px; left: -1988px;&quot;&gt;&lt;span style=&quot;color: #ffffff;&quot;&gt;à¦—à¦¾à¦‡à¦¬à¦¾à¦¨à§à¦§à¦¾-à§§ (à¦¸à§à¦¨à§à¦¦à¦°à¦—à¦žà§à¦œ) à¦†à¦¸à¦¨à§‡à¦° à¦†à¦“à§Ÿà¦¾à¦®à§€ à¦²à§€à¦— à¦¦à¦²à§€à§Ÿ&lt;/span&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;'),
(2, 'About Us', '&lt;p style=&quot;text-align: justify;&quot;&gt;Bitcoin Arbitrage Trade invests in Bitcoin (BTC) and fiat currencies (ex: US Dollars) allowing for not only excellent global liquidity, but also a safe trading market. Due to price differences across different exchanges Bitcoin Arbitrage Trade can purchase Bitcoins in lower priced markets and sell them in higher priced markets, automatically and simultaneously. Next, Bitcoin Arbitrage Trade waits for a favorable price reversal to execute a trade in the reverse order of the previous trade, or, according to market conditions&amp;hellip;Our technology ensures this process is continuous and that every transaction is profitable.&lt;/p&gt;\r\n&lt;p&gt;&lt;em&gt;&lt;/em&gt;&lt;img style=&quot;display: block; margin-left: 190px; margin-right: auto;&quot; src=&quot;images/Profit-follo.png&quot; alt=&quot;&quot; /&gt;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: justify;&quot;&gt;Risk&amp;nbsp;Management&lt;br /&gt;Bitcoin Arbitrage Trade purchases in Bitcoins, but funds are saved in two forms: BTC and USD (or other fiat currencies.) At the end of each trading day before dividends are awarded to members the Fund ensures two things: an increase in the number of BTC and an equal increase in USD.&lt;br /&gt;Fund (BTC) members will experience changes in the exchange rate of BTC:USD, but like holding Bitcoins in a wallet the amount of Bitcoins are 100% ensured to remain the same and can be withdrawn at any time. The benefit of investing in the Fund (BTC) is the daily Bitcoin dividends paid to members.&lt;br /&gt;Fund (USD) members don&#039;t experience any currency exchange risks (USD:BTC.) The moment a member purchases Fund (USD) shares the shares&#039; total value is calculated at the current exchange rate and will be the same exchange rate used on redemption of the shares. Regardless of exchange rate changes, the total assets of Fund (USD) members do not change except the increase from daily USD dividends. In regards to these members, Bitcoins held by Fund (BTC) members are the arbitrage tools of Fund (USD) members, and vice versa.&lt;br /&gt;At the time of redemption, Fund (USD) members receive their original share value denominated in BTC, which can be immediately converted into USD for the full USD value of the original shares.&lt;br /&gt;In addition, we have chosen to use large-scale exchanges that adhere to international standards to ensure funds are allocated safely.&lt;br /&gt;How We Maintain Yields&lt;br /&gt;First, Bitcoin assets and USD assets are maintained at a certain proportion to ensure maximization of arbitrage earnings. By controlling the scale of the two Funds we can keep our arbitrage operation within a specific scope.&lt;br /&gt;Second, according to the market&amp;rsquo;s current liquidity we allow members to invest in the Fund, controlling the Fund&amp;rsquo;s total assets in order to allow us to maintain a relatively stable earnings rate. Therefore, after the Fund reaches a certain asset level there may be a period of time where no more additional investment in the Fund is allowed. When a member redeems their shares then other members can purchase shares up to the amount redeemed. Furthermore, if total market liquidity increases, the Funds earnings base increase which allows new opportunities for members to invest.&lt;br /&gt;The Bitcoin Arbitrage Trade algorithm is constantly being improved to increase yields: the Fund&amp;rsquo;s algorithm sets a minimum rate of return for each transaction to increase the overall yield of the fund.&lt;/p&gt;'),
(6, 'Contact us', ''),
(7, 'Terms &amp; conditions', '&lt;p&gt;??????&lt;/p&gt;'),
(8, 'Privacy Policy', '&lt;p&gt;bat24x.com Privacy Policy&lt;/p&gt;\r\n&lt;p&gt;This privacy policy has been compiled to better serve those who are concerned with how their &#039;Personally identifiable information&#039; (PII) is being used online. PII, as used in privacy law and information security, is information that can be used on its own or with other information to identify, contact, or locate a single person, or to identify an individual in context. Please read our privacy policy carefully to get a clear understanding of how we collect, use, protect or otherwise handle your Personally Identifiable Information in accordance with our website.&lt;/p&gt;\r\n&lt;p&gt;What personal information do we collect from the people that visit our blog, website or app?&lt;/p&gt;\r\n&lt;p&gt;When ordering or registering on our site, as appropriate, you may be asked to enter your email address or other details to help you with your experience.&lt;/p&gt;\r\n&lt;p&gt;When do we collect information?&lt;/p&gt;\r\n&lt;p&gt;We collect information from you when you subscribe to a newsletter, fill out a form or enter information on our site.&lt;/p&gt;\r\n&lt;p&gt;How do we use your information?&lt;/p&gt;\r\n&lt;p&gt;We may use the information we collect from you when you register, make a purchase, sign up for our newsletter, respond to a survey or marketing communication, surf the website, or use certain other site features in the following ways:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;To send periodic emails regarding your order or other products and services.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;How do we protect visitor information?&lt;/p&gt;\r\n&lt;p&gt;We do not use vulnerability scanning and/or scanning to PCI standards.&lt;br /&gt; We do not use Malware Scanning.&lt;br /&gt; We do not use an SSL certificate&lt;/p&gt;\r\n&lt;p&gt;Do we use &#039;cookies&#039;?&lt;/p&gt;\r\n&lt;p&gt;Yes. Cookies are small files that a site or its service provider transfers to your computer&#039;s hard drive through your Web browser (if you allow) that enables the site&#039;s or service provider&#039;s systems to recognize your browser and capture and remember certain information. For instance, we use cookies to help us remember and process the items in your shopping cart. They are also used to help us understand your preferences based on previous or current site activity, which enables us to provide you with improved services. We also use cookies to help us compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.&lt;/p&gt;\r\n&lt;p&gt;We use cookies to:&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Understand and save user&#039;s preferences for future visits.&lt;/li&gt;\r\n&lt;li&gt;Keep track of advertisements.&lt;/li&gt;\r\n&lt;li&gt;Compile aggregate data about site traffic and site interactions in order to offer better site experiences and tools in the future. We may also use trusted third party services that track this information on our behalf&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;You can choose to have your computer warn you each time a cookie is being sent, or you can choose to turn off all cookies. You do this through your browser (like Internet Explorer) settings. Each browser is a little different, so look at your browser&#039;s Help menu to learn the correct way to modify your cookies.&lt;/p&gt;\r\n&lt;p&gt;If users disable cookies in their browser:&lt;/p&gt;\r\n&lt;p&gt;If you disable cookies off, some features will be disabled It will turn off some of the features that make your site experience more efficient and some of our services will not function properly.&lt;/p&gt;\r\n&lt;p&gt;Third Party Disclosure&lt;/p&gt;\r\n&lt;p&gt;We sell, trade, or otherwise transfer to outside parties any form or online contact identifier email, name of chat account etc. We engage in this practice because to offer our email list for sale in the event we&#039;re going to sell the website.&lt;/p&gt;\r\n&lt;p&gt;Third party links&lt;/p&gt;\r\n&lt;p&gt;Occasionally, at our discretion, we may include or offer third party products or services on our website. These third party sites have separate and independent privacy policies. We therefore have no responsibility or liability for the content and activities of these linked sites. Nonetheless, we seek to protect the integrity of our site and welcome any feedback about these sites.&lt;/p&gt;\r\n&lt;p&gt;Contacting Us&lt;/p&gt;\r\n&lt;p&gt;If there are any questions regarding this privacy policy you may contact us using the information below.&lt;/p&gt;\r\n&lt;p&gt;bat24x.com&lt;br /&gt; support@bat24x.com&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;'),
(11, 'Home Page Offer ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(12, 'Promotion Banner Management', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(13, 'Investment', '&lt;p&gt;????&lt;/p&gt;'),
(25, 'Risk Disclosure Statements', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'),
(26, 'News', '&lt;p&gt;Antique Coins Our AML policies, procedures and internal controls are designed to ensure compliance with all applicable BSA regulations and FINRA rules and will be reviewed and updated on a regular basis to ensure appropriate policies, procedures and internal controls are in place to account for both changes in regulations and changes in our business.&lt;/p&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;'),
(31, 'Footer', 'Footer content'),
(32, 'Reprentatives', '&lt;p&gt;Before you register an account on the site submit the website (the &quot;Site&quot;, &quot;website&quot;) and become an investor Bitcoin Arbitrage Trading (the &quot;Company&quot;), refer to the following Terms and Conditions Agreement (the &quot;Terms&quot;).&lt;/p&gt;\r\n&lt;p&gt;The Rules set out the general procedure for interaction between the rights and obligations of the investor (the &quot;Investor&quot;) and the Company (hereinafter, if necessary, the content, - &quot;Parties&quot;, &quot;Party&quot;).&lt;/p&gt;\r\n&lt;p&gt;The rules are accepted and respected by the parties a priori.&lt;/p&gt;\r\n&lt;p&gt;In case of rejection of any item of the Rules, disagreement with the general doctrine of the Rules or any other differences of opinion, the user is obliged to stop the account registration and leave this section of the site.&lt;/p&gt;\r\n&lt;p&gt;Terms are considered accepted by the Investor at the fact of registration of the investor account on the Site.&lt;/p&gt;\r\n&lt;p style=&quot;text-align: left;&quot;&gt;&amp;nbsp;1. General Provisions&lt;/p&gt;\r\n&lt;p style=&quot;text-align: left; margin-top: -17px; margin-left: 30px;&quot;&gt;1. To register account on the Company`s website and get the status of &quot;investor&quot; can only person who has reached the age of&amp;nbsp; 18. In any case, the investor confirms that he is not less than 18 years old. &lt;br /&gt; 2. All transactions are made by the Parties in the &quot;private transaction&quot; format. The Parties confirm the complete confidentiality of any transaction and any interaction in the framework of the Regulation.&amp;nbsp;&lt;/p&gt;\r\n&lt;p style=&quot;text-align: left; margin-top: -14px;&quot;&gt;2. The rights and obligations of the Company&lt;br /&gt;3. The company is committed to:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. Use only the investment funds for the conduct of real activity on the Forex market&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp; &amp;nbsp; 2. Ensure the safety of investors funds&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp; &amp;nbsp; &amp;nbsp; 3. To make payments on time in the framework of partnership and investment proposals&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 4. Store the personal information of the Investor and the details of financial transactions in a strictly confidential environment.&lt;br /&gt; 4. The Company is not responsible for any technical malfunctions of electronic payment systems.&lt;br /&gt;5. The Company is not responsible for erroneous financial transactions that were a result of investor incorrect billing&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;br /&gt; 6. The rights and obligations of the Investor&lt;br /&gt;7. The investor is committed to:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. Provide only accurate and correct personal data&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 2. Use the Site of the Company solely for the purpose of investment&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 3. Comply with these rules.&lt;br /&gt; 8. The investor has the right to:&lt;br /&gt;9. Make a profit within the framework of the proposal of the Company&lt;br /&gt;10. Obtain advice and assistance in support of the Company&lt;br /&gt;11. Use the promotional materials for the invitation of new partners.&lt;br /&gt; 12. Provision of the risks&lt;br /&gt;13. Company guarantees the performance of its obligations under and in accordance with these Rules.&lt;br /&gt; 14. Copyright:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. All content posted on the company`s website is protected by copyright law.&lt;br /&gt; 15. Force majeure:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. The Company may suspend performance of its obligations in case of force majeure at any of the Parties for the period necessary to complete stop action and/or the impact of these force majeure.&lt;br /&gt; 16. Changes and additions:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. These Rules may be amended by the Company, made additions and/or updates at any time, without notice.&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 2. The investor undertakes to keep track of all changes to these Rules.&lt;br /&gt; 17. Termination, suspension of cooperation:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. In case of infringement and/or ignoring these Rules by an investor, the Company may suspend or terminate cooperation with the investor unilaterally, without any prior notice.&lt;br /&gt; 18.&amp;nbsp; Disputes settlement:&lt;br /&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; 1. Any dispute will be settled by the parties through the negotiation process, without the involvement of third parties, up to the full dispute settlement.&lt;/p&gt;'),
(33, 'Home Bottom', '&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a href=&quot;aboutus.php&quot;&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;'),
(34, 'Features', '&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;div class=&quot;col-lg-4&quot;&gt;\r\n&lt;div class=&quot;ftur&quot;&gt;\r\n&lt;div class=&quot;row&quot;&gt;\r\n&lt;div class=&quot;col-xs-4 text-center&quot;&gt;&amp;nbsp;&lt;/div&gt;\r\n&lt;div class=&quot;col-xs-8&quot;&gt;\r\n&lt;h3&gt;Heading Here&lt;/h3&gt;\r\n&lt;p&gt;lorem Lipsum Dmmy text&lt;/p&gt;\r\n&lt;a&gt;read more&lt;/a&gt;&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `coin_sell`
--

CREATE TABLE `coin_sell` (
  `id` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `full_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `post_by` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `amount` float(10,8) NOT NULL,
  `pay_time` datetime NOT NULL,
  `sender_wallet` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `wallet` varchar(600) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pay_status` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contentmodify`
--

CREATE TABLE `contentmodify` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `content` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contentmodify`
--

INSERT INTO `contentmodify` (`id`, `Name`, `content`) VALUES
(1, 'About Us', 'Add Content Here'),
(2, 'Terms and Conditions', 'Add Content Here'),
(3, 'Welcome', 'Add Content Here'),
(4, 'How It Works', 'Add Content Here'),
(5, 'Investors Info', 'Add Content Here'),
(6, 'Art', 'Add Content Here'),
(7, 'Voices', 'Add Content Here'),
(8, 'Welcome head', 'Welcome to SITE'),
(9, 'Welcome Image', 'uploadimages/imgg1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `country_id` int(20) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `dial_code` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country`, `dial_code`) VALUES
(1, 'Afghanistan', '+93'),
(2, 'Albania', '+355'),
(3, 'Algeria', '+213'),
(4, 'American Samoa', '+684'),
(5, 'Andorra', '+376'),
(6, 'Angola', '+244'),
(7, 'Anguilla', '+1-264'),
(8, 'Antarctica', '+672'),
(9, 'Antigua And Barbuda', '+1-268'),
(10, 'Argentina', '+54'),
(11, 'Armenia', '+374'),
(12, 'Aruba', '+297'),
(13, 'Australia', '+61'),
(14, 'Austria', '+43'),
(15, 'Azerbaijan', '+994'),
(16, 'Bahamas', '+1-242'),
(17, 'Bahrain', '+973'),
(18, 'Bangladesh', '+880'),
(19, 'Barbados', '+1-246'),
(20, 'Belarus', '+375'),
(21, 'Belgium', '+32'),
(22, 'Belize', '+501'),
(23, 'Benin', '+229'),
(24, 'Bermuda', '+1-441'),
(25, 'Bhutan', '+975'),
(26, 'Bolivia', '+591'),
(27, 'Bosnia and Herzegovina', '+387'),
(28, 'Botswana', '+267'),
(29, 'Bouvet Island', ''),
(30, 'Brazil', '+55'),
(31, 'British Indian Ocean Territory', ''),
(32, 'Brunei', '+673'),
(33, 'Bulgaria', '+359'),
(34, 'Burkina Faso', '+226'),
(35, 'Burundi', '+257'),
(36, 'Cambodia', '+855'),
(37, 'Cameroon', '+237'),
(38, 'Canada', '+1'),
(39, 'Cape verde', '+238'),
(40, 'Cayman Islands', '+1-345'),
(41, 'Central African Republic', '+236'),
(42, 'Chad', '+235'),
(43, 'Chile', '+56'),
(44, 'China', '+86'),
(45, 'Christmas Island', '+61'),
(46, 'Cocos (keeling) Islands', '+61'),
(47, 'Colombia', '+57'),
(48, 'Comoros', '+269'),
(49, 'Congo', '+242'),
(50, 'Cook Islands', '+682'),
(51, 'Costa Rica', '+506'),
(52, 'Croatia', '+385'),
(53, 'Cuba', '+53'),
(54, 'Cyprus', '+357'),
(55, 'Czech Republic', '+420'),
(56, 'Dem Rep of Congo (Zaire)', '+243'),
(57, 'Denmark', '+45'),
(58, 'Djibouti', '+253'),
(59, 'Dominica', '+1-767'),
(60, 'Dominican Republic', '+1-809'),
(61, 'East Timor', '+670'),
(62, 'Ecuador', '+593'),
(63, 'Egypt', '+20'),
(64, 'El Salvador', '+503'),
(65, 'England', '+689'),
(66, 'Equatorial Guinea', '+240'),
(67, 'Eritrea', '+291'),
(68, 'Estonia', '+372'),
(69, 'Ethiopia', '+251'),
(70, 'Falkland Islands', '+500'),
(71, 'Faroe Islands', '+298'),
(72, 'Fiji', '+679'),
(73, 'Finland', '+358'),
(74, 'France', '+33'),
(75, 'French Guiana', '+594'),
(76, 'French Polynesia', '+689'),
(77, 'French Southern Territories', ''),
(78, 'Gabon', '+241'),
(79, 'Gambia', '+220'),
(80, 'Georgia', '+995'),
(81, 'Germany', '+49'),
(82, 'Ghana', '+233'),
(83, 'Gibraltar', '+350'),
(84, 'Greece', '+30'),
(85, 'Greenland', '+299'),
(86, 'Grenada', '+1-473'),
(87, 'Guadeloupe', '+590'),
(88, 'Guam', '+1-671'),
(89, 'Guatemala', '+502'),
(90, 'Guinea', '+224'),
(91, 'Guinea-Bissau', '+245'),
(92, 'Guyana', '+592'),
(93, 'Haiti', '+509'),
(94, 'Heard and McDonald Islands', ''),
(95, 'Honduras', '+504'),
(96, 'Hungary', '+36'),
(97, 'Iceland', '+354'),
(98, 'India', '+91'),
(99, 'Indonesia', '+62'),
(100, 'Iran', '+98'),
(101, 'Iraq', '+964'),
(102, 'Ireland', '+353'),
(103, 'Israel', '+972'),
(104, 'Italy', '+39'),
(105, 'Ivory Coast', '+225'),
(106, 'Jamaica', '+1-876'),
(107, 'Japan', '+81'),
(108, 'Jordan', '+962'),
(109, 'Kazakhstan', '+7'),
(110, 'Kenya', '+254'),
(111, 'Kiribati', '+686'),
(112, 'Korea', '+850'),
(113, 'Korea (D.P.R.)', '+82'),
(114, 'Kuwait', '+965'),
(115, 'Kyrgyzstan', '+996'),
(116, 'Lao', '+856'),
(117, 'Latvia', '+371'),
(118, 'Lebanon', '+961'),
(119, 'Lesotho', '+266'),
(120, 'Liberia', '+231'),
(121, 'Libya', '+218'),
(122, 'Liechtenstein', '+423'),
(123, 'Lithuania', '+370'),
(124, 'Luxembourg', '+352'),
(125, 'Macedonia', '+389'),
(126, 'Madagascar', '+261'),
(127, 'Malawi', '+265'),
(128, 'Malaysia', '+60'),
(129, 'Maldives', '+960'),
(130, 'Mali', '+223'),
(131, 'Malta', '+356'),
(132, 'Marshall Islands', '+692'),
(133, 'Martinique', '+596'),
(134, 'Mauritania', '+222'),
(135, 'Mauritius', '+230'),
(136, 'Mayotte', '+269'),
(137, 'Mexico', '+52'),
(138, 'Micronesia', '+691'),
(139, 'Moldova', '+373'),
(140, 'Monaco', '+377'),
(141, 'Mongolia', '+976'),
(142, 'Montserrat', '+1-664'),
(143, 'Morocco', '+212'),
(144, 'Mozambique', '+258'),
(145, 'Myanmar', '+95'),
(146, 'Namibia', '+264'),
(147, 'Nauru', '+674'),
(148, 'Nepal', '+977'),
(149, 'Netherlands', '+31'),
(153, 'Nicaragua', '+505'),
(154, 'Niger', '+227'),
(155, 'Nigeria', '+234'),
(156, 'Niue', '+683'),
(157, 'Norfolk Island', '+672'),
(158, 'Northern Mariana Islands', '+1-670'),
(159, 'Norway', '+47'),
(160, 'Oman', '+968'),
(161, 'Other', ''),
(162, 'Pakistan', '+92'),
(163, 'Palau', '+680'),
(164, 'Palestinian Territory, Occupie', '+970'),
(165, 'Panama', '+507'),
(166, 'Papua new Guinea', '+675'),
(167, 'Paraguay', '+595'),
(168, 'Peru', '+51'),
(169, 'Philippines', '+63'),
(170, 'Pitcairn Island', '+872'),
(171, 'Poland', '+48'),
(172, 'Portugal', '+351'),
(173, 'Puerto Rico', '+1-787'),
(174, 'Qatar', '+974'),
(175, 'Reunion', '+262'),
(176, 'Romania', '+40'),
(177, 'Russia', '+998'),
(178, 'Rwanda', '+250'),
(179, 'Saint Kitts And Nevis', '+1-869'),
(180, 'Saint Lucia', '+1-758'),
(181, 'Saint Vincent And The Grenadin', '+1-784'),
(182, 'Samoa', '+685'),
(183, 'San Marino', '+378'),
(184, 'Sao Tome and Principe', '+239'),
(185, 'Saudi Arabia', '+966'),
(186, 'Scotland', '+44'),
(187, 'Senegal', '+221'),
(188, 'Seychelles', '+248'),
(189, 'Sierra Leone', '+232'),
(190, 'Singapore', '+65'),
(191, 'Slovak Republic', '+421'),
(192, 'Slovenia', '+386'),
(193, 'Solomon Islands', '+677'),
(194, 'Somalia', '+252'),
(195, 'South Africa', '+27'),
(196, 'South Georgia, Sth Sandwich Islands', ''),
(197, 'Spain', '+34'),
(198, 'Sri Lanka', '+94'),
(199, 'St Helena', '+290'),
(200, 'St Pierre and Miquelon', '+508'),
(201, 'Sudan', '+249'),
(202, 'Suriname', '+597'),
(203, 'Svalbard And Jan Mayen Islands', ''),
(204, 'Swaziland', '+268'),
(205, 'Sweden', '+46'),
(206, 'Switzerland', '+41'),
(207, 'Syria', '+963'),
(208, 'Taiwan', '+886'),
(209, 'Tikistan', '+992'),
(210, 'Tanzania', '+255'),
(211, 'Thailand', '+66'),
(212, 'Togo', '+228'),
(213, 'Tokelau', '+690'),
(214, 'Tonga', '+676'),
(215, 'Trinidad And Tobago', '+1-868'),
(216, 'Tunisia', '+216'),
(217, 'Turkey', '+90'),
(218, 'Turkmenistan', '+993'),
(219, 'Turks And Caicos Islands', '+1-649'),
(220, 'Tuvalu', '+688'),
(221, 'Uganda', '+256'),
(222, 'Ukraine', '+380'),
(223, 'United Arab Emirates', '+971'),
(224, 'United States', '+1'),
(225, 'Uruguay', '+598'),
(226, 'Uzbekistan', '+998'),
(227, 'Vanuatu', '+678'),
(228, 'Vatican City State (Holy See)', '+39'),
(229, 'Venezuela', '+58'),
(230, 'Vietnam', '+84'),
(231, 'Virgin Islands (British)', '+1'),
(232, 'Virgin Islands (US)', '+1-340'),
(233, 'Wales', '+44'),
(234, 'Wallis And Futuna Islands', '+681'),
(235, 'Western Sahara', '+685'),
(236, 'Yemen', '+967'),
(237, 'Zambia', '+260'),
(238, 'Zimbabwe', '+263');

-- --------------------------------------------------------

--
-- Table structure for table `crypto_payments`
--

CREATE TABLE `crypto_payments` (
  `paymentID` int(11) UNSIGNED NOT NULL,
  `boxID` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `boxType` enum('paymentbox','captchabox') NOT NULL,
  `orderID` varchar(50) NOT NULL DEFAULT '',
  `userID` varchar(50) NOT NULL DEFAULT '',
  `countryID` varchar(3) NOT NULL DEFAULT '',
  `coinLabel` varchar(6) NOT NULL DEFAULT '',
  `amount` double(20,8) NOT NULL DEFAULT '0.00000000',
  `amountUSD` double(20,8) NOT NULL DEFAULT '0.00000000',
  `unrecognised` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `addr` varchar(34) NOT NULL DEFAULT '',
  `txID` char(64) NOT NULL DEFAULT '',
  `txDate` datetime DEFAULT NULL,
  `txConfirmed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `txCheckDate` datetime DEFAULT NULL,
  `processed` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `processedDate` datetime DEFAULT NULL,
  `recordCreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `css`
--

CREATE TABLE `css` (
  `css_id` int(4) NOT NULL,
  `css_name` varchar(200) DEFAULT NULL,
  `css_path` varchar(240) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `css`
--

INSERT INTO `css` (`css_id`, `css_name`, `css_path`, `status`) VALUES
(1, 'Normal', 'style/style.css', 'active'),
(2, 'Green', 'style/green.css', 'inactive'),
(3, 'Brown', 'style/brown.css', 'inactive'),
(4, 'Red', 'style/red.css', 'inactive'),
(5, 'Orange', 'style/orange.css', 'inactive'),
(6, 'Dark Green', 'style/dgreen.css', 'inactive'),
(7, 'Yellow', 'style/yellow.css', 'inactive'),
(8, 'Bluish', 'style/bluish.css', 'inactive'),
(9, 'Lightblue', 'style/lightblue.css', 'inactive'),
(10, 'Violet', 'style/violet.css', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `daily_interest`
--

CREATE TABLE `daily_interest` (
  `daily_interest_id` int(40) NOT NULL,
  `plan_id` int(40) DEFAULT NULL,
  `interest` double(40,8) DEFAULT NULL,
  `change_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `demo_account`
--

CREATE TABLE `demo_account` (
  `demo_id` bigint(20) NOT NULL,
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
  `date_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `deposit_id` int(20) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `plan_id` int(20) DEFAULT NULL,
  `order_no` varchar(450) NOT NULL,
  `user_wallet` varchar(500) NOT NULL,
  `wallet` varchar(500) DEFAULT NULL,
  `hash_code` text,
  `amount` double(30,8) DEFAULT NULL,
  `compound_amount` double(30,8) DEFAULT NULL,
  `invest_date` date DEFAULT NULL,
  `maturity_date` date DEFAULT NULL,
  `status` enum('new','active','matured','released') DEFAULT 'new',
  `intrest_alloted` enum('yes','no') DEFAULT 'no',
  `payment_thro` int(11) DEFAULT NULL,
  `intrest_earned` double(30,8) DEFAULT NULL,
  `intrest_earned_date` date DEFAULT NULL,
  `compound_rate` int(30) DEFAULT NULL,
  `transaction_id` text,
  `cron_date` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`deposit_id`, `member_id`, `plan_id`, `order_no`, `user_wallet`, `wallet`, `hash_code`, `amount`, `compound_amount`, `invest_date`, `maturity_date`, `status`, `intrest_alloted`, `payment_thro`, `intrest_earned`, `intrest_earned_date`, `compound_rate`, `transaction_id`, `cron_date`) VALUES
(1, 92, 3, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 2.00000000, 2.00000000, '2020-09-17', '2021-03-16', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP5285046', '2020-10-14 17:10:10'),
(2, 92, 3, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 3.00000000, 3.00000000, '2020-09-17', '2021-03-16', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP370997', '2020-10-14 17:10:10'),
(3, 94, 5, '', '1654654654', '', NULL, 5.00000000, 5.00000000, '2020-09-21', '2021-03-20', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP1346699', '2020-10-14 17:10:10'),
(4, 93, 3, '', '121564654asfsafsafgasggasgasgasgasgsagsagsagsags', '', NULL, 2.00000000, 2.00000000, '2020-09-22', '2021-03-21', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP3618925', '2020-10-14 17:10:10'),
(5, 2, 3, '', 'zxvggg55ff', '', NULL, 3.00000000, 3.00000000, '2020-09-22', '2021-03-21', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP6224864', '2020-11-19 13:10:10'),
(6, 2, 3, '', 'zxvggg55ff', '', NULL, 2.00000000, 2.00000000, '2020-09-24', '2021-03-23', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP483149', '2020-11-19 13:10:10'),
(7, 2, 3, '', 'zxvggg55ff', '', NULL, 2.00000000, 2.00000000, '2020-09-22', '2021-03-21', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP2167257', '2020-11-19 13:10:10'),
(9, 96, 7, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgj', '', NULL, 35.00000000, 35.00000000, '2020-09-24', '2021-09-24', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP71812', '2020-10-14 17:10:10'),
(10, 92, 13, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 50.00000000, 50.00000000, '2020-09-24', '2021-09-24', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP2956252', '2020-10-14 17:10:10'),
(11, 92, 15, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 0.09000000, 0.09000000, '2020-09-24', '2020-09-26', 'matured', 'no', 38, 0.00000000, NULL, 0, 'DEP3753700', '2020-09-25 17:10:10'),
(12, 92, 5, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 5.50000000, 5.50000000, '2020-09-29', '2021-03-28', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP5783990', '2020-10-14 17:10:10'),
(13, 100, 3, '', 'Bitcoin', '', NULL, 2.00000000, 2.00000000, '2020-10-02', '2021-03-31', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP9186640', '2020-10-14 17:10:10'),
(14, 2, 5, '', 'zxvggg55ff', '', NULL, 5.00000000, 5.00000000, '2020-10-02', '2021-03-31', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP4386929', NULL),
(15, 101, 3, '', 'Bitcoin', '', NULL, 2.00000000, 2.00000000, '2020-10-02', '2021-03-31', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP6369335', NULL),
(16, 97, 5, '', 'Bitcoin', '', NULL, 5.00000000, 5.00000000, '2020-10-02', '2021-03-31', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP1834379', '2020-11-19 13:10:10'),
(17, 97, 3, '', 'Bitcoin', '', NULL, 2.00000000, 2.00000000, '2020-10-02', '2021-03-31', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP1500079', '2020-11-19 13:10:10'),
(18, 97, 3, '', 'Bitcoin', '', NULL, 2.00000000, 2.00000000, '2020-10-02', '2021-03-31', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP2792255', NULL),
(19, 104, 5, '', 'adasd', '', NULL, 5.00000000, 5.00000000, '2020-10-02', '2021-03-31', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP5985232', '2020-10-14 17:10:10'),
(20, 92, 13, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 39.00000000, 39.00000000, '2020-10-02', '2021-10-02', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP2770075', '2020-10-14 17:10:10'),
(21, 92, 13, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 39.00000000, 39.00000000, '2020-10-02', '2021-10-02', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP7482557', '2020-10-14 17:10:10'),
(22, 92, 5, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 6.00000000, 6.00000000, '2020-10-02', '2021-03-31', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP7005075', '2020-10-14 17:10:10'),
(23, 92, 5, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 6.00000000, 6.00000000, '2020-10-02', '2021-03-31', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP6868161', '2020-10-14 17:10:10'),
(24, 92, 5, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 6.00000000, 6.00000000, '2020-10-02', '2021-03-31', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP2247748', '2020-10-14 17:10:10'),
(25, 94, 3, '', '1654654654', '', NULL, 1.00000000, 1.00000000, '2020-10-02', '2021-03-31', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP7664649', '2020-10-14 17:10:10'),
(26, 92, 5, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 6.00000000, 6.00000000, '2020-10-03', '2021-04-01', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP4299810', '2020-10-14 17:10:10'),
(27, 92, 5, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 6.00000000, 6.00000000, '2020-10-02', '2021-03-31', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP3343383', NULL),
(28, 97, 5, '', 'Bitcoin', '', NULL, 5.56800000, 5.56800000, '2020-10-02', '2021-03-31', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP440684', NULL),
(29, 2, 6, '', 'zxvggg55ff', '', NULL, 12.00000000, 12.00000000, '2020-10-02', '2021-03-31', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP4227438', NULL),
(30, 2, 3, '', 'zxvggg55ff', '', NULL, 2.00000000, 2.00000000, '2020-10-02', '2021-03-31', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP3339618', NULL),
(31, 104, 3, '', 'adasd', '', NULL, 2.00000000, 2.00000000, '2020-10-05', '2021-04-03', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP5232532', '2020-10-14 17:10:10'),
(32, 92, 5, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 5.00000000, 5.00000000, '2020-10-03', '2021-04-01', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP2233511', '2020-10-14 17:10:10'),
(33, 92, 7, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgjd', '', NULL, 18.00000000, 18.00000000, '2020-10-02', '2021-10-02', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP3585373', '2020-10-14 17:10:10'),
(34, 96, 3, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgj', '', NULL, 2.50000000, 2.50000000, '2020-10-03', '2021-04-01', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP6600691', '2020-10-14 17:10:10'),
(35, 105, 5, '', 'Bitcoin', '', NULL, 5.20240000, 5.20240000, '2020-10-05', '2021-04-03', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP206877', '2020-10-14 17:10:10'),
(36, 104, 6, '', 'adasd', '', NULL, 10.00000000, 10.00000000, '2020-10-05', '2021-04-03', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP6179569', '2020-10-14 17:10:10'),
(37, 96, 13, '', 'sdfjasdgjsdflkghadlfnkjadhgaidjhfgj', '', NULL, 150.00000000, 150.00000000, '2020-10-05', '2021-10-05', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP483684', '2020-10-14 17:10:10'),
(38, 97, 6, '', 'Bitcoin', '', NULL, 10.00000000, 10.00000000, '2020-10-06', '2021-04-04', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP974207', NULL),
(39, 106, 3, '', 'Bitcoin', '', NULL, 2.05690000, 2.05690000, '2020-10-06', '2021-04-04', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP4359329', '2020-10-14 17:10:10'),
(40, 2, 3, '', 'zxvggg55ff', '', NULL, 1.00000000, 1.00000000, '2020-10-15', '2021-04-13', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP2033686', '2020-11-19 13:10:10'),
(41, 112, 6, '', '18SrMTJ8oYVsg2Bh83gmQxwbfFVNd5k7NA', '', NULL, 10.00000000, 10.00000000, '2020-10-29', '2021-04-27', 'new', 'no', 38, 0.00000000, NULL, 0, 'DEP2675712', NULL),
(44, 113, 3, '', '123', '', NULL, 0.10000000, 0.10000000, '2020-10-30', '2021-04-28', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP5658045', '2020-11-19 13:10:10'),
(45, 107, 3, '', '1234124142', '', NULL, 1.00000000, 1.00000000, '2020-11-02', '2021-05-01', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP9494744', '2020-11-19 13:10:10'),
(46, 113, 3, '', '123', '', NULL, 0.40000000, 0.40000000, '2020-11-04', '2021-05-03', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP7205055', '2020-11-19 13:10:10'),
(47, 119, 3, '', '0913', '', NULL, 0.59400000, 0.59400000, '2020-11-11', '2021-05-10', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP1460414', '2020-11-19 13:10:10'),
(48, 119, 3, '', '0913', '', NULL, 0.20600000, 0.20600000, '2020-11-13', '2021-05-12', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP2182503', '2020-11-19 13:10:10'),
(49, 107, 3, '', '1234124142', '', NULL, 0.20000000, 0.20000000, '2020-11-19', '2021-05-18', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP4401791', NULL),
(50, 120, 5, '', 'msk', '', NULL, 6.50090000, 6.50090000, '2020-11-19', '2021-05-18', 'active', 'no', 38, 0.00000000, NULL, 0, 'DEP671886', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposit_old`
--

CREATE TABLE `deposit_old` (
  `deposit_id` int(20) NOT NULL,
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
  `cron_date` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `deposit_req`
--

CREATE TABLE `deposit_req` (
  `req_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `amount` double(50,8) DEFAULT NULL,
  `payid` int(11) DEFAULT NULL,
  `planid` int(11) DEFAULT NULL,
  `compound` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `downlines`
--

CREATE TABLE `downlines` (
  `down_id` bigint(20) NOT NULL,
  `member_id` bigint(20) DEFAULT NULL,
  `intro_id` bigint(20) DEFAULT NULL,
  `sel_down` varchar(20) DEFAULT NULL,
  `placement_id` bigint(20) DEFAULT NULL,
  `left_id` bigint(20) DEFAULT NULL,
  `right_id` bigint(20) DEFAULT NULL,
  `bonus_status` int(1) DEFAULT '0' COMMENT '0-notset,1-send'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `downlines`
--

INSERT INTO `downlines` (`down_id`, `member_id`, `intro_id`, `sel_down`, `placement_id`, `left_id`, `right_id`, `bonus_status`) VALUES
(1, 1, 0, 'left', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `question` text CHARACTER SET ucs2,
  `answer` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(2, 'What is the Green Yellow?', 'We are the world\'s most advanced mining company. Based on earth-friendly wind power generation\r\nOur vision is to create a sustainable world by performing appropriate mining.'),
(3, 'For how many years have you been functional?', 'In April 2019 green-yellows.com released the platform. It was hired in the middle of 2019 to prepare to start accepting investment from administrative individuals in 2019.'),
(4, 'Can you provide confirmation of your investment records and results?', 'It is regarded as a secret of the company, Data is not open to the public. In this way, bear the criminal risk to us, service, Green Yellow can be characterized as a contradiction investment counselor with our point of view of business and Exchange Law, to publish this data. As much as we can, we share our achievements on a subjective scale.\r\n'),
(5, 'How do I sign up with you?', 'In order to sign up we need to register the account by clicking on the registration on the website. Then we will process the rest as you just need to investment funds to your account with your favorite payment method with simple green-yellows.com.\r\n'),
(6, 'How do I invest funds into my account?', 'You need to use the payment system account to fund to green-yellows.com. Currently, we are using Bitcoin`s payment system. If you have any questions, please contact us. Details will be replied within 24 hours.\r\n'),
(7, 'Why use payment systems?', 'Payment System done each transaction is instantaneous and the cost is minimal compared to bank transfer fee, it is a very advantageous approach when transferring funds via the online platform. Because they are very easy to exchange funds with our trading account, it fits our action plan very well.\r\n'),
(8, 'I would prefer to not create a payment system account, would I be able to invest via bank wire?', 'Bank transfers are expensive and currently accepted only in Bitcoin.'),
(9, 'Can I sign up using a credit card?', 'No, direct payment with credit card is not possible in green-yellows.com platform.'),
(10, 'What are the requirements for opening an account?', 'You just need to fill out the form with your personal details by clicking on the \"Register\" button at the top of our homepage.\n'),
(11, 'I lost my password. What should I do?', 'Click the reset password link below the log in box, it complies with the provisions of the process. If for some reason it is not successful please contact our support team, we will reset it for you.\r\n'),
(12, 'Will my initial investment be returned at the expiration of the investment period?', 'Yes, the principal will be returned at the maturity of the investment period. '),
(13, 'Who can join Green Yellow?', 'Our individuals from all over the world, however, admit you should be no less than 18 years of age in order to create an account.\n'),
(14, 'What kind of invest is available?', 'We are using Bitcoin payment system.'),
(15, 'What is the investment period?', 'The investment period will be 180 days or 365 days depending on the plan.\r\n'),
(16, 'What is the least investment total?', 'At least investment amount is 0.5BTC.'),
(17, 'Can I make more than one active invest?', 'Yes, all investments are taken care of independently and you can make various investments in Bitcoin.'),
(18, 'Can I cancel my active investment prior to its expiration date?', 'No. you can not cancel.'),
(19, 'At which time can I get back my profit?', 'Everything will be paid-back when you reach maturity.'),
(20, 'What is the minimum withdrawal amount?', 'After maturity of investment the minimum withdrawal amount is 0.01BTC'),
(21, 'How can I start withdrawing?', 'You need to login to the member area and click on finances. Next, please select the amount of money.'),
(22, 'What is the Green Yellow affiliate program?', 'Our affiliate program is an approach to gain additional money by referring new individuals to Green Yellow. It isn\'t compulsory to refer others to profit but rather it\'s an extraordinary approach to expand your earnings. We have a four level deep referral system which implies that you will gain commissions on investments made by people you refer and likewise on deposits made by their referrals.\r\n'),
(23, 'What amount would I be able to earn from referral commissions?', 'The reffaral commission earns of 15% in the first level, 3% in the second level, 1% in the third level, 1% in the fourth level.'),
(24, 'What is a representative?', 'Representatives are promoters with great promotional aptitudes eager to assist newcomers by means of email, telephone or instant messengers. At the point when another financial investor visits our website initially, they can reach out to a local representative in their native dialect to make inquiries concerning Green Yellow and its business.\r\n'),
(25, 'What is the upside of being a representative?', 'the representative earns a higher referral fee.'),
(26, 'How do I become a representative?', '<!--[if gte mso 9]><xml>\r\n <o:DocumentProperties>\r\n  <o:Revision>0</o:Revision>\r\n  <o:TotalTime>0</o:TotalTime>\r\n  <o:Pages>1</o:Pages>\r\n  <o:Words>39</o:Words>\r\n  <o:Characters>225</o:Characters>\r\n  <o:Company>Excel Company Ltd.</o:Company>\r\n  <o:Lines>1</o:Lines>\r\n  <o:Paragraphs>1</o:Paragraphs>\r\n  <o:CharactersWithSpaces>263</o:CharactersWithSpaces>\r\n  <o:Version>14.0</o:Version>\r\n </o:DocumentProperties>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]-->\r\n\r\n<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>JA</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n   <w:UseFELayout/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"276\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]-->\r\n<style>\r\n<!--\r\n /* Font Definitions */\r\n@font-face\r\n	{font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	panose-1:0 0 0 0 0 0 0 0 0 0;\r\n	mso-font-charset:128;\r\n	mso-generic-font-family:roman;\r\n	mso-font-format:other;\r\n	mso-font-pitch:fixed;\r\n	mso-font-signature:1 134676480 16 0 131072 0;}\r\n@font-face\r\n	{font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	panose-1:0 0 0 0 0 0 0 0 0 0;\r\n	mso-font-charset:128;\r\n	mso-generic-font-family:roman;\r\n	mso-font-format:other;\r\n	mso-font-pitch:fixed;\r\n	mso-font-signature:1 134676480 16 0 131072 0;}\r\n@font-face\r\n	{font-family:Cambria;\r\n	panose-1:2 4 5 3 5 4 6 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536870145 1073743103 0 0 415 0;}\r\n /* Style Definitions */\r\np.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:\"\";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\nspan.a\r\n	{mso-style-name:ãªã—;\r\n	mso-style-unhide:no;\r\n	mso-style-parent:\"\";}\r\n.MsoChpDefault\r\n	{mso-style-type:export-only;\r\n	mso-default-props:yes;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n@page WordSection1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.WordSection1\r\n	{page:WordSection1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\ntable.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;}\r\n</style>\r\n<![endif]-->\r\n\r\n\r\n\r\n<!--StartFragment-->\r\n\r\n<p class=\"MsoNormal\">Please contact us from the inquiry form. Please tell us what\r\nyou achieved for green-yellows.com. <span class=\"a\"><span style=\"font-family:Helvetica;\r\ncolor:#333333;background:white\">We will assess your profile and get in touch\r\nwith you to communicate our response.</span></span> Please note that it is\r\nmandatory to make a minimum investment (100 BTC) before applying.<o:p></o:p></p>\r\n\r\n<!--EndFragment-->');
INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(27, 'When I become the representative, what will be the referral commission?\r\n', '<!--[if gte mso 9]><xml>\r\n <o:DocumentProperties>\r\n  <o:Revision>0</o:Revision>\r\n  <o:TotalTime>0</o:TotalTime>\r\n  <o:Pages>1</o:Pages>\r\n  <o:Words>12</o:Words>\r\n  <o:Characters>69</o:Characters>\r\n  <o:Company>Excel Company Ltd.</o:Company>\r\n  <o:Lines>1</o:Lines>\r\n  <o:Paragraphs>1</o:Paragraphs>\r\n  <o:CharactersWithSpaces>80</o:CharactersWithSpaces>\r\n  <o:Version>14.0</o:Version>\r\n </o:DocumentProperties>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]-->\r\n\r\n<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>JA</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n   <w:UseFELayout/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"276\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]-->\r\n<style>\r\n<!--\r\n /* Font Definitions */\r\n@font-face\r\n	{font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	panose-1:0 0 0 0 0 0 0 0 0 0;\r\n	mso-font-charset:128;\r\n	mso-generic-font-family:roman;\r\n	mso-font-format:other;\r\n	mso-font-pitch:fixed;\r\n	mso-font-signature:1 134676480 16 0 131072 0;}\r\n@font-face\r\n	{font-family:\"Cambria Math\";\r\n	panose-1:2 4 5 3 5 4 6 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536870145 1107305727 0 0 415 0;}\r\n@font-face\r\n	{font-family:Cambria;\r\n	panose-1:2 4 5 3 5 4 6 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536870145 1073743103 0 0 415 0;}\r\n /* Style Definitions */\r\np.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:\"\";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n.MsoChpDefault\r\n	{mso-style-type:export-only;\r\n	mso-default-props:yes;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n@page WordSection1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.WordSection1\r\n	{page:WordSection1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\ntable.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;}\r\n</style>\r\n<![endif]-->\r\n\r\n\r\n\r\n<!--StartFragment--><span style=\"font-size:12.0pt;font-family:Cambria;\r\nmso-ascii-theme-font:minor-latin;mso-fareast-font-family:&quot;ï¼­ï¼³ æ˜Žæœ&quot;;mso-fareast-theme-font:\r\nminor-fareast;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">When you become a representative, referral commissions will be increased 5%.</span><!--EndFragment-->'),
(28, 'Is there a banner or other material available to promote Green Yellow?', '<!--[if gte mso 9]><xml>\r\n <o:DocumentProperties>\r\n  <o:Revision>0</o:Revision>\r\n  <o:TotalTime>0</o:TotalTime>\r\n  <o:Pages>1</o:Pages>\r\n  <o:Words>8</o:Words>\r\n  <o:Characters>49</o:Characters>\r\n  <o:Company>Excel Company Ltd.</o:Company>\r\n  <o:Lines>1</o:Lines>\r\n  <o:Paragraphs>1</o:Paragraphs>\r\n  <o:CharactersWithSpaces>56</o:CharactersWithSpaces>\r\n  <o:Version>14.0</o:Version>\r\n </o:DocumentProperties>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]-->\r\n\r\n<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>JA</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n   <w:UseFELayout/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"276\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]-->\r\n<style>\r\n<!--\r\n /* Font Definitions */\r\n@font-face\r\n	{font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	panose-1:0 0 0 0 0 0 0 0 0 0;\r\n	mso-font-charset:128;\r\n	mso-generic-font-family:roman;\r\n	mso-font-format:other;\r\n	mso-font-pitch:fixed;\r\n	mso-font-signature:1 134676480 16 0 131072 0;}\r\n@font-face\r\n	{font-family:\"Cambria Math\";\r\n	panose-1:2 4 5 3 5 4 6 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536870145 1107305727 0 0 415 0;}\r\n@font-face\r\n	{font-family:Cambria;\r\n	panose-1:2 4 5 3 5 4 6 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536870145 1073743103 0 0 415 0;}\r\n /* Style Definitions */\r\np.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:\"\";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n.MsoChpDefault\r\n	{mso-style-type:export-only;\r\n	mso-default-props:yes;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n@page WordSection1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.WordSection1\r\n	{page:WordSection1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\ntable.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;}\r\n</style>\r\n<![endif]-->\r\n\r\n\r\n\r\n<!--StartFragment--><span style=\"font-size:12.0pt;font-family:Cambria;\r\nmso-ascii-theme-font:minor-latin;mso-fareast-font-family:&quot;ï¼­ï¼³ æ˜Žæœ&quot;;mso-fareast-theme-font:\r\nminor-fareast;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">Yes, they are located under REFERRAL in the\r\nmember area.</span><!--EndFragment-->');
INSERT INTO `faq` (`faq_id`, `question`, `answer`) VALUES
(29, 'Can I refer to myself?', '<!--[if gte mso 9]><xml>\r\n <o:DocumentProperties>\r\n  <o:Revision>0</o:Revision>\r\n  <o:TotalTime>0</o:TotalTime>\r\n  <o:Pages>1</o:Pages>\r\n  <o:Words>2</o:Words>\r\n  <o:Characters>14</o:Characters>\r\n  <o:Company>Excel Company Ltd.</o:Company>\r\n  <o:Lines>1</o:Lines>\r\n  <o:Paragraphs>1</o:Paragraphs>\r\n  <o:CharactersWithSpaces>15</o:CharactersWithSpaces>\r\n  <o:Version>14.0</o:Version>\r\n </o:DocumentProperties>\r\n <o:OfficeDocumentSettings>\r\n  <o:AllowPNG/>\r\n </o:OfficeDocumentSettings>\r\n</xml><![endif]-->\r\n\r\n<!--[if gte mso 9]><xml>\r\n <w:WordDocument>\r\n  <w:View>Normal</w:View>\r\n  <w:Zoom>0</w:Zoom>\r\n  <w:TrackMoves/>\r\n  <w:TrackFormatting/>\r\n  <w:PunctuationKerning/>\r\n  <w:ValidateAgainstSchemas/>\r\n  <w:SaveIfXMLInvalid>false</w:SaveIfXMLInvalid>\r\n  <w:IgnoreMixedContent>false</w:IgnoreMixedContent>\r\n  <w:AlwaysShowPlaceholderText>false</w:AlwaysShowPlaceholderText>\r\n  <w:DoNotPromoteQF/>\r\n  <w:LidThemeOther>EN-US</w:LidThemeOther>\r\n  <w:LidThemeAsian>JA</w:LidThemeAsian>\r\n  <w:LidThemeComplexScript>X-NONE</w:LidThemeComplexScript>\r\n  <w:Compatibility>\r\n   <w:BreakWrappedTables/>\r\n   <w:SnapToGridInCell/>\r\n   <w:WrapTextWithPunct/>\r\n   <w:UseAsianBreakRules/>\r\n   <w:DontGrowAutofit/>\r\n   <w:SplitPgBreakAndParaMark/>\r\n   <w:EnableOpenTypeKerning/>\r\n   <w:DontFlipMirrorIndents/>\r\n   <w:OverrideTableStyleHps/>\r\n   <w:UseFELayout/>\r\n  </w:Compatibility>\r\n  <m:mathPr>\r\n   <m:mathFont m:val=\"Cambria Math\"/>\r\n   <m:brkBin m:val=\"before\"/>\r\n   <m:brkBinSub m:val=\"&#45;-\"/>\r\n   <m:smallFrac m:val=\"off\"/>\r\n   <m:dispDef/>\r\n   <m:lMargin m:val=\"0\"/>\r\n   <m:rMargin m:val=\"0\"/>\r\n   <m:defJc m:val=\"centerGroup\"/>\r\n   <m:wrapIndent m:val=\"1440\"/>\r\n   <m:intLim m:val=\"subSup\"/>\r\n   <m:naryLim m:val=\"undOvr\"/>\r\n  </m:mathPr></w:WordDocument>\r\n</xml><![endif]--><!--[if gte mso 9]><xml>\r\n <w:LatentStyles DefLockedState=\"false\" DefUnhideWhenUsed=\"true\"\r\n  DefSemiHidden=\"true\" DefQFormat=\"false\" DefPriority=\"99\"\r\n  LatentStyleCount=\"276\">\r\n  <w:LsdException Locked=\"false\" Priority=\"0\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Normal\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"heading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"9\" QFormat=\"true\" Name=\"heading 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 7\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 8\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" Name=\"toc 9\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"35\" QFormat=\"true\" Name=\"caption\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"10\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" Name=\"Default Paragraph Font\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"11\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtitle\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"22\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Strong\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"20\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"59\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Table Grid\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Placeholder Text\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"1\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"No Spacing\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" UnhideWhenUsed=\"false\" Name=\"Revision\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"34\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"List Paragraph\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"29\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"30\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Quote\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 1\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 2\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 3\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 4\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 5\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"60\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"61\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"62\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Light Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"63\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"64\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Shading 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"65\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"66\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium List 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"67\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 1 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"68\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 2 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"69\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Medium Grid 3 Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"70\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Dark List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"71\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Shading Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"72\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful List Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"73\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" Name=\"Colorful Grid Accent 6\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"19\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"21\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Emphasis\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"31\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Subtle Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"32\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Intense Reference\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"33\" SemiHidden=\"false\"\r\n   UnhideWhenUsed=\"false\" QFormat=\"true\" Name=\"Book Title\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"37\" Name=\"Bibliography\"/>\r\n  <w:LsdException Locked=\"false\" Priority=\"39\" QFormat=\"true\" Name=\"TOC Heading\"/>\r\n </w:LatentStyles>\r\n</xml><![endif]-->\r\n<style>\r\n<!--\r\n /* Font Definitions */\r\n@font-face\r\n	{font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	panose-1:0 0 0 0 0 0 0 0 0 0;\r\n	mso-font-charset:128;\r\n	mso-generic-font-family:roman;\r\n	mso-font-format:other;\r\n	mso-font-pitch:fixed;\r\n	mso-font-signature:1 134676480 16 0 131072 0;}\r\n@font-face\r\n	{font-family:\"Cambria Math\";\r\n	panose-1:2 4 5 3 5 4 6 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536870145 1107305727 0 0 415 0;}\r\n@font-face\r\n	{font-family:Cambria;\r\n	panose-1:2 4 5 3 5 4 6 3 2 4;\r\n	mso-font-charset:0;\r\n	mso-generic-font-family:auto;\r\n	mso-font-pitch:variable;\r\n	mso-font-signature:-536870145 1073743103 0 0 415 0;}\r\n /* Style Definitions */\r\np.MsoNormal, li.MsoNormal, div.MsoNormal\r\n	{mso-style-unhide:no;\r\n	mso-style-qformat:yes;\r\n	mso-style-parent:\"\";\r\n	margin:0in;\r\n	margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n.MsoChpDefault\r\n	{mso-style-type:export-only;\r\n	mso-default-props:yes;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-fareast-font-family:\"ï¼­ï¼³ æ˜Žæœ\";\r\n	mso-fareast-theme-font:minor-fareast;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;\r\n	mso-bidi-font-family:\"Times New Roman\";\r\n	mso-bidi-theme-font:minor-bidi;}\r\n@page WordSection1\r\n	{size:8.5in 11.0in;\r\n	margin:1.0in 1.25in 1.0in 1.25in;\r\n	mso-header-margin:.5in;\r\n	mso-footer-margin:.5in;\r\n	mso-paper-source:0;}\r\ndiv.WordSection1\r\n	{page:WordSection1;}\r\n-->\r\n</style>\r\n<!--[if gte mso 10]>\r\n<style>\r\n /* Style Definitions */\r\ntable.MsoNormalTable\r\n	{mso-style-name:\"Table Normal\";\r\n	mso-tstyle-rowband-size:0;\r\n	mso-tstyle-colband-size:0;\r\n	mso-style-noshow:yes;\r\n	mso-style-priority:99;\r\n	mso-style-parent:\"\";\r\n	mso-padding-alt:0in 5.4pt 0in 5.4pt;\r\n	mso-para-margin:0in;\r\n	mso-para-margin-bottom:.0001pt;\r\n	mso-pagination:widow-orphan;\r\n	font-size:12.0pt;\r\n	font-family:Cambria;\r\n	mso-ascii-font-family:Cambria;\r\n	mso-ascii-theme-font:minor-latin;\r\n	mso-hansi-font-family:Cambria;\r\n	mso-hansi-theme-font:minor-latin;}\r\n</style>\r\n<![endif]-->\r\n\r\n\r\n\r\n<!--StartFragment--><span style=\"font-size:12.0pt;font-family:Cambria;\r\nmso-ascii-theme-font:minor-latin;mso-fareast-font-family:&quot;ï¼­ï¼³ æ˜Žæœ&quot;;mso-fareast-theme-font:\r\nminor-fareast;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:EN-US;mso-fareast-language:\r\nEN-US;mso-bidi-language:AR-SA\">No, you cannot.</span><!--EndFragment-->'),
(30, 'When referral commissions can withdrawal?', 'Refferal commissions can be withdrawal after deposit maturity.');

-- --------------------------------------------------------

--
-- Table structure for table `forexnews`
--

CREATE TABLE `forexnews` (
  `news_id` int(11) NOT NULL,
  `dt` datetime DEFAULT NULL,
  `news_header` varchar(100) DEFAULT NULL,
  `news_description` text,
  `status` enum('on','off') DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT '0',
  `deposit_id` int(11) DEFAULT NULL,
  `amount` double(30,8) DEFAULT NULL,
  `type` enum('deposit','bonus','penality','earning','withdrawal','commissions','early_deposit_release','early_deposit_charge','release_deposit','add_funds','withdraw_pending','exchange_in','exchange_out','internal_transaction_spend','internal_transaction_receive','intrest_earned','reinvest','internal_message') DEFAULT NULL,
  `description` text,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_thro` int(11) DEFAULT '0',
  `no_withdraw` int(4) DEFAULT '0',
  `reference_number` varchar(200) DEFAULT NULL,
  `transaction_id` text,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) VALUES
(1, 2, 1, 0.30000000, 'commissions', 'Referral commission earned 0.30000000', '2020-09-17 04:00:00', 38, 0, '', 'REF5753019', 1),
(2, 1, 1, 0.12000000, 'commissions', 'Referral commission earned 0.12000000', '2020-09-17 04:00:00', 38, 0, '', 'REF464066', 1),
(3, 2, 2, 0.45000000, 'commissions', 'Referral commission earned 0.45000000', '2020-09-17 04:00:00', 38, 0, '', 'REF6135637', 1),
(4, 1, 2, 0.18000000, 'commissions', 'Referral commission earned 0.18000000', '2020-09-17 04:00:00', 38, 0, '', 'REF3805057', 1),
(5, 92, 1, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-18 deposit id:1', '2020-09-18 04:00:00', 38, 0, '', 'INT8404663', 1),
(6, 92, 2, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-18 deposit id:2', '2020-09-18 04:00:00', 38, 0, '', 'INT1308547', 1),
(7, 93, 3, 0.65000000, 'commissions', 'Referral commission earned 0.65000000', '2020-09-21 04:00:00', 38, 0, '', 'REF5785126', 1),
(8, 1, 3, 0.25000000, 'commissions', 'Referral commission earned 0.25000000', '2020-09-21 04:00:00', 38, 0, '', 'REF1858313', 1),
(9, 92, 1, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-21 deposit id:1', '2020-09-21 04:00:00', 38, 0, '', 'INT4480383', 1),
(10, 92, 2, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-21 deposit id:2', '2020-09-21 04:00:00', 38, 0, '', 'INT2903695', 1),
(11, 92, 1, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-22 deposit id:1', '2020-09-22 04:00:00', 38, 0, '', 'INT7674100', 1),
(12, 92, 2, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-22 deposit id:2', '2020-09-22 04:00:00', 38, 0, '', 'INT9958571', 1),
(13, 94, 3, 0.04000000, 'intrest_earned', 'Interest Earned on 2020-09-22 deposit id:3', '2020-09-22 04:00:00', 38, 0, '', 'INT1061847', 1),
(14, 1, 8, 0.30000000, 'commissions', 'Referral commission earned 0.30000000', '2020-09-22 04:00:00', 38, 0, '', 'REF8360401', 1),
(15, 1, 4, 0.30000000, 'commissions', 'Referral commission earned 0.30000000', '2020-09-22 04:00:00', 38, 0, '', 'REF7553138', 1),
(16, 1, 5, 0.21000000, 'commissions', 'Referral commission earned 0.21000000', '2020-09-22 04:00:00', 38, 0, '', 'REF5991851', 1),
(17, 1, 7, 0.14000000, 'commissions', 'Referral commission earned 0.14000000', '2020-09-22 04:00:00', 38, 0, '', 'REF6460829', 1),
(18, 93, 4, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-22 deposit id:4', '2020-09-22 04:00:00', 38, 0, '', 'INT2911524', 1),
(19, 2, 5, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-22 deposit id:5', '2020-09-22 04:00:00', 38, 0, '', 'INT5397033', 1),
(20, 2, 7, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-22 deposit id:7', '2020-09-22 04:00:00', 38, 0, '', 'INT6282231', 1),
(21, 2, 8, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-22 deposit id:8', '2020-09-22 04:00:00', 38, 0, '', 'INT2301435', 1),
(22, 92, 1, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-23 deposit id:1', '2020-09-23 04:00:00', 38, 0, '', 'INT5238160', 1),
(23, 92, 2, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-23 deposit id:2', '2020-09-23 04:00:00', 38, 0, '', 'INT165776', 1),
(24, 94, 3, 0.04000000, 'intrest_earned', 'Interest Earned on 2020-09-23 deposit id:3', '2020-09-23 04:00:00', 38, 0, '', 'INT7338107', 1),
(25, 93, 4, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-23 deposit id:4', '2020-09-23 04:00:00', 38, 0, '', 'INT9780214', 1),
(26, 2, 5, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-23 deposit id:5', '2020-09-23 04:00:00', 38, 0, '', 'INT5202587', 1),
(27, 2, 7, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-23 deposit id:7', '2020-09-23 04:00:00', 38, 0, '', 'INT5570604', 1),
(28, 2, 8, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-23 deposit id:8', '2020-09-23 04:00:00', 38, 0, '', 'INT8598922', 1),
(29, 92, 1, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:1', '2020-09-24 04:00:00', 38, 0, '', 'INT7907172', 1),
(30, 92, 2, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:2', '2020-09-24 04:00:00', 38, 0, '', 'INT3538626', 1),
(31, 94, 3, 0.04000000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:3', '2020-09-24 04:00:00', 38, 0, '', 'INT5909030', 1),
(32, 93, 4, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:4', '2020-09-24 04:00:00', 38, 0, '', 'INT5037243', 1),
(33, 2, 5, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:5', '2020-09-24 04:00:00', 38, 0, '', 'INT2852167', 1),
(34, 2, 7, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:7', '2020-09-24 04:00:00', 38, 0, '', 'INT6156250', 1),
(35, 2, 8, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:8', '2020-09-24 04:00:00', 38, 0, '', 'INT9004545', 1),
(36, 92, 9, 4.55000000, 'commissions', 'Referral commission earned 4.55000000', '2020-09-24 04:00:00', 38, 0, '', 'REF9521509', 1),
(37, 2, 9, 1.75000000, 'commissions', 'Referral commission earned 1.75000000', '2020-09-24 04:00:00', 38, 0, '', 'REF5485700', 1),
(38, 1, 9, 1.40000000, 'commissions', 'Referral commission earned 1.40000000', '2020-09-24 04:00:00', 38, 0, '', 'REF450964', 1),
(39, 1, 6, 0.14000000, 'commissions', 'Referral commission earned 0.14000000', '2020-09-24 04:00:00', 38, 0, '', 'REF4542666', 1),
(40, 2, 10, 7.50000000, 'commissions', 'Referral commission earned 7.50000000', '2020-09-24 04:00:00', 38, 0, '', 'REF5861750', 1),
(41, 1, 10, 3.00000000, 'commissions', 'Referral commission earned 3.00000000', '2020-09-24 04:00:00', 38, 0, '', 'REF6851480', 1),
(42, 2, 11, 0.00900000, 'commissions', 'Referral commission earned 0.00900000', '2020-09-24 04:00:00', 38, 0, '', 'REF309777', 1),
(43, 1, 11, 0.00450000, 'commissions', 'Referral commission earned 0.00450000', '2020-09-24 04:00:00', 38, 0, '', 'REF3348423', 1),
(44, 2, 6, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:6', '2020-09-24 04:00:00', 38, 0, '', 'INT5885696', 1),
(45, 96, 9, 0.45500000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:9', '2020-09-24 04:00:00', 38, 0, '', 'INT7313246', 1),
(46, 92, 10, 0.75000000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:10', '2020-09-24 04:00:00', 38, 0, '', 'INT7657483', 1),
(47, 92, 11, 0.00009000, 'intrest_earned', 'Interest Earned on 2020-09-24 deposit id:11', '2020-09-24 04:00:00', 38, 0, '', 'INT3667982', 1),
(48, 92, 1, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:1', '2020-09-25 04:00:00', 38, 0, '', 'INT9723849', 1),
(49, 92, 2, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:2', '2020-09-25 04:00:00', 38, 0, '', 'INT7181468', 1),
(50, 94, 3, 0.04000000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:3', '2020-09-25 04:00:00', 38, 0, '', 'INT6983664', 1),
(51, 93, 4, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:4', '2020-09-25 04:00:00', 38, 0, '', 'INT7076750', 1),
(52, 2, 5, 0.01500000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:5', '2020-09-25 04:00:00', 38, 0, '', 'INT9975064', 1),
(53, 2, 6, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:6', '2020-09-25 04:00:00', 38, 0, '', 'INT7322386', 1),
(54, 2, 7, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:7', '2020-09-25 04:00:00', 38, 0, '', 'INT4648032', 1),
(55, 2, 8, 0.01000000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:8', '2020-09-25 04:00:00', 38, 0, '', 'INT8705888', 1),
(56, 96, 9, 0.45500000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:9', '2020-09-25 04:00:00', 38, 0, '', 'INT3694494', 1),
(57, 92, 10, 0.75000000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:10', '2020-09-25 04:00:00', 38, 0, '', 'INT3209935', 1),
(58, 92, 11, 0.00009000, 'intrest_earned', 'Interest Earned on 2020-09-25 deposit id:11', '2020-09-25 04:00:00', 38, 0, '', 'INT3726020', 1),
(59, 92, 11, 0.00009000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:11', '2020-09-26 04:00:00', 38, 0, '', 'INT3862022', NULL),
(60, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:1', '2020-09-26 04:00:00', 38, 0, '', 'INT4793711', 1),
(61, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:2', '2020-09-26 04:00:00', 38, 0, '', 'INT7198583', 1),
(62, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:3', '2020-09-26 04:00:00', 38, 0, '', 'INT3961384', 1),
(63, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:4', '2020-09-26 04:00:00', 38, 0, '', 'INT1636495', 1),
(64, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:5', '2020-09-26 04:00:00', 38, 0, '', 'INT2737460', 1),
(65, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:6', '2020-09-26 04:00:00', 38, 0, '', 'INT900236', 1),
(66, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:7', '2020-09-26 04:00:00', 38, 0, '', 'INT6747628', 1),
(67, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:8', '2020-09-26 04:00:00', 38, 0, '', 'INT783252', 1),
(68, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:9', '2020-09-26 04:00:00', 38, 0, '', 'INT861356', 1),
(69, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-09-26 deposit id:10', '2020-09-26 04:00:00', 38, 0, '', 'INT468857', 1),
(70, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:1', '2020-09-27 04:00:00', 38, 0, '', 'INT3141837', 1),
(71, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:2', '2020-09-27 04:00:00', 38, 0, '', 'INT9082630', 1),
(72, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:3', '2020-09-27 04:00:00', 38, 0, '', 'INT4883078', 1),
(73, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:4', '2020-09-27 04:00:00', 38, 0, '', 'INT1288507', 1),
(74, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:5', '2020-09-27 04:00:00', 38, 0, '', 'INT9423050', 1),
(75, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:6', '2020-09-27 04:00:00', 38, 0, '', 'INT7160700', 1),
(76, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:7', '2020-09-27 04:00:00', 38, 0, '', 'INT7579094', 1),
(77, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:8', '2020-09-27 04:00:00', 38, 0, '', 'INT1832915', 1),
(78, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:9', '2020-09-27 04:00:00', 38, 0, '', 'INT2804238', 1),
(79, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-09-27 deposit id:10', '2020-09-27 04:00:00', 38, 0, '', 'INT3993108', 1),
(80, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:1', '2020-09-28 04:00:00', 38, 0, '', 'INT1297511', 1),
(81, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:2', '2020-09-28 04:00:00', 38, 0, '', 'INT2778850', 1),
(82, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:3', '2020-09-28 04:00:00', 38, 0, '', 'INT2999668', 1),
(83, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:4', '2020-09-28 04:00:00', 38, 0, '', 'INT5459530', 1),
(84, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:5', '2020-09-28 04:00:00', 38, 0, '', 'INT6410748', 1),
(85, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:6', '2020-09-28 04:00:00', 38, 0, '', 'INT5200756', 1),
(86, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:7', '2020-09-28 04:00:00', 38, 0, '', 'INT8125485', 1),
(87, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:8', '2020-09-28 04:00:00', 38, 0, '', 'INT2413553', 1),
(88, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:9', '2020-09-28 04:00:00', 38, 0, '', 'INT5364707', 1),
(89, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-09-28 deposit id:10', '2020-09-28 04:00:00', 38, 0, '', 'INT5927810', 1),
(90, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:1', '2020-09-29 04:00:00', 38, 0, '', 'INT4238607', 1),
(91, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:2', '2020-09-29 04:00:00', 38, 0, '', 'INT4813049', 1),
(92, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:3', '2020-09-29 04:00:00', 38, 0, '', 'INT1085791', 1),
(93, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:4', '2020-09-29 04:00:00', 38, 0, '', 'INT8519525', 1),
(94, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:5', '2020-09-29 04:00:00', 38, 0, '', 'INT6116241', 1),
(95, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:6', '2020-09-29 04:00:00', 38, 0, '', 'INT5669778', 1),
(96, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:7', '2020-09-29 04:00:00', 38, 0, '', 'INT617767', 1),
(97, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:8', '2020-09-29 04:00:00', 38, 0, '', 'INT880845', 1),
(98, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:9', '2020-09-29 04:00:00', 38, 0, '', 'INT9324201', 1),
(99, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:10', '2020-09-29 04:00:00', 38, 0, '', 'INT7781978', 1),
(100, 2, 12, 0.49500000, 'commissions', 'Referral commission earned 0.49500000', '2020-09-29 04:00:00', 38, 0, '', 'REF9858000', 1),
(101, 1, 12, 0.16500000, 'commissions', 'Referral commission earned 0.16500000', '2020-09-29 04:00:00', 38, 0, '', 'REF3546878', 1),
(102, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-09-29 deposit id:12', '2020-09-29 04:00:00', 38, 0, '', 'INT6068440', 1),
(103, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:1', '2020-09-30 04:00:00', 38, 0, '', 'INT5886604', 1),
(104, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:2', '2020-09-30 04:00:00', 38, 0, '', 'INT7700003', 1),
(105, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:3', '2020-09-30 04:00:00', 38, 0, '', 'INT3595883', 1),
(106, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:4', '2020-09-30 04:00:00', 38, 0, '', 'INT1004335', 1),
(107, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:5', '2020-09-30 04:00:00', 38, 0, '', 'INT2941069', 1),
(108, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:6', '2020-09-30 04:00:00', 38, 0, '', 'INT1558386', 1),
(109, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:7', '2020-09-30 04:00:00', 38, 0, '', 'INT877105', 1),
(110, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:8', '2020-09-30 04:00:00', 38, 0, '', 'INT465991', 1),
(111, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:9', '2020-09-30 04:00:00', 38, 0, '', 'INT1029219', 1),
(112, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:10', '2020-09-30 04:00:00', 38, 0, '', 'INT3734479', 1),
(113, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-09-30 deposit id:12', '2020-09-30 04:00:00', 38, 0, '', 'INT5662323', 1),
(114, 2, 13, 0.14000000, 'commissions', 'Referral commission earned 0.14000000', '2020-10-02 04:00:00', 38, 0, '', 'REF5128078', 1),
(115, 1, 13, 0.02000000, 'commissions', 'Referral commission earned 0.02000000', '2020-10-02 04:00:00', 38, 0, '', 'REF6046988', 1),
(116, 92, NULL, 0.01027000, 'withdrawal', 'Withdraw Request for 0.01027000 by ', '2020-10-02 08:36:52', 38, 1, NULL, 'WIT6842033', NULL),
(118, 1, 19, 0.45000000, 'commissions', 'Referral commission earned 0.45000000', '2020-10-02 04:00:00', 38, 0, '', 'REF9750753', 1),
(119, 2, 16, 0.45000000, 'commissions', 'Referral commission earned 0.45000000', '2020-10-02 04:00:00', 38, 0, '', 'REF3120709', 1),
(120, 1, 16, 0.15000000, 'commissions', 'Referral commission earned 0.15000000', '2020-10-02 04:00:00', 38, 0, '', 'REF8488549', 1),
(121, 2, 17, 0.14000000, 'commissions', 'Referral commission earned 0.14000000', '2020-10-02 04:00:00', 38, 0, '', 'REF330282', 1),
(122, 1, 17, 0.02000000, 'commissions', 'Referral commission earned 0.02000000', '2020-10-02 04:00:00', 38, 0, '', 'REF896054', 1),
(123, 2, 20, 5.85000000, 'commissions', 'Referral commission earned 5.85000000', '2020-10-02 04:00:00', 38, 0, '', 'REF7991952', 1),
(124, 1, 20, 2.34000000, 'commissions', 'Referral commission earned 2.34000000', '2020-10-02 04:00:00', 38, 0, '', 'REF8699051', 1),
(125, 2, 21, 5.85000000, 'commissions', 'Referral commission earned 5.85000000', '2020-10-02 04:00:00', 38, 0, '', 'REF1652890', 1),
(126, 1, 21, 2.34000000, 'commissions', 'Referral commission earned 2.34000000', '2020-10-02 04:00:00', 38, 0, '', 'REF7709516', 1),
(127, 93, 25, 0.07000000, 'commissions', 'Referral commission earned 0.07000000', '2020-10-02 04:00:00', 38, 0, '', 'REF6250352', 1),
(128, 1, 25, 0.01000000, 'commissions', 'Referral commission earned 0.01000000', '2020-10-02 04:00:00', 38, 0, '', 'REF7468340', 1),
(129, 2, 22, 0.54000000, 'commissions', 'Referral commission earned 0.54000000', '2020-10-02 04:00:00', 38, 0, '', 'REF1350139', 1),
(130, 1, 22, 0.18000000, 'commissions', 'Referral commission earned 0.18000000', '2020-10-02 04:00:00', 38, 0, '', 'REF611073', 1),
(131, 2, 23, 0.54000000, 'commissions', 'Referral commission earned 0.54000000', '2020-10-02 04:00:00', 38, 0, '', 'REF3182845', 1),
(132, 1, 23, 0.18000000, 'commissions', 'Referral commission earned 0.18000000', '2020-10-02 04:00:00', 38, 0, '', 'REF5534784', 1),
(135, 2, 24, 0.54000000, 'commissions', 'Referral commission earned 0.54000000', '2020-10-02 04:00:00', 38, 0, '', 'REF6050298', 1),
(136, 1, 24, 0.18000000, 'commissions', 'Referral commission earned 0.18000000', '2020-10-02 04:00:00', 38, 0, '', 'REF9282359', 1),
(137, 2, 33, 2.34000000, 'commissions', 'Referral commission earned 2.34000000', '2020-10-02 04:00:00', 38, 0, '', 'REF9759017', 1),
(138, 1, 33, 0.90000000, 'commissions', 'Referral commission earned 0.90000000', '2020-10-02 04:00:00', 38, 0, '', 'REF6038790', 1),
(139, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:1', '2020-10-02 04:00:00', 38, 0, '', 'INT4362615', 1),
(140, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:2', '2020-10-02 04:00:00', 38, 0, '', 'INT8951409', 1),
(141, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:3', '2020-10-02 04:00:00', 38, 0, '', 'INT6166763', 1),
(142, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:4', '2020-10-02 04:00:00', 38, 0, '', 'INT8701546', 1),
(143, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:5', '2020-10-02 04:00:00', 38, 0, '', 'INT6683994', 1),
(144, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:6', '2020-10-02 04:00:00', 38, 0, '', 'INT9976834', 1),
(145, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:7', '2020-10-02 04:00:00', 38, 0, '', 'INT4846530', 1),
(146, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:8', '2020-10-02 04:00:00', 38, 0, '', 'INT3138427', 1),
(147, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:9', '2020-10-02 04:00:00', 38, 0, '', 'INT367735', 1),
(148, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:10', '2020-10-02 04:00:00', 38, 0, '', 'INT8184944', 1),
(149, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-02 deposit id:12', '2020-10-02 04:00:00', 38, 0, '', 'INT9209135', 1),
(150, 92, 34, 0.17500000, 'commissions', 'Referral commission earned 0.17500000', '2020-10-03 04:00:00', 38, 0, '', 'REF6160532', 1),
(151, 2, 34, 0.02500000, 'commissions', 'Referral commission earned 0.02500000', '2020-10-03 04:00:00', 38, 0, '', 'REF8531576', 1),
(152, 1, 34, 0.02500000, 'commissions', 'Referral commission earned 0.02500000', '2020-10-03 04:00:00', 38, 0, '', 'REF9369686', 1),
(153, 2, 26, 0.54000000, 'commissions', 'Referral commission earned 0.54000000', '2020-10-03 04:00:00', 38, 0, '', 'REF1916670', 1),
(154, 1, 26, 0.18000000, 'commissions', 'Referral commission earned 0.18000000', '2020-10-03 04:00:00', 38, 0, '', 'REF7519007', 1),
(155, 2, 32, 0.45000000, 'commissions', 'Referral commission earned 0.45000000', '2020-10-03 04:00:00', 38, 0, '', 'REF9306830', 1),
(156, 1, 32, 0.15000000, 'commissions', 'Referral commission earned 0.15000000', '2020-10-03 04:00:00', 38, 0, '', 'REF2458691', 1),
(157, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:1', '2020-10-04 04:00:00', 38, 0, '', 'INT1345224', 1),
(158, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:2', '2020-10-04 04:00:00', 38, 0, '', 'INT9328986', 1),
(159, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:3', '2020-10-04 04:00:00', 38, 0, '', 'INT3425094', 1),
(160, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:4', '2020-10-04 04:00:00', 38, 0, '', 'INT1170344', 1),
(161, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:5', '2020-10-04 04:00:00', 38, 0, '', 'INT7950711', 1),
(162, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:6', '2020-10-04 04:00:00', 38, 0, '', 'INT8091823', 1),
(163, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:7', '2020-10-04 04:00:00', 38, 0, '', 'INT6628521', 1),
(164, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:8', '2020-10-04 04:00:00', 38, 0, '', 'INT7016147', 1),
(165, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:9', '2020-10-04 04:00:00', 38, 0, '', 'INT3826851', 1),
(166, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:10', '2020-10-04 04:00:00', 38, 0, '', 'INT1063604', 1),
(167, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:12', '2020-10-04 04:00:00', 38, 0, '', 'INT9085439', 1),
(168, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:13', '2020-10-04 04:00:00', 38, 0, '', 'INT9133231', 1),
(169, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:16', '2020-10-04 04:00:00', 38, 0, '', 'INT8867544', 1),
(170, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:17', '2020-10-04 04:00:00', 38, 0, '', 'INT6547549', 1),
(171, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:19', '2020-10-04 04:00:00', 38, 0, '', 'INT6078498', 1),
(172, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:20', '2020-10-04 04:00:00', 38, 0, '', 'INT5154117', 1),
(173, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:21', '2020-10-04 04:00:00', 38, 0, '', 'INT1235642', 1),
(174, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:22', '2020-10-04 04:00:00', 38, 0, '', 'INT5309947', 1),
(175, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:23', '2020-10-04 04:00:00', 38, 0, '', 'INT4364448', 1),
(176, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:24', '2020-10-04 04:00:00', 38, 0, '', 'INT1231328', 1),
(177, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:25', '2020-10-04 04:00:00', 38, 0, '', 'INT8192516', 1),
(178, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:26', '2020-10-04 04:00:00', 38, 0, '', 'INT8902342', 1),
(179, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:32', '2020-10-04 04:00:00', 38, 0, '', 'INT425437', 1),
(180, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:33', '2020-10-04 04:00:00', 38, 0, '', 'INT5506732', 1),
(181, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-04 deposit id:34', '2020-10-04 04:00:00', 38, 0, '', 'INT7283990', 1),
(182, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:1', '2020-10-05 04:00:00', 38, 0, '', 'INT6948781', 1),
(183, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:2', '2020-10-05 04:00:00', 38, 0, '', 'INT8278563', 1),
(184, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:3', '2020-10-05 04:00:00', 38, 0, '', 'INT6028433', 1),
(185, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:4', '2020-10-05 04:00:00', 38, 0, '', 'INT7369909', 1),
(186, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:5', '2020-10-05 04:00:00', 38, 0, '', 'INT6420611', 1),
(187, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:6', '2020-10-05 04:00:00', 38, 0, '', 'INT1712949', 1),
(188, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:7', '2020-10-05 04:00:00', 38, 0, '', 'INT2150773', 1),
(189, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:8', '2020-10-05 04:00:00', 38, 0, '', 'INT1390491', 1),
(190, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:9', '2020-10-05 04:00:00', 38, 0, '', 'INT1539878', 1),
(191, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:10', '2020-10-05 04:00:00', 38, 0, '', 'INT1347274', 1),
(192, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:12', '2020-10-05 04:00:00', 38, 0, '', 'INT5630643', 1),
(193, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:13', '2020-10-05 04:00:00', 38, 0, '', 'INT4309621', 1),
(194, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:16', '2020-10-05 04:00:00', 38, 0, '', 'INT4057115', 1),
(195, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:17', '2020-10-05 04:00:00', 38, 0, '', 'INT203423', 1),
(196, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:19', '2020-10-05 04:00:00', 38, 0, '', 'INT9910668', 1),
(197, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:20', '2020-10-05 04:00:00', 38, 0, '', 'INT3678473', 1),
(198, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:21', '2020-10-05 04:00:00', 38, 0, '', 'INT8936757', 1),
(199, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:22', '2020-10-05 04:00:00', 38, 0, '', 'INT7341421', 1),
(200, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:23', '2020-10-05 04:00:00', 38, 0, '', 'INT571379', 1),
(201, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:24', '2020-10-05 04:00:00', 38, 0, '', 'INT4574111', 1),
(202, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:25', '2020-10-05 04:00:00', 38, 0, '', 'INT7160360', 1),
(203, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:26', '2020-10-05 04:00:00', 38, 0, '', 'INT7516440', 1),
(204, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:32', '2020-10-05 04:00:00', 38, 0, '', 'INT4325002', 1),
(205, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:33', '2020-10-05 04:00:00', 38, 0, '', 'INT8985350', 1),
(206, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-05 deposit id:34', '2020-10-05 04:00:00', 38, 0, '', 'INT8775694', 1),
(207, 97, 35, 0.46821600, 'commissions', 'Referral commission earned 0.46821600', '2020-10-05 04:00:00', 38, 0, '', 'REF6134728', 1),
(208, 2, 35, 0.15607200, 'commissions', 'Referral commission earned 0.15607200', '2020-10-05 04:00:00', 38, 0, '', 'REF6621456', 1),
(209, 1, 35, 0.10404800, 'commissions', 'Referral commission earned 0.10404800', '2020-10-05 04:00:00', 38, 0, '', 'REF6961009', 1),
(210, 1, 36, 1.10000000, 'commissions', 'Referral commission earned 1.10000000', '2020-10-05 04:00:00', 38, 0, '', 'REF5254106', 1),
(211, 92, 37, 22.50000000, 'commissions', 'Referral commission earned 22.50000000', '2020-10-05 04:00:00', 38, 0, '', 'REF2918699', 1),
(212, 2, 37, 9.00000000, 'commissions', 'Referral commission earned 9.00000000', '2020-10-05 04:00:00', 38, 0, '', 'REF55875', 1),
(213, 1, 37, 7.50000000, 'commissions', 'Referral commission earned 7.50000000', '2020-10-05 04:00:00', 38, 0, '', 'REF7933344', 1),
(214, 1, 31, 0.14000000, 'commissions', 'Referral commission earned 0.14000000', '2020-10-05 04:00:00', 38, 0, '', 'REF3938695', 1),
(216, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:1', '2020-10-06 04:00:00', 38, 0, '', 'INT1253775', 1),
(217, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:2', '2020-10-06 04:00:00', 38, 0, '', 'INT1113605', 1),
(218, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:3', '2020-10-06 04:00:00', 38, 0, '', 'INT2094891', 1),
(219, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:4', '2020-10-06 04:00:00', 38, 0, '', 'INT105306', 1),
(220, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:5', '2020-10-06 04:00:00', 38, 0, '', 'INT5791524', 1),
(221, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:6', '2020-10-06 04:00:00', 38, 0, '', 'INT4887', 1),
(222, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:7', '2020-10-06 04:00:00', 38, 0, '', 'INT18706', 1),
(223, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:8', '2020-10-06 04:00:00', 38, 0, '', 'INT4864870', 1),
(224, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:9', '2020-10-06 04:00:00', 38, 0, '', 'INT7338780', 1),
(225, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:10', '2020-10-06 04:00:00', 38, 0, '', 'INT4013036', 1),
(226, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:12', '2020-10-06 04:00:00', 38, 0, '', 'INT4176933', 1),
(227, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:13', '2020-10-06 04:00:00', 38, 0, '', 'INT2488370', 1),
(228, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:16', '2020-10-06 04:00:00', 38, 0, '', 'INT9475797', 1),
(229, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:17', '2020-10-06 04:00:00', 38, 0, '', 'INT6511139', 1),
(230, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:19', '2020-10-06 04:00:00', 38, 0, '', 'INT3255390', 1),
(231, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:20', '2020-10-06 04:00:00', 38, 0, '', 'INT2265415', 1),
(232, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:21', '2020-10-06 04:00:00', 38, 0, '', 'INT6598465', 1),
(233, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:22', '2020-10-06 04:00:00', 38, 0, '', 'INT4682873', 1),
(234, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:23', '2020-10-06 04:00:00', 38, 0, '', 'INT9838776', 1),
(235, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:24', '2020-10-06 04:00:00', 38, 0, '', 'INT46827', 1),
(236, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:25', '2020-10-06 04:00:00', 38, 0, '', 'INT7328969', 1),
(237, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:26', '2020-10-06 04:00:00', 38, 0, '', 'INT4418650', 1),
(238, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:31', '2020-10-06 04:00:00', 38, 0, '', 'INT9999124', 1),
(239, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:32', '2020-10-06 04:00:00', 38, 0, '', 'INT3614427', 1),
(240, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:33', '2020-10-06 04:00:00', 38, 0, '', 'INT706088', 1),
(241, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:34', '2020-10-06 04:00:00', 38, 0, '', 'INT8651020', 1),
(242, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:35', '2020-10-06 04:00:00', 38, 0, '', 'INT8581980', 1),
(243, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:36', '2020-10-06 04:00:00', 38, 0, '', 'INT3529837', 1),
(244, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-06 deposit id:37', '2020-10-06 04:00:00', 38, 0, '', 'INT5698596', 1),
(245, 97, 39, 0.14398300, 'commissions', 'Referral commission earned 0.14398300', '2020-10-06 04:00:00', 38, 0, '', 'REF844842', 1),
(246, 2, 39, 0.02056900, 'commissions', 'Referral commission earned 0.02056900', '2020-10-06 04:00:00', 38, 0, '', 'REF9913334', 1),
(247, 1, 39, 0.02056900, 'commissions', 'Referral commission earned 0.02056900', '2020-10-06 04:00:00', 38, 0, '', 'REF5371467', 1),
(253, 92, NULL, 0.08000000, 'withdraw_pending', 'Withdraw Request for .08 by ', '2020-10-06 15:57:53', 38, 1, NULL, 'WIT1683776', NULL),
(254, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:1', '2020-10-07 04:00:00', 38, 0, '', 'INT4087999', 1),
(255, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:2', '2020-10-07 04:00:00', 38, 0, '', 'INT7603629', 1),
(256, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:3', '2020-10-07 04:00:00', 38, 0, '', 'INT4328745', 1),
(257, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:4', '2020-10-07 04:00:00', 38, 0, '', 'INT3572764', 1),
(258, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:5', '2020-10-07 04:00:00', 38, 0, '', 'INT5235960', 1),
(259, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:6', '2020-10-07 04:00:00', 38, 0, '', 'INT8237584', 1),
(260, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:7', '2020-10-07 04:00:00', 38, 0, '', 'INT6976940', 1),
(261, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:8', '2020-10-07 04:00:00', 38, 0, '', 'INT6198970', 1),
(262, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:9', '2020-10-07 04:00:00', 38, 0, '', 'INT4731605', 1),
(263, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:10', '2020-10-07 04:00:00', 38, 0, '', 'INT8665605', 1),
(264, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:12', '2020-10-07 04:00:00', 38, 0, '', 'INT5373148', 1),
(265, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:13', '2020-10-07 04:00:00', 38, 0, '', 'INT5144088', 1),
(266, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:16', '2020-10-07 04:00:00', 38, 0, '', 'INT9981898', 1),
(267, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:17', '2020-10-07 04:00:00', 38, 0, '', 'INT2268727', 1),
(268, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:19', '2020-10-07 04:00:00', 38, 0, '', 'INT364285', 1),
(269, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:20', '2020-10-07 04:00:00', 38, 0, '', 'INT5694658', 1),
(270, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:21', '2020-10-07 04:00:00', 38, 0, '', 'INT9584492', 1),
(271, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:22', '2020-10-07 04:00:00', 38, 0, '', 'INT9413498', 1),
(272, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:23', '2020-10-07 04:00:00', 38, 0, '', 'INT7400660', 1),
(273, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:24', '2020-10-07 04:00:00', 38, 0, '', 'INT7285248', 1),
(274, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:25', '2020-10-07 04:00:00', 38, 0, '', 'INT4284663', 1),
(275, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:26', '2020-10-07 04:00:00', 38, 0, '', 'INT4722795', 1),
(276, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:31', '2020-10-07 04:00:00', 38, 0, '', 'INT8750130', 1),
(277, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:32', '2020-10-07 04:00:00', 38, 0, '', 'INT6112186', 1),
(278, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:33', '2020-10-07 04:00:00', 38, 0, '', 'INT2591745', 1),
(279, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:34', '2020-10-07 04:00:00', 38, 0, '', 'INT885873', 1),
(280, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:35', '2020-10-07 04:00:00', 38, 0, '', 'INT3725166', 1),
(281, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:36', '2020-10-07 04:00:00', 38, 0, '', 'INT1232447', 1),
(282, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:37', '2020-10-07 04:00:00', 38, 0, '', 'INT2863321', 1),
(283, 106, 39, 0.01439830, 'intrest_earned', 'Interest Earned on 2020-10-07 deposit id:39', '2020-10-07 04:00:00', 38, 0, '', 'INT3321906', 1),
(284, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:1', '2020-10-08 04:00:00', 38, 0, '', 'INT275037', 1),
(285, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:2', '2020-10-08 04:00:00', 38, 0, '', 'INT2803277', 1),
(286, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:3', '2020-10-08 04:00:00', 38, 0, '', 'INT5589355', 1),
(287, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:4', '2020-10-08 04:00:00', 38, 0, '', 'INT3799164', 1),
(288, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:5', '2020-10-08 04:00:00', 38, 0, '', 'INT410116', 1),
(289, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:6', '2020-10-08 04:00:00', 38, 0, '', 'INT8745599', 1),
(290, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:7', '2020-10-08 04:00:00', 38, 0, '', 'INT1860590', 1),
(291, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:8', '2020-10-08 04:00:00', 38, 0, '', 'INT5132695', 1),
(292, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:9', '2020-10-08 04:00:00', 38, 0, '', 'INT1122887', 1),
(293, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:10', '2020-10-08 04:00:00', 38, 0, '', 'INT9888503', 1),
(294, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:12', '2020-10-08 04:00:00', 38, 0, '', 'INT3701350', 1),
(295, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:13', '2020-10-08 04:00:00', 38, 0, '', 'INT329428', 1),
(296, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:16', '2020-10-08 04:00:00', 38, 0, '', 'INT4339350', 1),
(297, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:17', '2020-10-08 04:00:00', 38, 0, '', 'INT228060', 1),
(298, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:19', '2020-10-08 04:00:00', 38, 0, '', 'INT9263706', 1),
(299, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:20', '2020-10-08 04:00:00', 38, 0, '', 'INT5350145', 1),
(300, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:21', '2020-10-08 04:00:00', 38, 0, '', 'INT7793784', 1),
(301, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:22', '2020-10-08 04:00:00', 38, 0, '', 'INT4945866', 1),
(302, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:23', '2020-10-08 04:00:00', 38, 0, '', 'INT5622545', 1),
(303, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:24', '2020-10-08 04:00:00', 38, 0, '', 'INT3068235', 1),
(304, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:25', '2020-10-08 04:00:00', 38, 0, '', 'INT9055887', 1),
(305, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:26', '2020-10-08 04:00:00', 38, 0, '', 'INT2955789', 1),
(306, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:31', '2020-10-08 04:00:00', 38, 0, '', 'INT3295894', 1),
(307, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:32', '2020-10-08 04:00:00', 38, 0, '', 'INT6505163', 1),
(308, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:33', '2020-10-08 04:00:00', 38, 0, '', 'INT7344608', 1),
(309, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:34', '2020-10-08 04:00:00', 38, 0, '', 'INT8640133', 1),
(310, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:35', '2020-10-08 04:00:00', 38, 0, '', 'INT150876', 1),
(311, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:36', '2020-10-08 04:00:00', 38, 0, '', 'INT4078639', 1),
(312, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:37', '2020-10-08 04:00:00', 38, 0, '', 'INT8896251', 1),
(313, 106, 39, 0.01439830, 'intrest_earned', 'Interest Earned on 2020-10-08 deposit id:39', '2020-10-08 04:00:00', 38, 0, '', 'INT4326103', 1),
(314, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:1', '2020-10-09 04:00:00', 38, 0, '', 'INT5422733', 1),
(315, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:2', '2020-10-09 04:00:00', 38, 0, '', 'INT5906369', 1),
(316, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:3', '2020-10-09 04:00:00', 38, 0, '', 'INT3316211', 1),
(317, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:4', '2020-10-09 04:00:00', 38, 0, '', 'INT1047631', 1),
(318, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:5', '2020-10-09 04:00:00', 38, 0, '', 'INT1451140', 1),
(319, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:6', '2020-10-09 04:00:00', 38, 0, '', 'INT5099846', 1),
(320, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:7', '2020-10-09 04:00:00', 38, 0, '', 'INT6485368', 1),
(321, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:8', '2020-10-09 04:00:00', 38, 0, '', 'INT5040789', 1),
(322, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:9', '2020-10-09 04:00:00', 38, 0, '', 'INT6025960', 1),
(323, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:10', '2020-10-09 04:00:00', 38, 0, '', 'INT437320', 1),
(324, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:12', '2020-10-09 04:00:00', 38, 0, '', 'INT6329775', 1),
(325, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:13', '2020-10-09 04:00:00', 38, 0, '', 'INT6870231', 1),
(326, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:16', '2020-10-09 04:00:00', 38, 0, '', 'INT8476011', 1),
(327, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:17', '2020-10-09 04:00:00', 38, 0, '', 'INT4756116', 1),
(328, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:19', '2020-10-09 04:00:00', 38, 0, '', 'INT4020688', 1),
(329, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:20', '2020-10-09 04:00:00', 38, 0, '', 'INT918802', 1),
(330, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:21', '2020-10-09 04:00:00', 38, 0, '', 'INT7786143', 1),
(331, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:22', '2020-10-09 04:00:00', 38, 0, '', 'INT2832281', 1),
(332, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:23', '2020-10-09 04:00:00', 38, 0, '', 'INT6351423', 1),
(333, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:24', '2020-10-09 04:00:00', 38, 0, '', 'INT1374757', 1),
(334, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:25', '2020-10-09 04:00:00', 38, 0, '', 'INT1249085', 1),
(335, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:26', '2020-10-09 04:00:00', 38, 0, '', 'INT2606512', 1),
(336, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:31', '2020-10-09 04:00:00', 38, 0, '', 'INT4835135', 1),
(337, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:32', '2020-10-09 04:00:00', 38, 0, '', 'INT6756659', 1),
(338, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:33', '2020-10-09 04:00:00', 38, 0, '', 'INT232505', 1),
(339, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:34', '2020-10-09 04:00:00', 38, 0, '', 'INT8790208', 1),
(340, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:35', '2020-10-09 04:00:00', 38, 0, '', 'INT1922632', 1),
(341, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:36', '2020-10-09 04:00:00', 38, 0, '', 'INT6962263', 1),
(342, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:37', '2020-10-09 04:00:00', 38, 0, '', 'INT7143359', 1),
(343, 106, 39, 0.01439830, 'intrest_earned', 'Interest Earned on 2020-10-09 deposit id:39', '2020-10-09 04:00:00', 38, 0, '', 'INT1512802', 1),
(344, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:1', '2020-10-10 04:00:00', 38, 0, '', 'INT2481201', 1),
(345, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:2', '2020-10-10 04:00:00', 38, 0, '', 'INT5232521', 1),
(346, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:3', '2020-10-10 04:00:00', 38, 0, '', 'INT8019762', 1),
(347, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:4', '2020-10-10 04:00:00', 38, 0, '', 'INT1714842', 1),
(348, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:5', '2020-10-10 04:00:00', 38, 0, '', 'INT5618691', 1),
(349, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:6', '2020-10-10 04:00:00', 38, 0, '', 'INT9089663', 1),
(350, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:7', '2020-10-10 04:00:00', 38, 0, '', 'INT5222934', 1),
(351, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:8', '2020-10-10 04:00:00', 38, 0, '', 'INT3479876', 1),
(352, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:9', '2020-10-10 04:00:00', 38, 0, '', 'INT5033079', 1),
(353, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:10', '2020-10-10 04:00:00', 38, 0, '', 'INT101126', 1),
(354, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:12', '2020-10-10 04:00:00', 38, 0, '', 'INT4466674', 1),
(355, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:13', '2020-10-10 04:00:00', 38, 0, '', 'INT4471341', 1),
(356, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:16', '2020-10-10 04:00:00', 38, 0, '', 'INT8060574', 1),
(357, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:17', '2020-10-10 04:00:00', 38, 0, '', 'INT8584540', 1),
(358, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:19', '2020-10-10 04:00:00', 38, 0, '', 'INT2369441', 1),
(359, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:20', '2020-10-10 04:00:00', 38, 0, '', 'INT416375', 1),
(360, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:21', '2020-10-10 04:00:00', 38, 0, '', 'INT2005066', 1),
(361, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:22', '2020-10-10 04:00:00', 38, 0, '', 'INT9616856', 1),
(362, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:23', '2020-10-10 04:00:00', 38, 0, '', 'INT7145528', 1),
(363, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:24', '2020-10-10 04:00:00', 38, 0, '', 'INT1622530', 1),
(364, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:25', '2020-10-10 04:00:00', 38, 0, '', 'INT9409819', 1),
(365, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:26', '2020-10-10 04:00:00', 38, 0, '', 'INT6718478', 1),
(366, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:31', '2020-10-10 04:00:00', 38, 0, '', 'INT8887794', 1),
(367, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:32', '2020-10-10 04:00:00', 38, 0, '', 'INT5064957', 1),
(368, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:33', '2020-10-10 04:00:00', 38, 0, '', 'INT9295906', 1),
(369, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:34', '2020-10-10 04:00:00', 38, 0, '', 'INT4632516', 1),
(370, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:35', '2020-10-10 04:00:00', 38, 0, '', 'INT3957825', 1);
INSERT INTO `history` (`id`, `user_id`, `deposit_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) VALUES
(371, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:36', '2020-10-10 04:00:00', 38, 0, '', 'INT8672242', 1),
(372, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:37', '2020-10-10 04:00:00', 38, 0, '', 'INT7377694', 1),
(373, 106, 39, 0.01439830, 'intrest_earned', 'Interest Earned on 2020-10-10 deposit id:39', '2020-10-10 04:00:00', 38, 0, '', 'INT5655089', 1),
(374, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:1', '2020-10-11 04:00:00', 38, 0, '', 'INT5009685', 1),
(375, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:2', '2020-10-11 04:00:00', 38, 0, '', 'INT1482088', 1),
(376, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:3', '2020-10-11 04:00:00', 38, 0, '', 'INT9794175', 1),
(377, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:4', '2020-10-11 04:00:00', 38, 0, '', 'INT4893972', 1),
(378, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:5', '2020-10-11 04:00:00', 38, 0, '', 'INT7004527', 1),
(379, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:6', '2020-10-11 04:00:00', 38, 0, '', 'INT8277992', 1),
(380, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:7', '2020-10-11 04:00:00', 38, 0, '', 'INT3948886', 1),
(381, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:8', '2020-10-11 04:00:00', 38, 0, '', 'INT5200938', 1),
(382, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:9', '2020-10-11 04:00:00', 38, 0, '', 'INT7365947', 1),
(383, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:10', '2020-10-11 04:00:00', 38, 0, '', 'INT6423464', 1),
(384, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:12', '2020-10-11 04:00:00', 38, 0, '', 'INT6099520', 1),
(385, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:13', '2020-10-11 04:00:00', 38, 0, '', 'INT2259779', 1),
(386, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:16', '2020-10-11 04:00:00', 38, 0, '', 'INT938396', 1),
(387, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:17', '2020-10-11 04:00:00', 38, 0, '', 'INT4942876', 1),
(388, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:19', '2020-10-11 04:00:00', 38, 0, '', 'INT344427', 1),
(389, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:20', '2020-10-11 04:00:00', 38, 0, '', 'INT5835157', 1),
(390, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:21', '2020-10-11 04:00:00', 38, 0, '', 'INT2390813', 1),
(391, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:22', '2020-10-11 04:00:00', 38, 0, '', 'INT1290838', 1),
(392, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:23', '2020-10-11 04:00:00', 38, 0, '', 'INT8312172', 1),
(393, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:24', '2020-10-11 04:00:00', 38, 0, '', 'INT1493049', 1),
(394, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:25', '2020-10-11 04:00:00', 38, 0, '', 'INT8073640', 1),
(395, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:26', '2020-10-11 04:00:00', 38, 0, '', 'INT4971551', 1),
(396, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:31', '2020-10-11 04:00:00', 38, 0, '', 'INT7529983', 1),
(397, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:32', '2020-10-11 04:00:00', 38, 0, '', 'INT6109073', 1),
(398, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:33', '2020-10-11 04:00:00', 38, 0, '', 'INT6107787', 1),
(399, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:34', '2020-10-11 04:00:00', 38, 0, '', 'INT2759688', 1),
(400, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:35', '2020-10-11 04:00:00', 38, 0, '', 'INT5435076', 1),
(401, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:36', '2020-10-11 04:00:00', 38, 0, '', 'INT3481759', 1),
(402, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:37', '2020-10-11 04:00:00', 38, 0, '', 'INT4644950', 1),
(403, 106, 39, 0.01439830, 'intrest_earned', 'Interest Earned on 2020-10-11 deposit id:39', '2020-10-11 04:00:00', 38, 0, '', 'INT3020795', 1),
(404, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:1', '2020-10-12 04:00:00', 38, 0, '', 'INT4690491', 1),
(405, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:2', '2020-10-12 04:00:00', 38, 0, '', 'INT3972226', 1),
(406, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:3', '2020-10-12 04:00:00', 38, 0, '', 'INT6239612', 1),
(407, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:4', '2020-10-12 04:00:00', 38, 0, '', 'INT3715847', 1),
(408, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:5', '2020-10-12 04:00:00', 38, 0, '', 'INT5476898', 1),
(409, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:6', '2020-10-12 04:00:00', 38, 0, '', 'INT8337356', 1),
(410, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:7', '2020-10-12 04:00:00', 38, 0, '', 'INT300484', 1),
(411, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:8', '2020-10-12 04:00:00', 38, 0, '', 'INT6768219', 1),
(412, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:9', '2020-10-12 04:00:00', 38, 0, '', 'INT3974755', 1),
(413, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:10', '2020-10-12 04:00:00', 38, 0, '', 'INT4508987', 1),
(414, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:12', '2020-10-12 04:00:00', 38, 0, '', 'INT7869978', 1),
(415, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:13', '2020-10-12 04:00:00', 38, 0, '', 'INT6330521', 1),
(416, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:16', '2020-10-12 04:00:00', 38, 0, '', 'INT4842275', 1),
(417, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:17', '2020-10-12 04:00:00', 38, 0, '', 'INT2755924', 1),
(418, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:19', '2020-10-12 04:00:00', 38, 0, '', 'INT3969691', 1),
(419, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:20', '2020-10-12 04:00:00', 38, 0, '', 'INT8234319', 1),
(420, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:21', '2020-10-12 04:00:00', 38, 0, '', 'INT9964456', 1),
(421, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:22', '2020-10-12 04:00:00', 38, 0, '', 'INT5235660', 1),
(422, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:23', '2020-10-12 04:00:00', 38, 0, '', 'INT6559883', 1),
(423, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:24', '2020-10-12 04:00:00', 38, 0, '', 'INT2185840', 1),
(424, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:25', '2020-10-12 04:00:00', 38, 0, '', 'INT8712678', 1),
(425, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:26', '2020-10-12 04:00:00', 38, 0, '', 'INT382956', 1),
(426, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:31', '2020-10-12 04:00:00', 38, 0, '', 'INT5326147', 1),
(427, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:32', '2020-10-12 04:00:00', 38, 0, '', 'INT4181780', 1),
(428, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:33', '2020-10-12 04:00:00', 38, 0, '', 'INT8041290', 1),
(429, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:34', '2020-10-12 04:00:00', 38, 0, '', 'INT7137670', 1),
(430, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:35', '2020-10-12 04:00:00', 38, 0, '', 'INT8504378', 1),
(431, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:36', '2020-10-12 04:00:00', 38, 0, '', 'INT9348883', 1),
(432, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:37', '2020-10-12 04:00:00', 38, 0, '', 'INT8651980', 1),
(433, 106, 39, 0.01439830, 'intrest_earned', 'Interest Earned on 2020-10-12 deposit id:39', '2020-10-12 04:00:00', 38, 0, '', 'INT5477732', 1),
(434, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:1', '2020-10-13 04:00:00', 38, 0, '', 'INT6052587', 1),
(435, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:2', '2020-10-13 04:00:00', 38, 0, '', 'INT1115229', 1),
(436, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:3', '2020-10-13 04:00:00', 38, 0, '', 'INT7862561', 1),
(437, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:4', '2020-10-13 04:00:00', 38, 0, '', 'INT5372235', 1),
(438, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:5', '2020-10-13 04:00:00', 38, 0, '', 'INT7810234', 1),
(439, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:6', '2020-10-13 04:00:00', 38, 0, '', 'INT1866204', 1),
(440, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:7', '2020-10-13 04:00:00', 38, 0, '', 'INT1024824', 1),
(441, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:8', '2020-10-13 04:00:00', 38, 0, '', 'INT5175840', 1),
(442, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:9', '2020-10-13 04:00:00', 38, 0, '', 'INT2595426', 1),
(443, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:10', '2020-10-13 04:00:00', 38, 0, '', 'INT8579448', 1),
(444, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:12', '2020-10-13 04:00:00', 38, 0, '', 'INT6056133', 1),
(445, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:13', '2020-10-13 04:00:00', 38, 0, '', 'INT1587478', 1),
(446, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:16', '2020-10-13 04:00:00', 38, 0, '', 'INT5689060', 1),
(447, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:17', '2020-10-13 04:00:00', 38, 0, '', 'INT705672', 1),
(448, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:19', '2020-10-13 04:00:00', 38, 0, '', 'INT5047570', 1),
(449, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:20', '2020-10-13 04:00:00', 38, 0, '', 'INT3504674', 1),
(450, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:21', '2020-10-13 04:00:00', 38, 0, '', 'INT8398319', 1),
(451, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:22', '2020-10-13 04:00:00', 38, 0, '', 'INT3115817', 1),
(452, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:23', '2020-10-13 04:00:00', 38, 0, '', 'INT1108258', 1),
(453, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:24', '2020-10-13 04:00:00', 38, 0, '', 'INT4505411', 1),
(454, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:25', '2020-10-13 04:00:00', 38, 0, '', 'INT7782118', 1),
(455, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:26', '2020-10-13 04:00:00', 38, 0, '', 'INT5107185', 1),
(456, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:31', '2020-10-13 04:00:00', 38, 0, '', 'INT7385432', 1),
(457, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:32', '2020-10-13 04:00:00', 38, 0, '', 'INT2931009', 1),
(458, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:33', '2020-10-13 04:00:00', 38, 0, '', 'INT7015747', 1),
(459, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:34', '2020-10-13 04:00:00', 38, 0, '', 'INT4300092', 1),
(460, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:35', '2020-10-13 04:00:00', 38, 0, '', 'INT3844339', 1),
(461, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:36', '2020-10-13 04:00:00', 38, 0, '', 'INT6705594', 1),
(462, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:37', '2020-10-13 04:00:00', 38, 0, '', 'INT2059170', 1),
(463, 106, 39, 0.01439830, 'intrest_earned', 'Interest Earned on 2020-10-13 deposit id:39', '2020-10-13 04:00:00', 38, 0, '', 'INT8219785', 1),
(464, 92, 1, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:1', '2020-10-14 04:00:00', 38, 0, '', 'INT2059088', 1),
(465, 92, 2, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:2', '2020-10-14 04:00:00', 38, 0, '', 'INT5817703', 1),
(466, 94, 3, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:3', '2020-10-14 04:00:00', 38, 0, '', 'INT3472290', 1),
(467, 93, 4, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:4', '2020-10-14 04:00:00', 38, 0, '', 'INT3692342', 1),
(468, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:5', '2020-10-14 04:00:00', 38, 0, '', 'INT6506400', 1),
(469, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:6', '2020-10-14 04:00:00', 38, 0, '', 'INT2027194', 1),
(470, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:7', '2020-10-14 04:00:00', 38, 0, '', 'INT6879560', 1),
(471, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:8', '2020-10-14 04:00:00', 38, 0, '', 'INT3057321', 1),
(472, 96, 9, 0.52500000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:9', '2020-10-14 04:00:00', 38, 0, '', 'INT544218', 1),
(473, 92, 10, 0.85000000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:10', '2020-10-14 04:00:00', 38, 0, '', 'INT6958009', 1),
(474, 92, 12, 0.04950000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:12', '2020-10-14 04:00:00', 38, 0, '', 'INT2591357', 1),
(475, 100, 13, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:13', '2020-10-14 04:00:00', 38, 0, '', 'INT3963089', 1),
(476, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:16', '2020-10-14 04:00:00', 38, 0, '', 'INT6916694', 1),
(477, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:17', '2020-10-14 04:00:00', 38, 0, '', 'INT7357746', 1),
(478, 104, 19, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:19', '2020-10-14 04:00:00', 38, 0, '', 'INT1616974', 1),
(479, 92, 20, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:20', '2020-10-14 04:00:00', 38, 0, '', 'INT5304679', 1),
(480, 92, 21, 0.66300000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:21', '2020-10-14 04:00:00', 38, 0, '', 'INT4598246', 1),
(481, 92, 22, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:22', '2020-10-14 04:00:00', 38, 0, '', 'INT2009585', 1),
(482, 92, 23, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:23', '2020-10-14 04:00:00', 38, 0, '', 'INT5805709', 1),
(483, 92, 24, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:24', '2020-10-14 04:00:00', 38, 0, '', 'INT3531479', 1),
(484, 94, 25, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:25', '2020-10-14 04:00:00', 38, 0, '', 'INT1447602', 1),
(485, 92, 26, 0.05400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:26', '2020-10-14 04:00:00', 38, 0, '', 'INT3413269', 1),
(486, 104, 31, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:31', '2020-10-14 04:00:00', 38, 0, '', 'INT5758804', 1),
(487, 92, 32, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:32', '2020-10-14 04:00:00', 38, 0, '', 'INT3739132', 1),
(488, 92, 33, 0.27000000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:33', '2020-10-14 04:00:00', 38, 0, '', 'INT4853929', 1),
(489, 96, 34, 0.01750000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:34', '2020-10-14 04:00:00', 38, 0, '', 'INT1809201', 1),
(490, 105, 35, 0.04682160, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:35', '2020-10-14 04:00:00', 38, 0, '', 'INT4612514', 1),
(491, 104, 36, 0.12000000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:36', '2020-10-14 04:00:00', 38, 0, '', 'INT1369459', 1),
(492, 96, 37, 2.55000000, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:37', '2020-10-14 04:00:00', 38, 0, '', 'INT1476919', 1),
(493, 106, 39, 0.01439830, 'intrest_earned', 'Interest Earned on 2020-10-14 deposit id:39', '2020-10-14 04:00:00', 38, 0, '', 'INT6676569', 1),
(494, 1, 40, 0.07000000, 'commissions', 'Referral commission earned 0.07000000', '2020-10-14 21:00:00', 38, 0, '', 'REF4656270', 1),
(495, 109, 42, 0.54000000, 'commissions', 'Referral commission earned 0.54000000', '2020-10-28 22:00:00', 38, 0, '', 'REF9800912', 1),
(496, 108, 42, 0.18000000, 'commissions', 'Referral commission earned 0.18000000', '2020-10-28 22:00:00', 38, 0, '', 'REF9866884', 1),
(497, 107, 42, 0.12000000, 'commissions', 'Referral commission earned 0.12000000', '2020-10-28 22:00:00', 38, 0, '', 'REF1659819', 1),
(498, 104, 42, 0.06000000, 'commissions', 'Referral commission earned 0.06000000', '2020-10-28 22:00:00', 38, 0, '', 'REF5237771', 1),
(499, 109, 43, 0.50400000, 'commissions', 'Referral commission earned 0.50400000', '2020-10-28 22:00:00', 38, 0, '', 'REF3692383', 1),
(500, 108, 43, 0.16800000, 'commissions', 'Referral commission earned 0.16800000', '2020-10-28 22:00:00', 38, 0, '', 'REF7690262', 1),
(501, 107, 43, 0.11200000, 'commissions', 'Referral commission earned 0.11200000', '2020-10-28 22:00:00', 38, 0, '', 'REF4652084', 1),
(502, 104, 43, 0.05600000, 'commissions', 'Referral commission earned 0.05600000', '2020-10-28 22:00:00', 38, 0, '', 'REF7157824', 1),
(503, 109, 44, 0.00700000, 'commissions', 'Referral commission earned 0.00700000', '2020-10-29 22:00:00', 38, 0, '', 'REF4556797', 1),
(504, 108, 44, 0.00100000, 'commissions', 'Referral commission earned 0.00100000', '2020-10-29 22:00:00', 38, 0, '', 'REF7436922', 1),
(505, 107, 44, 0.00100000, 'commissions', 'Referral commission earned 0.00100000', '2020-10-29 22:00:00', 38, 0, '', 'REF4556786', 1),
(506, 104, 44, 0.00100000, 'commissions', 'Referral commission earned 0.00100000', '2020-10-29 22:00:00', 38, 0, '', 'REF782839', 1),
(507, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-10-31 deposit id:44', '2020-10-31 05:00:00', 38, 0, '', 'INT5395043', 1),
(508, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-01 deposit id:44', '2020-11-01 05:00:00', 38, 0, '', 'INT5395049', 1),
(509, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-02 deposit id:44', '2020-11-02 05:00:00', 38, 0, '', 'INT5395058', 1),
(510, 104, 45, 0.07000000, 'commissions', 'Referral commission earned 0.07000000', '2020-11-01 22:00:00', 38, 0, '', 'REF9175800', 1),
(511, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-02 deposit id:5', '2020-11-01 22:00:00', 38, 0, '', 'INT6792193', 1),
(512, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-02 deposit id:6', '2020-11-01 22:00:00', 38, 0, '', 'INT8976759', 1),
(513, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-02 deposit id:7', '2020-11-01 22:00:00', 38, 0, '', 'INT1589969', 1),
(514, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-02 deposit id:8', '2020-11-01 22:00:00', 38, 0, '', 'INT6862613', 1),
(515, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-02 deposit id:16', '2020-11-01 22:00:00', 38, 0, '', 'INT1832922', 1),
(516, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-02 deposit id:17', '2020-11-01 22:00:00', 38, 0, '', 'INT2887973', 1),
(517, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-02 deposit id:40', '2020-11-01 22:00:00', 38, 0, '', 'INT4730114', 1),
(518, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:5', '2020-11-02 22:00:00', 38, 0, '', 'INT4606424', 1),
(519, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:6', '2020-11-02 22:00:00', 38, 0, '', 'INT985499', 1),
(520, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:7', '2020-11-02 22:00:00', 38, 0, '', 'INT4864840', 1),
(521, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:8', '2020-11-02 22:00:00', 38, 0, '', 'INT6327156', 1),
(522, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:16', '2020-11-02 22:00:00', 38, 0, '', 'INT9293082', 1),
(523, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:17', '2020-11-02 22:00:00', 38, 0, '', 'INT4550065', 1),
(524, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:40', '2020-11-02 22:00:00', 38, 0, '', 'INT1669653', 1),
(525, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:44', '2020-11-02 22:00:00', 38, 0, '', 'INT8697452', 1),
(526, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-03 deposit id:45', '2020-11-02 22:00:00', 38, 0, '', 'INT7547953', 1),
(527, 109, 46, 0.02800000, 'commissions', 'Referral commission earned 0.02800000', '2020-11-03 22:00:00', 38, 0, '', 'REF3213240', 1),
(528, 108, 46, 0.00400000, 'commissions', 'Referral commission earned 0.00400000', '2020-11-03 22:00:00', 38, 0, '', 'REF8550910', 1),
(529, 107, 46, 0.00400000, 'commissions', 'Referral commission earned 0.00400000', '2020-11-03 22:00:00', 38, 0, '', 'REF4457865', 1),
(530, 104, 46, 0.00400000, 'commissions', 'Referral commission earned 0.00400000', '2020-11-03 22:00:00', 38, 0, '', 'REF7301017', 1),
(531, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:5', '2020-11-03 22:00:00', 38, 0, '', 'INT5834083', 1),
(532, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:6', '2020-11-03 22:00:00', 38, 0, '', 'INT9398935', 1),
(533, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:7', '2020-11-03 22:00:00', 38, 0, '', 'INT2195981', 1),
(534, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:8', '2020-11-03 22:00:00', 38, 0, '', 'INT1930973', 1),
(535, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:16', '2020-11-03 22:00:00', 38, 0, '', 'INT8533193', 1),
(536, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:17', '2020-11-03 22:00:00', 38, 0, '', 'INT2235787', 1),
(537, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:40', '2020-11-03 22:00:00', 38, 0, '', 'INT2204385', 1),
(538, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:44', '2020-11-03 22:00:00', 38, 0, '', 'INT7234303', 1),
(539, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-04 deposit id:45', '2020-11-03 22:00:00', 38, 0, '', 'INT5758487', 1),
(540, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:5', '2020-11-04 22:00:00', 38, 0, '', 'INT517687', 1),
(541, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:6', '2020-11-04 22:00:00', 38, 0, '', 'INT207188', 1),
(542, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:7', '2020-11-04 22:00:00', 38, 0, '', 'INT3319155', 1),
(543, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:8', '2020-11-04 22:00:00', 38, 0, '', 'INT7949805', 1),
(544, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:16', '2020-11-04 22:00:00', 38, 0, '', 'INT8479376', 1),
(545, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:17', '2020-11-04 22:00:00', 38, 0, '', 'INT9816764', 1),
(546, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:40', '2020-11-04 22:00:00', 38, 0, '', 'INT4774609', 1),
(547, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:44', '2020-11-04 22:00:00', 38, 0, '', 'INT5098080', 1),
(548, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:45', '2020-11-04 22:00:00', 38, 0, '', 'INT1170983', 1),
(549, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-05 deposit id:46', '2020-11-04 22:00:00', 38, 0, '', 'INT9273594', 1),
(550, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:5', '2020-11-06 00:00:00', 38, 0, '', 'INT801554', 1),
(551, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:6', '2020-11-06 00:00:00', 38, 0, '', 'INT2490138', 1),
(552, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:7', '2020-11-06 00:00:00', 38, 0, '', 'INT81894', 1),
(553, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:8', '2020-11-06 00:00:00', 38, 0, '', 'INT3960819', 1),
(554, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:16', '2020-11-06 00:00:00', 38, 0, '', 'INT191343', 1),
(555, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:17', '2020-11-06 00:00:00', 38, 0, '', 'INT5822858', 1),
(556, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:40', '2020-11-06 00:00:00', 38, 0, '', 'INT1693234', 1),
(557, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:44', '2020-11-06 00:00:00', 38, 0, '', 'INT1714231', 1),
(558, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:45', '2020-11-06 00:00:00', 38, 0, '', 'INT4560176', 1),
(559, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-06 deposit id:46', '2020-11-06 00:00:00', 38, 0, '', 'INT4420786', 1),
(560, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:5', '2020-11-07 00:00:00', 38, 0, '', 'INT9191449', 1),
(561, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:6', '2020-11-07 00:00:00', 38, 0, '', 'INT3629999', 1),
(562, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:7', '2020-11-07 00:00:00', 38, 0, '', 'INT2029608', 1),
(563, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:8', '2020-11-07 00:00:00', 38, 0, '', 'INT8158385', 1),
(564, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:16', '2020-11-07 00:00:00', 38, 0, '', 'INT3917067', 1),
(565, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:17', '2020-11-07 00:00:00', 38, 0, '', 'INT6768756', 1),
(566, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:40', '2020-11-07 00:00:00', 38, 0, '', 'INT1324043', 1),
(567, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:44', '2020-11-07 00:00:00', 38, 0, '', 'INT675290', 1),
(568, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:45', '2020-11-07 00:00:00', 38, 0, '', 'INT4667536', 1),
(569, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-07 deposit id:46', '2020-11-07 00:00:00', 38, 0, '', 'INT9163206', 1),
(570, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:5', '2020-11-08 00:00:00', 38, 0, '', 'INT6315546', 1),
(571, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:6', '2020-11-08 00:00:00', 38, 0, '', 'INT376505', 1),
(572, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:7', '2020-11-08 00:00:00', 38, 0, '', 'INT5041766', 1),
(573, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:8', '2020-11-08 00:00:00', 38, 0, '', 'INT4200807', 1),
(574, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:16', '2020-11-08 00:00:00', 38, 0, '', 'INT5403905', 1),
(575, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:17', '2020-11-08 00:00:00', 38, 0, '', 'INT7723548', 1),
(576, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:40', '2020-11-08 00:00:00', 38, 0, '', 'INT8331210', 1),
(577, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:44', '2020-11-08 00:00:00', 38, 0, '', 'INT3407467', 1),
(578, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:45', '2020-11-08 00:00:00', 38, 0, '', 'INT8885100', 1),
(579, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-08 deposit id:46', '2020-11-08 00:00:00', 38, 0, '', 'INT4180621', 1),
(580, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:5', '2020-11-09 00:00:00', 38, 0, '', 'INT8301893', 1),
(581, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:6', '2020-11-09 00:00:00', 38, 0, '', 'INT7922133', 1),
(582, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:7', '2020-11-09 00:00:00', 38, 0, '', 'INT2751197', 1),
(583, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:8', '2020-11-09 00:00:00', 38, 0, '', 'INT7936414', 1),
(584, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:16', '2020-11-09 00:00:00', 38, 0, '', 'INT1636743', 1),
(585, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:17', '2020-11-09 00:00:00', 38, 0, '', 'INT9249426', 1),
(586, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:40', '2020-11-09 00:00:00', 38, 0, '', 'INT5099876', 1),
(587, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:44', '2020-11-09 00:00:00', 38, 0, '', 'INT1073810', 1),
(588, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:45', '2020-11-09 00:00:00', 38, 0, '', 'INT8744136', 1),
(589, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-09 deposit id:46', '2020-11-09 00:00:00', 38, 0, '', 'INT986977', 1),
(590, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:5', '2020-11-10 00:00:00', 38, 0, '', 'INT4658197', 1),
(591, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:6', '2020-11-10 00:00:00', 38, 0, '', 'INT3568335', 1),
(592, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:7', '2020-11-10 00:00:00', 38, 0, '', 'INT3940632', 1),
(593, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:8', '2020-11-10 00:00:00', 38, 0, '', 'INT4514320', 1),
(594, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:16', '2020-11-10 00:00:00', 38, 0, '', 'INT1938000', 1),
(595, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:17', '2020-11-10 00:00:00', 38, 0, '', 'INT5677081', 1),
(596, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:40', '2020-11-10 00:00:00', 38, 0, '', 'INT2795557', 1),
(597, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:44', '2020-11-10 00:00:00', 38, 0, '', 'INT9687743', 1),
(598, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:45', '2020-11-10 00:00:00', 38, 0, '', 'INT3407138', 1),
(599, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-10 deposit id:46', '2020-11-10 00:00:00', 38, 0, '', 'INT9614931', 1),
(600, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:5', '2020-11-11 00:00:00', 38, 0, '', 'INT8838732', 1),
(601, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:6', '2020-11-11 00:00:00', 38, 0, '', 'INT3708607', 1),
(602, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:7', '2020-11-11 00:00:00', 38, 0, '', 'INT3157780', 1),
(603, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:8', '2020-11-11 00:00:00', 38, 0, '', 'INT6770177', 1),
(604, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:16', '2020-11-11 00:00:00', 38, 0, '', 'INT2428948', 1),
(605, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:17', '2020-11-11 00:00:00', 38, 0, '', 'INT5086399', 1),
(606, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:40', '2020-11-11 00:00:00', 38, 0, '', 'INT4150823', 1),
(607, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:44', '2020-11-11 00:00:00', 38, 0, '', 'INT3252582', 1),
(608, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:45', '2020-11-11 00:00:00', 38, 0, '', 'INT8703491', 1),
(609, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-11 deposit id:46', '2020-11-11 00:00:00', 38, 0, '', 'INT3234822', 1),
(610, 109, 47, 0.94600000, 'commissions', 'Referral commission earned 0.94600000', '2020-11-11 00:00:00', 38, 0, '', 'REF3344155', 1),
(611, 108, 47, 0.34400000, 'commissions', 'Referral commission earned 0.34400000', '2020-11-11 00:00:00', 38, 0, '', 'REF7716040', 1),
(612, 107, 47, 0.25800000, 'commissions', 'Referral commission earned 0.25800000', '2020-11-11 00:00:00', 38, 0, '', 'REF6962888', 1),
(613, 104, 47, 0.17200000, 'commissions', 'Referral commission earned 0.17200000', '2020-11-11 00:00:00', 38, 0, '', 'REF1251542', 1),
(614, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:5', '2020-11-12 00:00:00', 38, 0, '', 'INT4041126', 1),
(615, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:6', '2020-11-12 00:00:00', 38, 0, '', 'INT2100138', 1),
(616, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:7', '2020-11-12 00:00:00', 38, 0, '', 'INT1624385', 1),
(617, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:8', '2020-11-12 00:00:00', 38, 0, '', 'INT3285362', 1),
(618, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:16', '2020-11-12 00:00:00', 38, 0, '', 'INT1175805', 1),
(619, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:17', '2020-11-12 00:00:00', 38, 0, '', 'INT2410835', 1),
(620, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:40', '2020-11-12 00:00:00', 38, 0, '', 'INT7150633', 1),
(621, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:44', '2020-11-12 00:00:00', 38, 0, '', 'INT7379873', 1),
(622, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:45', '2020-11-12 00:00:00', 38, 0, '', 'INT8324512', 1),
(623, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:46', '2020-11-12 00:00:00', 38, 0, '', 'INT922762', 1),
(624, 119, 47, 0.10320000, 'intrest_earned', 'Interest Earned on 2020-11-12 deposit id:47', '2020-11-12 00:00:00', 38, 0, '', 'INT9446556', 1),
(625, 109, 48, 0.01442000, 'commissions', 'Referral commission earned 0.01442000', '2020-11-13 00:00:00', 38, 0, '', 'REF3644236', 1),
(626, 108, 48, 0.00206000, 'commissions', 'Referral commission earned 0.00206000', '2020-11-13 00:00:00', 38, 0, '', 'REF9829022', 1),
(627, 107, 48, 0.00206000, 'commissions', 'Referral commission earned 0.00206000', '2020-11-13 00:00:00', 38, 0, '', 'REF13575', 1),
(628, 104, 48, 0.00206000, 'commissions', 'Referral commission earned 0.00206000', '2020-11-13 00:00:00', 38, 0, '', 'REF2151512', 1),
(629, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:5', '2020-11-13 00:00:00', 38, 0, '', 'INT1204638', 1),
(630, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:6', '2020-11-13 00:00:00', 38, 0, '', 'INT5021118', 1),
(631, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:7', '2020-11-13 00:00:00', 38, 0, '', 'INT4889993', 1),
(632, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:8', '2020-11-13 00:00:00', 38, 0, '', 'INT4069884', 1),
(633, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:16', '2020-11-13 00:00:00', 38, 0, '', 'INT9567045', 1),
(634, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:17', '2020-11-13 00:00:00', 38, 0, '', 'INT1833849', 1),
(635, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:40', '2020-11-13 00:00:00', 38, 0, '', 'INT405057', 1),
(636, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:44', '2020-11-13 00:00:00', 38, 0, '', 'INT2610952', 1),
(637, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:45', '2020-11-13 00:00:00', 38, 0, '', 'INT4376965', 1),
(638, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:46', '2020-11-13 00:00:00', 38, 0, '', 'INT969388', 1),
(639, 119, 47, 0.00415800, 'intrest_earned', 'Interest Earned on 2020-11-13 deposit id:47', '2020-11-13 00:00:00', 38, 0, '', 'INT5317996', 1),
(640, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:5', '2020-11-14 00:00:00', 38, 0, '', 'INT7782292', 1),
(641, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:6', '2020-11-14 00:00:00', 38, 0, '', 'INT2304217', 1),
(642, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:7', '2020-11-14 00:00:00', 38, 0, '', 'INT2050181', 1),
(643, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:8', '2020-11-14 00:00:00', 38, 0, '', 'INT8862034', 1),
(644, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:16', '2020-11-14 00:00:00', 38, 0, '', 'INT1269449', 1),
(645, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:17', '2020-11-14 00:00:00', 38, 0, '', 'INT3859294', 1),
(646, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:40', '2020-11-14 00:00:00', 38, 0, '', 'INT8711000', 1),
(647, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:44', '2020-11-14 00:00:00', 38, 0, '', 'INT2285334', 1),
(648, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:45', '2020-11-14 00:00:00', 38, 0, '', 'INT2213674', 1),
(649, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:46', '2020-11-14 00:00:00', 38, 0, '', 'INT3567643', 1),
(650, 119, 47, 0.00415800, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:47', '2020-11-14 00:00:00', 38, 0, '', 'INT4794409', 1),
(651, 119, 48, 0.00144200, 'intrest_earned', 'Interest Earned on 2020-11-14 deposit id:48', '2020-11-14 00:00:00', 38, 0, '', 'INT5481249', 1),
(652, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:5', '2020-11-15 00:00:00', 38, 0, '', 'INT7014175', 1),
(653, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:6', '2020-11-15 00:00:00', 38, 0, '', 'INT7950433', 1),
(654, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:7', '2020-11-15 00:00:00', 38, 0, '', 'INT9809262', 1),
(655, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:8', '2020-11-15 00:00:00', 38, 0, '', 'INT6259770', 1),
(656, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:16', '2020-11-15 00:00:00', 38, 0, '', 'INT8128762', 1),
(657, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:17', '2020-11-15 00:00:00', 38, 0, '', 'INT7623078', 1),
(658, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:40', '2020-11-15 00:00:00', 38, 0, '', 'INT1400305', 1),
(659, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:44', '2020-11-15 00:00:00', 38, 0, '', 'INT10748', 1),
(660, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:45', '2020-11-15 00:00:00', 38, 0, '', 'INT3068987', 1),
(661, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:46', '2020-11-15 00:00:00', 38, 0, '', 'INT328130', 1),
(662, 119, 47, 0.00415800, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:47', '2020-11-15 00:00:00', 38, 0, '', 'INT8045599', 1),
(663, 119, 48, 0.00144200, 'intrest_earned', 'Interest Earned on 2020-11-15 deposit id:48', '2020-11-15 00:00:00', 38, 0, '', 'INT1490138', 1),
(664, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:5', '2020-11-16 00:00:00', 38, 0, '', 'INT7162912', 1),
(665, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:6', '2020-11-16 00:00:00', 38, 0, '', 'INT1587073', 1),
(666, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:7', '2020-11-16 00:00:00', 38, 0, '', 'INT7540731', 1),
(667, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:8', '2020-11-16 00:00:00', 38, 0, '', 'INT229234', 1),
(668, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:16', '2020-11-16 00:00:00', 38, 0, '', 'INT8924108', 1),
(669, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:17', '2020-11-16 00:00:00', 38, 0, '', 'INT8229785', 1),
(670, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:40', '2020-11-16 00:00:00', 38, 0, '', 'INT5491736', 1),
(671, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:44', '2020-11-16 00:00:00', 38, 0, '', 'INT9230425', 1),
(672, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:45', '2020-11-16 00:00:00', 38, 0, '', 'INT4494923', 1),
(673, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:46', '2020-11-16 00:00:00', 38, 0, '', 'INT9099688', 1),
(674, 119, 47, 0.00415800, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:47', '2020-11-16 00:00:00', 38, 0, '', 'INT7709185', 1),
(675, 119, 48, 0.00144200, 'intrest_earned', 'Interest Earned on 2020-11-16 deposit id:48', '2020-11-16 00:00:00', 38, 0, '', 'INT4976986', 1),
(676, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:5', '2020-11-17 00:00:00', 38, 0, '', 'INT5593280', 1),
(677, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:6', '2020-11-17 00:00:00', 38, 0, '', 'INT6091125', 1),
(678, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:7', '2020-11-17 00:00:00', 38, 0, '', 'INT948747', 1),
(679, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:8', '2020-11-17 00:00:00', 38, 0, '', 'INT6948677', 1),
(680, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:16', '2020-11-17 00:00:00', 38, 0, '', 'INT8593779', 1),
(681, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:17', '2020-11-17 00:00:00', 38, 0, '', 'INT1849614', 1),
(682, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:40', '2020-11-17 00:00:00', 38, 0, '', 'INT8957155', 1),
(683, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:44', '2020-11-17 00:00:00', 38, 0, '', 'INT3697295', 1),
(684, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:45', '2020-11-17 00:00:00', 38, 0, '', 'INT5774837', 1),
(685, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:46', '2020-11-17 00:00:00', 38, 0, '', 'INT6193218', 1),
(686, 119, 47, 0.00415800, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:47', '2020-11-17 00:00:00', 38, 0, '', 'INT5287438', 1),
(687, 119, 48, 0.00144200, 'intrest_earned', 'Interest Earned on 2020-11-17 deposit id:48', '2020-11-17 00:00:00', 38, 0, '', 'INT8180217', 1),
(688, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:5', '2020-11-18 00:00:00', 38, 0, '', 'INT8520320', 1),
(689, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:6', '2020-11-18 00:00:00', 38, 0, '', 'INT6010194', 1),
(690, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:7', '2020-11-18 00:00:00', 38, 0, '', 'INT850758', 1),
(691, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:8', '2020-11-18 00:00:00', 38, 0, '', 'INT9500678', 1),
(692, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:16', '2020-11-18 00:00:00', 38, 0, '', 'INT5197669', 1),
(693, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:17', '2020-11-18 00:00:00', 38, 0, '', 'INT843175', 1),
(694, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:40', '2020-11-18 00:00:00', 38, 0, '', 'INT1141206', 1),
(695, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:44', '2020-11-18 00:00:00', 38, 0, '', 'INT3248063', 1),
(696, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:45', '2020-11-18 00:00:00', 38, 0, '', 'INT5346028', 1),
(697, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:46', '2020-11-18 00:00:00', 38, 0, '', 'INT8874710', 1),
(698, 119, 47, 0.00415800, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:47', '2020-11-18 00:00:00', 38, 0, '', 'INT1118504', 1),
(699, 119, 48, 0.00144200, 'intrest_earned', 'Interest Earned on 2020-11-18 deposit id:48', '2020-11-18 00:00:00', 38, 0, '', 'INT298069', 1),
(700, 2, 5, 0.02100000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:5', '2020-11-19 00:00:00', 38, 0, '', 'INT7019106', 1),
(701, 2, 6, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:6', '2020-11-19 00:00:00', 38, 0, '', 'INT2819271', 1),
(702, 2, 7, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:7', '2020-11-19 00:00:00', 38, 0, '', 'INT6969031', 1),
(703, 2, 8, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:8', '2020-11-19 00:00:00', 38, 0, '', 'INT3187864', 1),
(704, 97, 16, 0.04500000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:16', '2020-11-19 00:00:00', 38, 0, '', 'INT6267691', 1),
(705, 97, 17, 0.01400000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:17', '2020-11-19 00:00:00', 38, 0, '', 'INT7013148', 1),
(706, 2, 40, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:40', '2020-11-19 00:00:00', 38, 0, '', 'INT2669099', 1),
(707, 113, 44, 0.00070000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:44', '2020-11-19 00:00:00', 38, 0, '', 'INT7798518', 1),
(708, 107, 45, 0.00700000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:45', '2020-11-19 00:00:00', 38, 0, '', 'INT515849', 1),
(709, 113, 46, 0.00280000, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:46', '2020-11-19 00:00:00', 38, 0, '', 'INT4744985', 1),
(710, 119, 47, 0.00415800, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:47', '2020-11-19 00:00:00', 38, 0, '', 'INT940859', 1),
(711, 119, 48, 0.00144200, 'intrest_earned', 'Interest Earned on 2020-11-19 deposit id:48', '2020-11-19 00:00:00', 38, 0, '', 'INT4027428', 1),
(712, 104, 49, 0.01400000, 'commissions', 'Referral commission earned 0.01400000', '2020-11-19 00:00:00', 38, 0, '', 'REF6514751', 1),
(713, 109, 50, 0.58508100, 'commissions', 'Referral commission earned 0.58508100', '2020-11-19 00:00:00', 38, 0, '', 'REF4202345', 1),
(714, 108, 50, 0.19502700, 'commissions', 'Referral commission earned 0.19502700', '2020-11-19 00:00:00', 38, 0, '', 'REF7341613', 1),
(715, 107, 50, 0.13001800, 'commissions', 'Referral commission earned 0.13001800', '2020-11-19 00:00:00', 38, 0, '', 'REF2602441', 1),
(716, 104, 50, 0.06500900, 'commissions', 'Referral commission earned 0.06500900', '2020-11-19 00:00:00', 38, 0, '', 'REF2671783', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ipn_handle`
--

CREATE TABLE `ipn_handle` (
  `handle_id` int(30) NOT NULL,
  `user_id` int(30) DEFAULT NULL,
  `amount` double(30,2) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_id` text,
  `post_contents` text,
  `pay_id` int(1) DEFAULT NULL,
  `returncontent` varchar(255) DEFAULT NULL,
  `post_contents1` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipn_response`
--

CREATE TABLE `ipn_response` (
  `id` int(11) NOT NULL,
  `response` text NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `news_id` int(11) NOT NULL,
  `dt` datetime DEFAULT NULL,
  `news_header` varchar(100) DEFAULT NULL,
  `news_description` text,
  `status` enum('on','off') DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`news_id`, `dt`, `news_header`, `news_description`, `status`) VALUES
(1, '2016-08-22 18:36:53', 'Latest News1', 'A New plan ', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `level_commission`
--

CREATE TABLE `level_commission` (
  `level_id` int(11) NOT NULL,
  `level_name` varchar(60) DEFAULT NULL,
  `level_commission` double(30,8) DEFAULT NULL,
  `plan_id` int(20) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_commission`
--

INSERT INTO `level_commission` (`level_id`, `level_name`, `level_commission`, `plan_id`, `status`) VALUES
(444, '1', 3.00000000, 10, NULL),
(445, '2', 1.00000000, 10, NULL),
(446, '3', 1.00000000, 10, NULL),
(447, '4', 1.00000000, 10, NULL),
(761, '1', 9.00000000, 5, NULL),
(762, '2', 3.00000000, 5, NULL),
(763, '3', 2.00000000, 5, NULL),
(764, '4', 1.00000000, 5, NULL),
(765, '1', 11.00000000, 6, NULL),
(766, '2', 4.00000000, 6, NULL),
(767, '3', 3.00000000, 6, NULL),
(768, '4', 2.00000000, 6, NULL),
(769, '1', 13.00000000, 7, NULL),
(770, '2', 5.00000000, 7, NULL),
(771, '3', 4.00000000, 7, NULL),
(772, '4', 3.00000000, 7, NULL),
(773, '1', 15.00000000, 13, NULL),
(774, '2', 6.00000000, 13, NULL),
(775, '3', 5.00000000, 13, NULL),
(776, '4', 4.00000000, 13, NULL),
(777, '1', 7.00000000, 3, NULL),
(778, '2', 1.00000000, 3, NULL),
(779, '3', 1.00000000, 3, NULL),
(780, '4', 1.00000000, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `live_statistics`
--

CREATE TABLE `live_statistics` (
  `id` int(11) NOT NULL,
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
  `editlastdeposit` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live_statistics`
--

INSERT INTO `live_statistics` (`id`, `started`, `runningdays`, `totacc`, `actacc`, `totdep`, `totwithdraw`, `newmember`, `lastwithdraw`, `visitoronline`, `memberonline`, `lastupdate`, `lastdep`, `editrunning`, `editaccounts`, `editactaccounts`, `editdeposit`, `editwithdraw`, `editnewmember`, `editlastwithdraw`, `editlastdeposit`) VALUES
(1, '2012-09-14', 1, 1, 1, 0.00100000, 0.00000000, 'Jhon', 0.00000000, 1, 25, '2012-08-30', 0.00100000, 1, 1, 1, 1, '1', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mail_subjects`
--

CREATE TABLE `mail_subjects` (
  `mail_id` int(11) NOT NULL,
  `from_id` varchar(50) DEFAULT NULL,
  `mailfrom` varchar(100) DEFAULT NULL,
  `mailsubject` varchar(255) DEFAULT NULL,
  `message` text,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_subjects`
--

INSERT INTO `mail_subjects` (`mail_id`, `from_id`, `mailfrom`, `mailsubject`, `message`, `status`) VALUES
(1, 'service.atkinsons@gmail.com', 'Administrator', 'Verify your e-mail address', '<div>Dear [FIRSTNAME],</div><div>Your account has been successfully created.</div><br><div>Please click the below link to activate your account;</div><div>Email : [EMAIL]</div><br><div>Copy and paste this link to your browser for active your account:</div></div>[URL]</div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminmail</div><div>Thanks and Regards</div><div>Admin #sitename</div>', '1'),
(2, 'service.atkinsons@gmail.com', 'Administrator', 'Account Information', '<div>Dear [FIRSTNAME],</div><div>This is to confirm that your account verification has successfully done in #sitename. Now you can login using your User Name and Password.</div><br><div>The following are your login details</div><div>Username : [USERNAME]</div><div>Password : [PASSWORD]</div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</div><br><div>Thanks and Regards</div><div>AtKinSons Support Team</div><div>#sitename</div>', '1'),
(3, 'service.atkinsons@gmail.com', 'Administrator', 'Retreive Password', '<div>Dear [FIRSTNAME],</div><div>Your account Details has been retrieved Successfully.</div><br><div>The following are your login details</div><div>Username : [USERNAME]</div><div>Password  : [PASSWORD] </div><br><div>If you have any questions about your account or any other matter, <br/>please feel free to contact us at #adminemill</div><div>Thanks and Regards</div><div>Admin #sitename</div>', '1'),
(4, 'service.atkinsons@gmail.com', 'Administrator', 'Profile Updated', '<div>Dear [FIRSTNAME],</div><div>Your Profile has been successfully updated.</div><br><div>Please check you profile and account detail.</div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</div><div>Thanks and Regards</div><div>Admin #sitename</div>', '1'),
(5, 'service.atkinsons@gmail.com', 'Accounts', ' Investment Information', '<div>Dear [FIRSTNAME],</div><div>Thank You for your investment with us.</div><br><div>For your convenience, we have included a copy of your Investment below.</div><div>Investment Amount : [AMT] BTC</div><div>Plan Name : [PLAN] </div><div>Payment Mode : [PAYMENT]</div><div>Transaction Id : [transid]</div><br><div>Copy and paste this link to your browser for Login:</div></div>#verfyurl</div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</div><div>Thanks and Regards</div><div>AtKinSons Support Team</div><div>#sitename</div>', '1'),
(6, 'service.atkinsons@gmail.com', 'Accounts', ' Withdrawal Information.', '<div>Dear [FIRSTNAME],</div><div>Your payout request made successfully.</div><br><div>For your convenience, we have included a details of payout request below.</div><div>Payout Amount : [TXTAMT] BTC</div><div>Payout request date : [WITHDRAWDATE]</div><div>Batch Number : [transid]</div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</div><div>Thanks and Regards</div><div>AtKinSons Support Team</div><div>#sitename</div>', '1'),
(7, 'service.atkinsons@gmail.com', 'Administrator', 'Welcome Mail', '<div>Dear [FIRSTNAME],</div><br><div>Congratulations and welcome to the #sitename Program! You have been approved as an #sitename. To access your #sitename account, please click on the following link and enter your username and password as provided below</div><br><div>The following are your login details</div><div>Username : [USERNAME]</div><div>Password : [PASSWORD]</div><div>Your Referal ID : [REFERRAL_ID]</div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</div><div>Thanks and Regards</div><div>Admin #sitename</div>', '1'),
(8, 'service.atkinsons@gmail.com', 'Accounts', 'Deposit', '<div>Hello [FIRSTNAME],</div><br><div>Congratulations and welcome to the #sitename ! Your Deposit has made successfully in #sitename.</div><br><div>The following are your deposit details.</div><div>Amount : #amt BTC</div><div>Payment Gateway : #payement</div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</div><div>Thanks and Regards</div><div>AtKinSons Support Team</div><div>#sitename</div>', '1'),
(9, 'service.atkinsons@gmail.com', 'Accounts', 'Payment Made', '<div>Dear [FIRSTNAME],</div><div>Welcome to the #sitename !This is to confirm you that your payment has made successfully in #sitename.</div><div>The following are your payment details</div><div>Amount : #amt</div><div>Payment Gateway : #payement</div><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</div><br><div>Thanks and Regards</div><div>AtKinSons Support Team</div><div>#sitename</div>', '1'),
(10, 'service.atkinsons@gmail.com', 'Accounts', 'Withdrawal', '<div>Hello [FIRSTNAME],</div><br><div>Your payout request made successfully.</div><br><div>For your convenience, we have included a details of payout below.</div><div>Payout Amount : [TXTAMT] BTC</div><div>Payout date : [WITHDRAWDATE]</div><div>Batch Number : [transid]</div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at #adminemill</div><div>Thanks and Regards</div><div>AtKinSons Support Team</div><div>#sitename</div>', '1'),
(11, 'service.atkinsons@gmail.com', 'Accounts', 'Withdrawcode', '<div>Hello [FIRSTNAME],</div><div>We have received a request from your User ID [FIRSTNAME]. This is a double protection email to cross check the authenticity of this operation.</div><div>You are required to enter the code below in the back office to verify this operation.</div><br><div>The following are your verification code</div><div>Verification code : [Excode]</div><div>IP Addres : [Addr]</div><div>Date & Time : [Date]</div><br><div>Thanks and Regards</div><div>Admin #sitename</div>', '1'),
(12, 'service.atkinsons@gmail.com', 'Accounts', 'Bonus', '<div>Dear [FIRSTNAME],</div><br><div>You have received  Bonus Amount  : [AMT]  from admin </div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at [adminmail]</div>', '1'),
(13, 'service.atkinsons@gmail.com', 'Accounts', 'Penalty', '<div>Dear [FIRSTNAME],</div><br><div>You have received  Penalty  Amount  : [AMT]  from admin </div><br><div>If you have any questions about your account or any other matter, please feel free to contact us at [adminmail]</div>', '1'),
(14, 'service.atkinsons@gmail.com', 'Accounts', 'Ticket', '<div>Dear [FIRSTNAME],<div>Ticket From #sitename </div><br>\r\n<div>Ticket Number : #ticketno</div><div>Subject: #subject</div><div>Status: #status</div><div>Message: #content</div><div>Thanks and Regards</div><div>Admin</div>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mandatory_list`
--

CREATE TABLE `mandatory_list` (
  `id` int(11) NOT NULL,
  `process_id` int(11) DEFAULT NULL,
  `column_name` varchar(100) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mandatory_list`
--

INSERT INTO `mandatory_list` (`id`, `process_id`, `column_name`, `status`) VALUES
(1, 1, 'First Name', '0'),
(2, 1, 'Last Name', '0'),
(3, 1, 'Country', '0'),
(4, 1, 'Email ID', '1'),
(5, 1, 'User Name', '1'),
(6, 1, 'Password', '1'),
(7, 1, 'Confirm Password', '1'),
(8, 1, 'Terms and Conditions', '1');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(20) NOT NULL,
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
  `suspend_time` datetime DEFAULT NULL,
  `cron_date` datetime DEFAULT NULL,
  `last_asscess_ip` varchar(30) DEFAULT NULL,
  `current_asscess_ip` varchar(30) DEFAULT NULL,
  `current_login_time` datetime DEFAULT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `readable_pass` varchar(550) NOT NULL,
  `is_sufficient` int(1) NOT NULL DEFAULT '0' COMMENT '1= not sufficient, 0=sufficient'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `username`, `password`, `member_name`, `member_email`, `intro_id`, `address1`, `address2`, `city`, `state`, `zipcode`, `country`, `ccode`, `phone`, `date_of_join`, `account_no`, `payment_method`, `lastname`, `gender`, `dob`, `ip_address`, `status`, `verification_code`, `verified`, `ip_code`, `new_ip`, `lr_num`, `payza_num`, `ego_num`, `pm_num`, `gdb_num`, `st_pay`, `paypal`, `bitcoin`, `payeer`, `neteller`, `neteller_key`, `skrill`, `advcash`, `first_name`, `last_name`, `zip_code`, `bank_name`, `accnum`, `bank_branch`, `bank_code`, `bank_zipcode`, `bank_country`, `bank_state`, `bank_city`, `question`, `answer`, `street`, `liberty`, `payza`, `bank_wire`, `refer_id`, `onlinestatus`, `nametitle`, `suspend_time`, `cron_date`, `last_asscess_ip`, `current_asscess_ip`, `current_login_time`, `last_login_time`, `readable_pass`, `is_sufficient`) VALUES
(1, 'testrep', 'TVRJek5EVTI=', NULL, 'test@test.com', 0, NULL, NULL, 'budbud', 'uganda city', '', '221', NULL, NULL, '2020-05-24 04:00:00', NULL, NULL, NULL, 'Male', '1987-06-16', NULL, 'active', NULL, 'yes', NULL, NULL, '0>', NULL, NULL, '0', '', '0', '0', 'abscd123', '0', '0', NULL, '0', '0', 'Test Representative', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is the first name of your favorite uncle?', 'janina', 'kaula', NULL, NULL, NULL, 'KCF4A4EED06F', NULL, NULL, '2020-09-01 13:22:25', NULL, NULL, NULL, NULL, NULL, '123456', 0),
(2, 'papon', 'TVRJek5EVTI=', NULL, 'riad.excel@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-24 10:06:31', NULL, NULL, NULL, NULL, NULL, '182.48.68.243', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'zxvggg55ff', NULL, NULL, NULL, NULL, NULL, 'Khan papon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is the first name of your favorite uncle?', 'janina', NULL, NULL, NULL, NULL, 'JSLG0AI6AI65', NULL, NULL, '2020-07-01 10:24:47', '2020-11-19 13:10:10', NULL, NULL, NULL, NULL, '123456', 0),
(97, 'Ashik', 'TVRJek5EVTI=', NULL, 'raisulislam.50@gmail.com', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-30 08:29:09', NULL, NULL, NULL, NULL, NULL, '27.147.161.214', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bitcoin', NULL, NULL, NULL, NULL, NULL, 'Raisul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is the first name of your favorite uncle?', 'Pizza', NULL, NULL, NULL, NULL, 'sEK61KG8iFK8', NULL, NULL, NULL, '2020-11-19 13:10:10', NULL, NULL, NULL, NULL, '123456', 0),
(107, 'Turali', 'TVRJek5EVTI=', NULL, 'noreply.atkinsons@gmail.com', 104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-20 08:37:13', NULL, NULL, NULL, NULL, NULL, '27.147.161.214', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1234124142', NULL, NULL, NULL, NULL, NULL, 'Bamsi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is your oldest childs nickname?', 'no', NULL, NULL, NULL, NULL, 'EAG246IK9FM2', NULL, NULL, NULL, '2020-11-19 13:10:10', NULL, NULL, NULL, NULL, '123456', 0),
(108, 'jonson', 'TVRFeE1URXg=', NULL, 'gold1990EG@protonmail.com', 107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-20 08:41:19', NULL, NULL, NULL, NULL, NULL, '45.9.249.67', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1111', NULL, NULL, NULL, NULL, NULL, 'jack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is the first name of your favorite uncle?', 'kkkkk', NULL, NULL, NULL, NULL, 'nt9P7S2I9JE9', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111111', 0),
(109, '3sy56xhk8jp', 'TVRFeE1URXg=', NULL, 'jonson1173tanaka@gmail.com', 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-20 08:46:00', NULL, NULL, NULL, NULL, NULL, '45.9.249.67', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1111', NULL, NULL, NULL, NULL, NULL, 'jack2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is the first name of your favorite uncle?', '11111', NULL, NULL, NULL, NULL, 'AIn4I7itG416', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '111111', 0),
(112, 'ys', 'UVhKMWMzVXdNekV3', NULL, 'nobu0310@hotmail.co.jp', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-23 06:32:09', NULL, NULL, NULL, NULL, NULL, '60.113.105.96', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '18SrMTJ8oYVsg2Bh83gmQxwbfFVNd5k7NA', NULL, NULL, NULL, NULL, NULL, 'YASUNOBU OBARA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is your oldest cousins name?', 'OBANA', NULL, NULL, NULL, NULL, 'AYSAL3i96sss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Arusu0310', 0),
(113, 'tomato', 'UVhKcFoyRjBiM1V4TVE9PQ==', NULL, 'sugiyamahisano@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-26 05:03:25', NULL, NULL, NULL, NULL, NULL, '218.225.237.0', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, 'sugiyamahisano', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is the first name of your favorite aunt?', 'tomato', NULL, NULL, NULL, NULL, 'RYK6O3s0434L', NULL, NULL, NULL, '2020-11-19 13:10:10', NULL, NULL, NULL, NULL, 'Arigatou11', 0),
(114, 'sakutake', 'YzJGcmRYUmhhMlUyTkhNPQ==', NULL, 'sakusaku6309@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-27 04:37:27', NULL, NULL, NULL, NULL, NULL, '126.179.250.246', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc', NULL, NULL, NULL, NULL, NULL, 'yaeko takeda ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is your oldest cousins name?', 'yamaguti', NULL, NULL, NULL, NULL, 'KS5IOA27NiPK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sakutake64s', 0),
(115, 'kirara55', 'YzNOME1EVXlPUT09', NULL, 'kirarahime555@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-28 05:06:13', NULL, NULL, NULL, NULL, NULL, '126.141.218.163', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc', NULL, NULL, NULL, NULL, NULL, 'shoko watanabe ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is your oldest childs nickname?', 'kyouwaginkou', NULL, NULL, NULL, NULL, 'SYFK4n9In18n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sst0529', 0),
(116, 'swan0093', 'ZVdGbmRXTm9hVEV3TURNPQ==', NULL, 'diondion20090830@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-30 08:42:47', NULL, NULL, NULL, NULL, NULL, '218.225.238.149', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, 'Shoko Suzuki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Where did you spend your honeymoon?', 'ebarabyouin', NULL, NULL, NULL, NULL, 'oKn279On3NF3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yaguchi1003', 0),
(117, 'chie', 'WTJocFpXTm9ZVzQw', NULL, 'airuman1111@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-02 01:36:33', NULL, NULL, NULL, NULL, NULL, '106.128.125.61', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'abc', NULL, NULL, NULL, NULL, NULL, 'kubota chie', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is your oldest cousins name?', 'hujibayashi', NULL, NULL, NULL, NULL, 'JJN1581St286', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'chiechan4', 0),
(118, 'sade', 'YzJGa1pUWTVNek09', NULL, 'etsukokamebuchi@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-04 09:02:51', NULL, NULL, NULL, NULL, NULL, '120.75.159.168', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6933', NULL, NULL, NULL, NULL, NULL, 'Kamebuchiã€€Etsuko', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is your oldest cousins name?', 'seo', NULL, NULL, NULL, NULL, 'Xi4i02Nn417i', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sade6933', 0),
(119, '4050', 'YlhWcmRYSmxielF3TlRBPQ==', NULL, 'mukureo4050@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 06:08:40', NULL, NULL, NULL, NULL, NULL, '126.177.166.107', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0913', NULL, NULL, NULL, NULL, NULL, 'kazumi ohta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is the first name of your favorite uncle?', 'kimetunoyaiba', NULL, NULL, NULL, NULL, 'AiM6nnO50n3I', NULL, NULL, NULL, '2020-11-19 13:10:10', NULL, NULL, NULL, NULL, 'mukureo4050', 0),
(120, 'msk37', 'YlhOck5EVXdPVEE9', NULL, 'msk3737@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-06 08:05:37', NULL, NULL, NULL, NULL, NULL, '126.168.6.190', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'msk', NULL, NULL, NULL, NULL, NULL, 'MASAKI KONDO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Where did you spend your honeymoon?', 'Umi', NULL, NULL, NULL, NULL, 'YH7EoMSG7346', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'msk45090', 0),
(122, 'makochi629', 'YldGcmIyTm9hVFl5T1E9PQ==', NULL, 'makochi629@gmail.com', 109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-11-17 06:01:13', NULL, NULL, NULL, NULL, NULL, '125.30.148.33', 'active', NULL, 'yes', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'makochi629', NULL, NULL, NULL, NULL, NULL, 'makoto ikeno', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'What is your oldest cousins name?', 'miyazaki', NULL, NULL, NULL, NULL, 'Sn90877977AM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'makochi629', 0);

-- --------------------------------------------------------

--
-- Table structure for table `meta_info`
--

CREATE TABLE `meta_info` (
  `meta_id` int(20) NOT NULL,
  `meta_keyword` text,
  `meta_desc` text,
  `meta_title` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meta_info`
--

INSERT INTO `meta_info` (`meta_id`, `meta_keyword`, `meta_desc`, `meta_title`) VALUES
(1, 'investment, yield, high, reliable information, investors, e-currency', 'Doctors first discovered coronavirus disease (COVID-19) at the end of 2019. It is an illness related to the lungs. It’s caused by a virus that can spread quickly from person to person and can be picked up from surfaces. In some people, it can be severe, leading to pneumonia or even death. Since COVIF-19 is new, there is no cure or vaccine for it at this time.', 'GoldCoin');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `dt` datetime DEFAULT NULL,
  `news_header` varchar(100) DEFAULT NULL,
  `news_description` text,
  `status` enum('on','off') DEFAULT 'on'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `dt`, `news_header`, `news_description`, `status`) VALUES
(1, '2012-05-30 08:02:05', 'ARM HYIP', 'launched our new ARM HYIP Monitor Site <br><br>&nbsp;Thanks for visiting, and we will be in touch soon &nbsp;							\r\n						', 'on');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(20) NOT NULL,
  `email` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offlinepay`
--

CREATE TABLE `offlinepay` (
  `deposit_id` int(11) NOT NULL,
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
  `status` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parterners`
--

CREATE TABLE `parterners` (
  `parter_id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email_id` varchar(200) DEFAULT NULL,
  `eexness_account` varchar(200) DEFAULT NULL,
  `ib_application` text,
  `date_time` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `uid`, `created_at`, `status`) VALUES
(1, 'raisulislam.49857@gmail.com', '951601454505', '2020-09-30 14:28:25', 0),
(2, 'raisulislam.50@gmail.com', '971601454579', '2020-09-30 14:29:39', 0),
(3, 'raisulislam.50@gmail.com', '971601454713', '2020-09-30 14:31:53', 0),
(4, 'raisulislam.50@gmail.com', '971601467993', '2020-09-30 18:13:13', 0),
(5, 'raisulislam.50@gmail.com', '971601469479', '2020-09-30 18:37:59', 0),
(6, 'khchow@excelcobd.com', '961601470481', '2020-09-30 18:54:41', 0),
(7, 'info@excelcobd.com', '941601474190', '2020-09-30 19:56:30', 0),
(8, 'raisulislam.50@gmail.com', '971601530458', '2020-10-01 11:34:18', 0),
(9, 'raisulislam.50@gmail.com', '971601531706', '2020-10-01 11:55:06', 0),
(10, 'raisulislam.50@gmail.com', '971601531816', '2020-10-01 11:56:56', 0),
(11, 'raisulislam.50@gmail.com', '971601531913', '2020-10-01 11:58:33', 0),
(12, 'raisulislam.50@gmail.com', '971601531926', '2020-10-01 11:58:46', 0),
(13, 'raisulislam.50@gmail.com', '971601532177', '2020-10-01 12:02:57', 0),
(14, 'raisulislam.50@gmail.com', '971601533020', '2020-10-01 12:17:00', 0),
(15, 'raisulislam.50@gmail.com', '971601533703', '2020-10-01 12:28:23', 1),
(16, 'raisulislam.50@gmail.com', '971601533788', '2020-10-01 12:29:48', 1),
(17, 'raisulislam.50@gmail.com', '971601533918', '2020-10-01 12:31:58', 1),
(18, 'raisulislam.50@gmail.com', '971601560448', '2020-10-01 19:54:08', 1),
(19, 'raisulislam.50@gmail.com', '971601617967', '2020-10-02 11:52:47', 1),
(20, 'raisulislam.50@gmail.com', '971601618243', '2020-10-02 11:57:23', 1),
(21, 'raisulislam.50@gmail.com', '971601620149', '2020-10-02 12:29:09', 0),
(22, 'raisulislam.50@gmail.com', '971601620184', '2020-10-02 12:29:44', 1),
(23, 'raisulislam.50@gmail.com', '971601633586', '2020-10-02 16:13:06', 1),
(24, 'bashar@excelcobd.com', '1041601652275', '2020-10-02 21:24:35', 0),
(25, 'diondion20090830@gmail.com', '1161604392198', '2020-11-03 08:29:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pass_saver`
--

CREATE TABLE `pass_saver` (
  `id` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `enc_password` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `intro_id` int(11) NOT NULL,
  `bitcoin` varchar(450) COLLATE utf8_unicode_ci NOT NULL,
  `question` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `answer` varchar(450) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pass_saver`
--

INSERT INTO `pass_saver` (`id`, `username`, `user_email`, `password`, `enc_password`, `country_id`, `intro_id`, `bitcoin`, `question`, `answer`) VALUES
(1, 'testrep', 'test@test.com', '123456', 'TVRJek5EVTI=', 0, 0, 'adadda', 'What is the first name of your favorite uncle?', 'test'),
(2, 'papon', 'riad.excel@gmail.com', '123456', 'TVRJek5EVTI=', 0, 0, 'asdasdasd', 'What is the first name of your favorite uncle?', 'test'),
(70, 'ertu', 'bashar@excelcobd.com', '123456', 'TVRJek5EVTI=', 0, 0, 'adasd', 'What is the first name of your favorite uncle?', 'no'),
(71, 'test1001', 'raisulislam.10017@gmail.com', '123456', 'TVRJek5EVTI=', 0, 0, 'Bitcoin', 'What is the first name of your favorite uncle?', 'erereews'),
(72, 'test1002', 'raisulislam.1002@gmail.com', '123456', 'TVRJek5EVTI=', 0, 0, 'Bitcoin', 'What is the first name of your favorite uncle?', 'Pizza');

-- --------------------------------------------------------

--
-- Table structure for table `payment_process`
--

CREATE TABLE `payment_process` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(100) DEFAULT '',
  `status` enum('on','off') DEFAULT 'on',
  `amount` varchar(50) DEFAULT '0',
  `batch_id` varchar(500) DEFAULT '',
  `account_id` varchar(50) DEFAULT '',
  `buy_form_code` longtext,
  `withdraw_option` int(2) DEFAULT NULL COMMENT '0-manual,1-instant',
  `spwd` varchar(100) DEFAULT NULL,
  `mpwd` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_process`
--

INSERT INTO `payment_process` (`payment_id`, `payment_name`, `status`, `amount`, `batch_id`, `account_id`, `buy_form_code`, `withdraw_option`, `spwd`, `mpwd`) VALUES
(1, 'E-Gold', 'off', '0', '', '', '', 0, '', ''),
(2, 'Int-Gold', 'off', '0', '', '', '', 0, '', ''),
(3, 'Paypal', 'off', '0', '', '', '', 1, '', ''),
(4, 'Strompay', 'off', '0', '', '', '', 0, '', ''),
(5, 'E-Bullion', 'off', '0', '', '', '', 0, '', ''),
(6, 'Money Bookers', 'off', '0', '', '', '', 0, '', ''),
(7, 'Payza', 'on', '0', '', '', '', 1, '', ''),
(8, 'Liberty reserve', 'off', '0', '', '', '', 0, '', ''),
(9, 'Safe Pay', 'off', '0', '', '', '', 0, '', ''),
(10, 'Pecunix', 'off', '0', '', '', '', 0, '', ''),
(11, 'Perfect Money', 'off', '0', '', '', '', 0, '', ''),
(12, 'Reinvest Option', 'on', '0', '', '', '', 0, '', ''),
(13, 'Bank Wire', 'off', '0', '', '', '', 0, '', ''),
(14, 'Beneficiary Account Number', 'off', '0', '', '', '', 0, '', ''),
(15, 'Beneficiary Bank Name', 'off', '0', '', '', '', 0, '', ''),
(16, 'Routing Transfer Number (or) SWIFT Code (BIC)', 'off', '0', '', '', '', 0, '', ''),
(17, 'Bank Address', 'off', '0', '', '', '', 0, '', ''),
(18, 'Bank City', 'off', '0', '', '', '', 0, '', ''),
(19, 'Bank State/Province', 'off', '0', '', '', '', 0, '', ''),
(20, 'Bank ZipCode', 'off', '0', '', '', '', 0, '', ''),
(21, 'Bank Country', 'off', '0', '', '', '', 0, '', ''),
(22, 'Bank Wire', 'on', '0', '', '', '', 0, '', ''),
(23, 'GDB ', 'off', '0', '', '', '', 0, '', ''),
(24, 'Liberty Reserve Store Name', 'on', '0', '', 'demo1', '', 0, '', ''),
(25, 'Liberty Reserve Store Security Word', 'on', '0', '', 'demo1', '', 0, '', ''),
(26, 'Perfect Money Phrase Hash', 'on', '0', '', '', '', 0, '', ''),
(27, 'Payza Security Word', 'on', '0', '', '5645646', '', 0, '', ''),
(28, 'Solid Trust Pay', 'off', '0', '', '', '', 0, '', ''),
(29, 'Solid Trust Pay Secondary Password', 'on', '0', '', '', '', 0, '', ''),
(30, 'Egopay', 'on', '0', '', '', '', 1, '', ''),
(31, 'egopay storepassword', 'on', '0', '', '', '', 0, '', ''),
(32, 'egopay storeid', 'on', '0', '', '', '', 0, '', ''),
(33, 'Egopay Store Name', 'on', '0', '', 'demo', '', 0, '', ''),
(34, 'Egopay Account Name', 'on', '0', '', 'acc name', '', 0, '', ''),
(35, 'Ego API ID', 'on', '0', '', 'app id', '', 0, '', ''),
(36, 'Egopay API Password', 'on', '0', '', 'api password', '', 0, '', ''),
(37, 'STP Button Name', 'on', '0', '', '', '', 0, '', ''),
(38, 'Bit Coin', 'on', '0', '2039e17a134824d9f9cC844E22Ca72d65F2e2b38980591B3B1B10852Fc351A77', '31d257c75d9277766ed7690187b860f0', '0ea2a56f9a86453d2324ef986d1b15afa88fd9c747554307dc32e06a55a36810', 0, '', ''),
(39, 'Payeer', 'off', '', '', '', '', 0, '', ''),
(40, 'neteller', 'off', '0', '', '', '', 1, '', ''),
(41, 'Skrill', 'off', '0', '', '', '', 1, '', ''),
(42, 'Advcash', 'off', '0', '', '', '', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pay_period`
--

CREATE TABLE `pay_period` (
  `pay_period_id` int(11) NOT NULL,
  `period` varchar(50) DEFAULT NULL,
  `status` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_period`
--

INSERT INTO `pay_period` (`pay_period_id`, `period`, `status`) VALUES
(1, 'Daily', 1),
(2, 'Weekly', 1),
(3, 'Monthly', 1),
(4, 'Yearly', 1),
(5, 'Hourly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pay_transaction`
--

CREATE TABLE `pay_transaction` (
  `deposit_id` int(11) DEFAULT NULL,
  `trans_amount` int(11) DEFAULT NULL,
  `trans_userid` int(11) DEFAULT NULL,
  `trans_batchnumber` int(11) DEFAULT NULL,
  `trans_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL,
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
  `release_status` enum('on','off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `package_id`, `plan_type`, `scheme`, `spend_min_amount`, `spend_max_amount`, `period`, `period_type`, `interest`, `intrest_period`, `iperiod_type`, `max_interest`, `plan_level`, `withdrawal_type`, `bonus_status`, `bonus_per`, `interest_type`, `release_status`) VALUES
(3, 0, 'BRONZE', NULL, 0.10000000, 3.99000000, 180, '1', NULL, 1, '1', 0.70000000, '', '', 'no', 0.00000000, 2, 'off'),
(5, 0, 'SILVER', NULL, 4.00000000, 7.99000000, 180, '1', NULL, 1, '1', 0.90000000, '', '', 'no', 0.00000000, 2, 'off'),
(6, 0, 'GOLD', NULL, 8.00000000, 15.99000000, 180, '1', NULL, 1, '1', 1.20000000, '', '', 'no', 0.00000000, 2, 'off'),
(7, 0, 'PLATINUM', NULL, 16.00000000, 31.99000000, 365, '1', NULL, 1, '1', 1.50000000, '', '', 'no', 0.00000000, 2, 'off'),
(13, 0, 'BLACK', NULL, 32.00000000, 500.00000000, 365, '1', NULL, 1, '1', 1.70000000, '', '', 'no', 0.00000000, 2, 'off');

-- --------------------------------------------------------

--
-- Table structure for table `plan_master`
--

CREATE TABLE `plan_master` (
  `id` int(11) NOT NULL,
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
  `delay_days` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL,
  `process_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `process_name`) VALUES
(1, 'Sign Up');

-- --------------------------------------------------------

--
-- Table structure for table `promotional`
--

CREATE TABLE `promotional` (
  `banner_id` int(11) NOT NULL,
  `banner_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `banner_status` enum('active','suspend') CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotional`
--

INSERT INTO `promotional` (`banner_id`, `banner_image`, `banner_status`) VALUES
(1, 'uploadimages/20161007101118976in.png', 'active'),
(2, 'uploadimages/20161006194831714tick-circle.png', 'active'),
(3, 'uploadimages/20170109115124407BTbanner1.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `query_id` int(5) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(5) DEFAULT NULL,
  `qsub` varchar(50) DEFAULT NULL,
  `qmessage` text,
  `datetime` date DEFAULT NULL,
  `query_from` varchar(25) DEFAULT NULL,
  `query_to` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rate_us`
--

CREATE TABLE `rate_us` (
  `rate_id` int(11) NOT NULL,
  `rate_code` text CHARACTER SET latin1 COLLATE latin1_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `representative`
--

CREATE TABLE `representative` (
  `rep_id` bigint(20) NOT NULL,
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
  `member_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `representatives`
--

CREATE TABLE `representatives` (
  `id` int(11) NOT NULL,
  `full_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `email_atq` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `contact_email` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `other_messenger` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `your_experience` text COLLATE utf8_unicode_ci NOT NULL,
  `intro_id` int(11) NOT NULL,
  `status` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `entry_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `representative_level_commission`
--

CREATE TABLE `representative_level_commission` (
  `id` int(11) NOT NULL,
  `level_name` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `level_commission` double(30,8) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `representative_level_commission`
--

INSERT INTO `representative_level_commission` (`id`, `level_name`, `level_commission`, `status`) VALUES
(1, 'Level-01', 20.00000000, 1),
(2, 'Level-02', 3.00000000, 1),
(3, 'Level-03', 1.00000000, 1),
(4, 'Level-04', 1.00000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `representative_referal`
--

CREATE TABLE `representative_referal` (
  `id` int(11) NOT NULL,
  `rep_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `ref_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sitebanner`
--

CREATE TABLE `sitebanner` (
  `id` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sitebanner`
--

INSERT INTO `sitebanner` (`id`, `image`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, '');

-- --------------------------------------------------------

--
-- Table structure for table `site_manager`
--

CREATE TABLE `site_manager` (
  `feature_id` int(11) NOT NULL,
  `feature_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` enum('yes','no') DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_manager`
--

INSERT INTO `site_manager` (`feature_id`, `feature_name`, `description`, `status`) VALUES
(1, 'Advertise', 'User is allowed to Advertise with the Site', 'no'),
(2, 'Article', 'User can Post or View Articles Related to HYIP', 'no'),
(3, 'Affiliates', 'User can Refer Others to the Site and Earn', 'no'),
(4, 'FAQ', 'Frequently Asked Questions about the Site', 'yes'),
(5, 'Latest News', 'Lastest News in the Site', 'yes'),
(6, 'Site Statistics', 'Showing Site Statistics to the User', 'yes'),
(7, 'Polling', 'Conduct and Manage Polls', 'no'),
(8, 'Contact Us', 'User contact to the administrator', 'yes'),
(9, 'Release Deposit', 'Releasing the Deposit option for the user', 'no'),
(10, 'Forum', 'A Forum About HYIP', 'yes'),
(11, 'I/P Check', 'Performs I/P Address Check while Registration', 'no'),
(12, 'Turing Code', 'Perform Turing Code validation while login/signup', 'no'),
(13, 'Unique Mail ID', 'Unique Signup Mail ID', 'yes'),
(14, 'Daily', 'Daily Interest', 'yes'),
(15, 'Weekly', 'Weekly Interest', 'yes'),
(16, 'Monthly', 'Monthly Interest', 'yes'),
(17, 'Yearly', 'Yearly Interest', 'yes'),
(18, 'Signup Referral Commission', 'Send referral commision to the referer while joining new user', 'no'),
(19, 'Commission in %', 'send commision to the referer in %', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `site_statistics`
--

CREATE TABLE `site_statistics` (
  `stat_id` int(11) NOT NULL,
  `site_stat` varchar(100) DEFAULT NULL,
  `site_val` varchar(100) DEFAULT NULL,
  `status` enum('on','off') DEFAULT 'on',
  `mode` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_statistics`
--

INSERT INTO `site_statistics` (`stat_id`, `site_stat`, `site_val`, `status`, `mode`) VALUES
(1, 'Site Started', '2017-1-1', 'off', 1),
(2, 'Days Running', '247', 'on', 1),
(3, 'Total Users', '1', 'on', 1),
(4, 'Total Deposit', '4', 'on', 1),
(5, 'Total Earned', '6456', 'on', 1),
(6, 'Total Ref.Commission', '5', 'on', 1),
(7, 'Total Withdrawn', '1', 'on', 1),
(8, 'Percentage Withdrawn', '2', 'on', 1),
(9, 'Current Available Funds', '5.26678', 'on', 1),
(10, 'Users Registered Today', '1234', 'on', 1),
(11, 'Deposit Made Today', '25', 'on', 1),
(12, 'Last Update', '2006-2-15', 'on', 1),
(14, 'Compounding', 'Compounding', 'off', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_deposit`
--

CREATE TABLE `sub_deposit` (
  `sub_deposit_id` int(30) NOT NULL,
  `deposit_id` int(30) DEFAULT NULL,
  `deposit_amt` double(30,8) DEFAULT NULL,
  `deposit_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE `tbl_footer` (
  `footer_id` int(11) NOT NULL,
  `footer_details` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`footer_id`, `footer_details`) VALUES
(1, 'Â© 2016 Arm-Hyip');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hits`
--

CREATE TABLE `tbl_hits` (
  `hits_id` int(11) NOT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `session_id` varchar(100) DEFAULT NULL,
  `hit_date` datetime DEFAULT NULL,
  `online_status` int(11) NOT NULL DEFAULT '0',
  `member_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ip`
--

CREATE TABLE `tbl_ip` (
  `id` bigint(20) NOT NULL,
  `admin_id` bigint(20) DEFAULT NULL,
  `user_ip` varchar(50) DEFAULT NULL,
  `ip_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `test` text COLLATE utf8_unicode_ci,
  `tm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `test`, `tm`) VALUES
(1, 'test log-2020-09-17 17:34:20', '2020-09-17 17:34:20'),
(2, 'test log-2020-09-17 17:40:01', '2020-09-17 17:40:01'),
(3, 'test log-2020-09-18 10:00:01', '2020-09-18 10:00:01'),
(4, 'test log-2020-09-21 15:55:41', '2020-09-21 15:55:41'),
(5, 'test log-2020-09-21 15:56:52', '2020-09-21 15:56:52'),
(6, 'test log-2020-09-22 13:31:50', '2020-09-22 13:31:50'),
(7, 'test log-2020-09-22 14:00:01', '2020-09-22 14:00:01'),
(8, 'test log-2020-09-22 15:00:01', '2020-09-22 15:00:01'),
(9, 'test log-2020-09-22 15:30:01', '2020-09-22 15:30:01'),
(10, 'test log-2020-09-22 16:00:01', '2020-09-22 16:00:01'),
(11, 'test log-2020-09-22 16:30:01', '2020-09-22 16:30:01'),
(12, 'test log-2020-09-22 17:00:01', '2020-09-22 17:00:01'),
(13, 'test log-2020-09-22 17:30:01', '2020-09-22 17:30:01'),
(14, 'test log-2020-09-22 18:00:01', '2020-09-22 18:00:01'),
(15, 'test log-2020-09-22 18:30:02', '2020-09-22 18:30:02'),
(16, 'test log-2020-09-22 19:00:01', '2020-09-22 19:00:01'),
(17, 'test log-2020-09-22 19:30:01', '2020-09-22 19:30:01'),
(18, 'test log-2020-09-22 20:00:01', '2020-09-22 20:00:01'),
(19, 'test log-2020-09-22 20:30:01', '2020-09-22 20:30:01'),
(20, 'test log-2020-09-22 21:00:01', '2020-09-22 21:00:01'),
(21, 'test log-2020-09-22 21:30:02', '2020-09-22 21:30:02'),
(22, 'test log-2020-09-22 22:00:01', '2020-09-22 22:00:01'),
(23, 'test log-2020-09-22 22:30:01', '2020-09-22 22:30:01'),
(24, 'test log-2020-09-22 23:00:01', '2020-09-22 23:00:01'),
(25, 'test log-2020-09-22 23:30:01', '2020-09-22 23:30:01'),
(26, 'test log-2020-09-23 00:00:01', '2020-09-23 00:00:01'),
(27, 'test log-2020-09-23 00:30:01', '2020-09-23 00:30:01'),
(28, 'test log-2020-09-23 01:00:01', '2020-09-23 01:00:01'),
(29, 'test log-2020-09-23 01:30:01', '2020-09-23 01:30:01'),
(30, 'test log-2020-09-23 02:00:01', '2020-09-23 02:00:01'),
(31, 'test log-2020-09-23 02:30:01', '2020-09-23 02:30:01'),
(32, 'test log-2020-09-23 03:00:01', '2020-09-23 03:00:01'),
(33, 'test log-2020-09-23 03:30:01', '2020-09-23 03:30:01'),
(34, 'test log-2020-09-23 04:00:01', '2020-09-23 04:00:01'),
(35, 'test log-2020-09-23 04:30:01', '2020-09-23 04:30:01'),
(36, 'test log-2020-09-23 05:00:02', '2020-09-23 05:00:02'),
(37, 'test log-2020-09-23 05:30:01', '2020-09-23 05:30:01'),
(38, 'test log-2020-09-23 06:00:01', '2020-09-23 06:00:01'),
(39, 'test log-2020-09-23 06:30:01', '2020-09-23 06:30:01'),
(40, 'test log-2020-09-23 07:00:01', '2020-09-23 07:00:01'),
(41, 'test log-2020-09-23 07:30:01', '2020-09-23 07:30:01'),
(42, 'test log-2020-09-23 08:00:02', '2020-09-23 08:00:02'),
(43, 'test log-2020-09-23 08:30:02', '2020-09-23 08:30:02'),
(44, 'test log-2020-09-23 09:00:01', '2020-09-23 09:00:01'),
(45, 'test log-2020-09-23 09:30:01', '2020-09-23 09:30:01'),
(46, 'test log-2020-09-23 10:00:01', '2020-09-23 10:00:01'),
(47, 'test log-2020-09-23 10:30:01', '2020-09-23 10:30:01'),
(48, 'test log-2020-09-23 11:00:01', '2020-09-23 11:00:01'),
(49, 'test log-2020-09-23 11:30:01', '2020-09-23 11:30:01'),
(50, 'test log-2020-09-23 12:00:01', '2020-09-23 12:00:01'),
(51, 'test log-2020-09-23 12:30:01', '2020-09-23 12:30:01'),
(52, 'test log-2020-09-23 13:00:01', '2020-09-23 13:00:01'),
(53, 'test log-2020-09-23 13:30:01', '2020-09-23 13:30:01'),
(54, 'test log-2020-09-23 14:00:01', '2020-09-23 14:00:01'),
(55, 'test log-2020-09-23 14:30:01', '2020-09-23 14:30:01'),
(56, 'test log-2020-09-23 15:00:01', '2020-09-23 15:00:01'),
(57, 'test log-2020-09-23 15:30:01', '2020-09-23 15:30:01'),
(58, 'test log-2020-09-23 16:00:01', '2020-09-23 16:00:01'),
(59, 'test log-2020-09-23 16:30:01', '2020-09-23 16:30:01'),
(60, 'test log-2020-09-23 17:00:02', '2020-09-23 17:00:02'),
(61, 'test log-2020-09-23 17:30:01', '2020-09-23 17:30:01'),
(62, 'test log-2020-09-23 18:00:01', '2020-09-23 18:00:01'),
(63, 'test log-2020-09-23 18:30:01', '2020-09-23 18:30:01'),
(64, 'test log-2020-09-23 19:00:01', '2020-09-23 19:00:01'),
(65, 'test log-2020-09-23 19:30:01', '2020-09-23 19:30:01'),
(66, 'test log-2020-09-23 20:00:02', '2020-09-23 20:00:02'),
(67, 'test log-2020-09-23 20:30:01', '2020-09-23 20:30:01'),
(68, 'test log-2020-09-23 21:00:01', '2020-09-23 21:00:01'),
(69, 'test log-2020-09-23 21:30:01', '2020-09-23 21:30:01'),
(70, 'test log-2020-09-23 22:00:01', '2020-09-23 22:00:01'),
(71, 'test log-2020-09-23 22:30:01', '2020-09-23 22:30:01'),
(72, 'test log-2020-09-23 23:00:01', '2020-09-23 23:00:01'),
(73, 'test log-2020-09-23 23:30:01', '2020-09-23 23:30:01'),
(74, 'test log-2020-09-24 00:00:01', '2020-09-24 00:00:01'),
(75, 'test log-2020-09-24 00:30:01', '2020-09-24 00:30:01'),
(76, 'test log-2020-09-24 01:00:01', '2020-09-24 01:00:01'),
(77, 'test log-2020-09-24 01:30:01', '2020-09-24 01:30:01'),
(78, 'test log-2020-09-24 02:00:01', '2020-09-24 02:00:01'),
(79, 'test log-2020-09-24 02:30:01', '2020-09-24 02:30:01'),
(80, 'test log-2020-09-24 03:00:01', '2020-09-24 03:00:01'),
(81, 'test log-2020-09-24 03:30:01', '2020-09-24 03:30:01'),
(82, 'test log-2020-09-24 04:00:01', '2020-09-24 04:00:01'),
(83, 'test log-2020-09-24 04:30:01', '2020-09-24 04:30:01'),
(84, 'test log-2020-09-24 05:00:01', '2020-09-24 05:00:01'),
(85, 'test log-2020-09-24 05:30:01', '2020-09-24 05:30:01'),
(86, 'test log-2020-09-24 06:00:01', '2020-09-24 06:00:01'),
(87, 'test log-2020-09-24 06:30:01', '2020-09-24 06:30:01'),
(88, 'test log-2020-09-24 07:00:02', '2020-09-24 07:00:02'),
(89, 'test log-2020-09-24 07:30:01', '2020-09-24 07:30:01'),
(90, 'test log-2020-09-24 08:00:01', '2020-09-24 08:00:01'),
(91, 'test log-2020-09-24 08:30:01', '2020-09-24 08:30:01'),
(92, 'test log-2020-09-24 09:00:01', '2020-09-24 09:00:01'),
(93, 'test log-2020-09-24 09:30:01', '2020-09-24 09:30:01'),
(94, 'test log-2020-09-24 10:00:01', '2020-09-24 10:00:01'),
(95, 'test log-2020-09-24 10:30:01', '2020-09-24 10:30:01'),
(96, 'test log-2020-09-24 11:00:01', '2020-09-24 11:00:01'),
(97, 'test log-2020-09-24 11:30:02', '2020-09-24 11:30:02'),
(98, 'test log-2020-09-24 12:00:01', '2020-09-24 12:00:01'),
(99, 'test log-2020-09-24 12:30:01', '2020-09-24 12:30:01'),
(100, 'test log-2020-09-24 13:00:01', '2020-09-24 13:00:01'),
(101, 'test log-2020-09-24 13:30:01', '2020-09-24 13:30:01'),
(102, 'test log-2020-09-24 14:00:01', '2020-09-24 14:00:01'),
(103, 'test log-2020-09-24 14:30:01', '2020-09-24 14:30:01'),
(104, 'test log-2020-09-24 15:00:01', '2020-09-24 15:00:01'),
(105, 'test log-2020-09-24 15:30:01', '2020-09-24 15:30:01'),
(106, 'test log-2020-09-24 16:00:02', '2020-09-24 16:00:02'),
(107, 'test log-2020-09-24 16:30:02', '2020-09-24 16:30:02'),
(108, 'test log-2020-09-24 17:00:01', '2020-09-24 17:00:01'),
(109, 'test log-2020-09-24 17:30:01', '2020-09-24 17:30:01'),
(110, 'test log-2020-09-24 18:00:01', '2020-09-24 18:00:01'),
(111, 'test log-2020-09-24 18:30:01', '2020-09-24 18:30:01'),
(112, 'test log-2020-09-24 19:00:02', '2020-09-24 19:00:02'),
(113, 'test log-2020-09-24 19:30:01', '2020-09-24 19:30:01'),
(114, 'test log-2020-09-24 20:00:01', '2020-09-24 20:00:01'),
(115, 'test log-2020-09-24 20:30:01', '2020-09-24 20:30:01'),
(116, 'test log-2020-09-24 21:00:01', '2020-09-24 21:00:01'),
(117, 'test log-2020-09-24 21:30:01', '2020-09-24 21:30:01'),
(118, 'test log-2020-09-24 22:00:01', '2020-09-24 22:00:01'),
(119, 'test log-2020-09-24 22:30:01', '2020-09-24 22:30:01'),
(120, 'test log-2020-09-24 23:00:02', '2020-09-24 23:00:02'),
(121, 'test log-2020-09-24 23:30:01', '2020-09-24 23:30:01'),
(122, 'test log-2020-09-25 00:00:01', '2020-09-25 00:00:01'),
(123, 'test log-2020-09-25 00:30:01', '2020-09-25 00:30:01'),
(124, 'test log-2020-09-25 01:00:01', '2020-09-25 01:00:01'),
(125, 'test log-2020-09-25 01:30:01', '2020-09-25 01:30:01'),
(126, 'test log-2020-09-25 02:00:01', '2020-09-25 02:00:01'),
(127, 'test log-2020-09-25 02:30:01', '2020-09-25 02:30:01'),
(128, 'test log-2020-09-25 03:00:01', '2020-09-25 03:00:01'),
(129, 'test log-2020-09-25 03:30:01', '2020-09-25 03:30:01'),
(130, 'test log-2020-09-25 04:00:01', '2020-09-25 04:00:01'),
(131, 'test log-2020-09-25 04:30:01', '2020-09-25 04:30:01'),
(132, 'test log-2020-09-25 05:00:01', '2020-09-25 05:00:01'),
(133, 'test log-2020-09-25 05:30:01', '2020-09-25 05:30:01'),
(134, 'test log-2020-09-25 06:00:02', '2020-09-25 06:00:02'),
(135, 'test log-2020-09-25 06:30:01', '2020-09-25 06:30:01'),
(136, 'test log-2020-09-25 07:00:01', '2020-09-25 07:00:01'),
(137, 'test log-2020-09-25 07:30:01', '2020-09-25 07:30:01'),
(138, 'test log-2020-09-25 08:00:01', '2020-09-25 08:00:01'),
(139, 'test log-2020-09-25 08:30:01', '2020-09-25 08:30:01'),
(140, 'test log-2020-09-25 09:00:01', '2020-09-25 09:00:01'),
(141, 'test log-2020-09-25 09:30:01', '2020-09-25 09:30:01'),
(142, 'test log-2020-09-25 10:00:01', '2020-09-25 10:00:01'),
(143, 'test log-2020-09-25 10:30:01', '2020-09-25 10:30:01'),
(144, 'test log-2020-09-25 11:00:01', '2020-09-25 11:00:01'),
(145, 'test log-2020-09-25 11:30:01', '2020-09-25 11:30:01'),
(146, 'test log-2020-09-25 12:00:01', '2020-09-25 12:00:01'),
(147, 'test log-2020-09-25 12:30:01', '2020-09-25 12:30:01'),
(148, 'test log-2020-09-25 13:00:01', '2020-09-25 13:00:01'),
(149, 'test log-2020-09-25 13:30:01', '2020-09-25 13:30:01'),
(150, 'test log-2020-09-25 14:00:01', '2020-09-25 14:00:01'),
(151, 'test log-2020-09-25 14:30:01', '2020-09-25 14:30:01'),
(152, 'test log-2020-09-25 15:00:01', '2020-09-25 15:00:01'),
(153, 'test log-2020-09-25 15:30:01', '2020-09-25 15:30:01'),
(154, 'test log-2020-09-25 16:00:01', '2020-09-25 16:00:01'),
(155, 'test log-2020-09-25 16:30:01', '2020-09-25 16:30:01'),
(156, 'test log-2020-09-25 17:00:01', '2020-09-25 17:00:01'),
(157, 'test log-2020-09-25 17:30:01', '2020-09-25 17:30:01'),
(158, 'test log-2020-09-25 18:00:01', '2020-09-25 18:00:01'),
(159, 'test log-2020-09-25 18:30:01', '2020-09-25 18:30:01'),
(160, 'test log-2020-09-25 19:00:01', '2020-09-25 19:00:01'),
(161, 'test log-2020-09-25 19:30:01', '2020-09-25 19:30:01'),
(162, 'test log-2020-09-25 20:00:01', '2020-09-25 20:00:01'),
(163, 'test log-2020-09-25 20:30:01', '2020-09-25 20:30:01'),
(164, 'test log-2020-09-25 21:00:01', '2020-09-25 21:00:01'),
(165, 'test log-2020-09-25 21:30:01', '2020-09-25 21:30:01'),
(166, 'test log-2020-09-25 22:00:01', '2020-09-25 22:00:01'),
(167, 'test log-2020-09-25 22:30:02', '2020-09-25 22:30:02'),
(168, 'test log-2020-09-25 23:00:01', '2020-09-25 23:00:01'),
(169, 'test log-2020-09-25 23:30:01', '2020-09-25 23:30:01'),
(170, 'test log-2020-09-26 00:00:01', '2020-09-26 00:00:01'),
(171, 'test log-2020-09-26 00:30:01', '2020-09-26 00:30:01'),
(172, 'test log-2020-09-26 01:00:01', '2020-09-26 01:00:01'),
(173, 'test log-2020-09-26 01:30:01', '2020-09-26 01:30:01'),
(174, 'test log-2020-09-26 02:00:01', '2020-09-26 02:00:01'),
(175, 'test log-2020-09-26 02:30:01', '2020-09-26 02:30:01'),
(176, 'test log-2020-09-26 03:00:01', '2020-09-26 03:00:01'),
(177, 'test log-2020-09-26 03:30:01', '2020-09-26 03:30:01'),
(178, 'test log-2020-09-26 04:00:01', '2020-09-26 04:00:01'),
(179, 'test log-2020-09-26 04:30:02', '2020-09-26 04:30:02'),
(180, 'test log-2020-09-26 05:00:01', '2020-09-26 05:00:01'),
(181, 'test log-2020-09-26 05:30:01', '2020-09-26 05:30:01'),
(182, 'test log-2020-09-26 06:00:01', '2020-09-26 06:00:01'),
(183, 'test log-2020-09-26 06:30:01', '2020-09-26 06:30:01'),
(184, 'test log-2020-09-26 07:00:02', '2020-09-26 07:00:02'),
(185, 'test log-2020-09-26 07:30:01', '2020-09-26 07:30:01'),
(186, 'test log-2020-09-26 08:00:01', '2020-09-26 08:00:01'),
(187, 'test log-2020-09-26 08:30:01', '2020-09-26 08:30:01'),
(188, 'test log-2020-09-26 09:00:01', '2020-09-26 09:00:01'),
(189, 'test log-2020-09-26 09:30:01', '2020-09-26 09:30:01'),
(190, 'test log-2020-09-26 10:00:01', '2020-09-26 10:00:01'),
(191, 'test log-2020-09-26 10:30:01', '2020-09-26 10:30:01'),
(192, 'test log-2020-09-26 11:00:01', '2020-09-26 11:00:01'),
(193, 'test log-2020-09-26 11:30:01', '2020-09-26 11:30:01'),
(194, 'test log-2020-09-26 12:00:01', '2020-09-26 12:00:01'),
(195, 'test log-2020-09-26 12:30:01', '2020-09-26 12:30:01'),
(196, 'test log-2020-09-26 13:00:01', '2020-09-26 13:00:01'),
(197, 'test log-2020-09-26 13:30:01', '2020-09-26 13:30:01'),
(198, 'test log-2020-09-26 14:00:02', '2020-09-26 14:00:02'),
(199, 'test log-2020-09-26 14:30:01', '2020-09-26 14:30:01'),
(200, 'test log-2020-09-26 15:00:01', '2020-09-26 15:00:01'),
(201, 'test log-2020-09-26 15:30:01', '2020-09-26 15:30:01'),
(202, 'test log-2020-09-26 16:00:01', '2020-09-26 16:00:01'),
(203, 'test log-2020-09-26 16:30:01', '2020-09-26 16:30:01'),
(204, 'test log-2020-09-26 17:00:01', '2020-09-26 17:00:01'),
(205, 'test log-2020-09-26 17:30:01', '2020-09-26 17:30:01'),
(206, 'test log-2020-09-26 18:00:01', '2020-09-26 18:00:01'),
(207, 'test log-2020-09-26 18:30:01', '2020-09-26 18:30:01'),
(208, 'test log-2020-09-26 19:00:01', '2020-09-26 19:00:01'),
(209, 'test log-2020-09-26 19:30:01', '2020-09-26 19:30:01'),
(210, 'test log-2020-09-26 20:00:01', '2020-09-26 20:00:01'),
(211, 'test log-2020-09-26 20:30:01', '2020-09-26 20:30:01'),
(212, 'test log-2020-09-26 21:00:01', '2020-09-26 21:00:01'),
(213, 'test log-2020-09-26 21:30:01', '2020-09-26 21:30:01'),
(214, 'test log-2020-09-26 22:00:01', '2020-09-26 22:00:01'),
(215, 'test log-2020-09-26 22:30:01', '2020-09-26 22:30:01'),
(216, 'test log-2020-09-26 23:00:01', '2020-09-26 23:00:01'),
(217, 'test log-2020-09-26 23:30:01', '2020-09-26 23:30:01'),
(218, 'test log-2020-09-27 00:00:01', '2020-09-27 00:00:01'),
(219, 'test log-2020-09-27 00:30:01', '2020-09-27 00:30:01'),
(220, 'test log-2020-09-27 01:00:01', '2020-09-27 01:00:01'),
(221, 'test log-2020-09-27 01:30:01', '2020-09-27 01:30:01'),
(222, 'test log-2020-09-27 02:00:01', '2020-09-27 02:00:01'),
(223, 'test log-2020-09-27 02:30:01', '2020-09-27 02:30:01'),
(224, 'test log-2020-09-27 03:00:01', '2020-09-27 03:00:01'),
(225, 'test log-2020-09-27 03:30:01', '2020-09-27 03:30:01'),
(226, 'test log-2020-09-27 04:00:01', '2020-09-27 04:00:01'),
(227, 'test log-2020-09-27 04:30:01', '2020-09-27 04:30:01'),
(228, 'test log-2020-09-27 05:00:01', '2020-09-27 05:00:01'),
(229, 'test log-2020-09-27 05:30:01', '2020-09-27 05:30:01'),
(230, 'test log-2020-09-27 06:00:01', '2020-09-27 06:00:01'),
(231, 'test log-2020-09-27 06:30:01', '2020-09-27 06:30:01'),
(232, 'test log-2020-09-27 07:00:01', '2020-09-27 07:00:01'),
(233, 'test log-2020-09-27 07:30:01', '2020-09-27 07:30:01'),
(234, 'test log-2020-09-27 08:00:01', '2020-09-27 08:00:01'),
(235, 'test log-2020-09-27 08:30:01', '2020-09-27 08:30:01'),
(236, 'test log-2020-09-27 09:00:01', '2020-09-27 09:00:01'),
(237, 'test log-2020-09-27 09:30:01', '2020-09-27 09:30:01'),
(238, 'test log-2020-09-27 10:00:01', '2020-09-27 10:00:01'),
(239, 'test log-2020-09-27 10:30:01', '2020-09-27 10:30:01'),
(240, 'test log-2020-09-27 11:00:01', '2020-09-27 11:00:01'),
(241, 'test log-2020-09-27 11:30:01', '2020-09-27 11:30:01'),
(242, 'test log-2020-09-27 12:00:01', '2020-09-27 12:00:01'),
(243, 'test log-2020-09-27 12:30:01', '2020-09-27 12:30:01'),
(244, 'test log-2020-09-27 13:00:01', '2020-09-27 13:00:01'),
(245, 'test log-2020-09-27 13:30:01', '2020-09-27 13:30:01'),
(246, 'test log-2020-09-27 14:00:01', '2020-09-27 14:00:01'),
(247, 'test log-2020-09-27 14:30:01', '2020-09-27 14:30:01'),
(248, 'test log-2020-09-27 15:00:01', '2020-09-27 15:00:01'),
(249, 'test log-2020-09-27 15:30:01', '2020-09-27 15:30:01'),
(250, 'test log-2020-09-27 16:00:01', '2020-09-27 16:00:01'),
(251, 'test log-2020-09-27 16:30:01', '2020-09-27 16:30:01'),
(252, 'test log-2020-09-27 17:00:01', '2020-09-27 17:00:01'),
(253, 'test log-2020-09-27 17:30:01', '2020-09-27 17:30:01'),
(254, 'test log-2020-09-27 18:00:02', '2020-09-27 18:00:02'),
(255, 'test log-2020-09-27 18:30:01', '2020-09-27 18:30:01'),
(256, 'test log-2020-09-27 19:00:01', '2020-09-27 19:00:01'),
(257, 'test log-2020-09-27 19:30:01', '2020-09-27 19:30:01'),
(258, 'test log-2020-09-27 20:00:01', '2020-09-27 20:00:01'),
(259, 'test log-2020-09-27 20:30:01', '2020-09-27 20:30:01'),
(260, 'test log-2020-09-27 21:00:01', '2020-09-27 21:00:01'),
(261, 'test log-2020-09-27 21:30:01', '2020-09-27 21:30:01'),
(262, 'test log-2020-09-27 22:00:01', '2020-09-27 22:00:01'),
(263, 'test log-2020-09-27 22:30:01', '2020-09-27 22:30:01'),
(264, 'test log-2020-09-27 23:00:01', '2020-09-27 23:00:01'),
(265, 'test log-2020-09-27 23:30:01', '2020-09-27 23:30:01'),
(266, 'test log-2020-09-28 00:00:01', '2020-09-28 00:00:01'),
(267, 'test log-2020-09-28 00:30:01', '2020-09-28 00:30:01'),
(268, 'test log-2020-09-28 01:00:01', '2020-09-28 01:00:01'),
(269, 'test log-2020-09-28 01:30:01', '2020-09-28 01:30:01'),
(270, 'test log-2020-09-28 02:00:02', '2020-09-28 02:00:02'),
(271, 'test log-2020-09-28 02:30:01', '2020-09-28 02:30:01'),
(272, 'test log-2020-09-28 03:00:01', '2020-09-28 03:00:01'),
(273, 'test log-2020-09-28 03:30:01', '2020-09-28 03:30:01'),
(274, 'test log-2020-09-28 04:00:01', '2020-09-28 04:00:01'),
(275, 'test log-2020-09-28 04:30:01', '2020-09-28 04:30:01'),
(276, 'test log-2020-09-28 05:00:01', '2020-09-28 05:00:01'),
(277, 'test log-2020-09-28 05:30:01', '2020-09-28 05:30:01'),
(278, 'test log-2020-09-28 06:00:01', '2020-09-28 06:00:01'),
(279, 'test log-2020-09-28 06:30:02', '2020-09-28 06:30:02'),
(280, 'test log-2020-09-28 07:00:01', '2020-09-28 07:00:01'),
(281, 'test log-2020-09-28 07:30:01', '2020-09-28 07:30:01'),
(282, 'test log-2020-09-28 08:00:01', '2020-09-28 08:00:01'),
(283, 'test log-2020-09-28 08:30:01', '2020-09-28 08:30:01'),
(284, 'test log-2020-09-28 09:00:01', '2020-09-28 09:00:01'),
(285, 'test log-2020-09-28 09:30:01', '2020-09-28 09:30:01'),
(286, 'test log-2020-09-28 10:00:01', '2020-09-28 10:00:01'),
(287, 'test log-2020-09-28 10:30:01', '2020-09-28 10:30:01'),
(288, 'test log-2020-09-28 11:00:01', '2020-09-28 11:00:01'),
(289, 'test log-2020-09-28 11:30:01', '2020-09-28 11:30:01'),
(290, 'test log-2020-09-28 12:00:01', '2020-09-28 12:00:01'),
(291, 'test log-2020-09-28 12:30:01', '2020-09-28 12:30:01'),
(292, 'test log-2020-09-28 13:00:01', '2020-09-28 13:00:01'),
(293, 'test log-2020-09-28 13:30:01', '2020-09-28 13:30:01'),
(294, 'test log-2020-09-28 14:00:01', '2020-09-28 14:00:01'),
(295, 'test log-2020-09-28 14:30:01', '2020-09-28 14:30:01'),
(296, 'test log-2020-09-28 15:00:01', '2020-09-28 15:00:01'),
(297, 'test log-2020-09-28 15:30:01', '2020-09-28 15:30:01'),
(298, 'test log-2020-09-28 16:00:01', '2020-09-28 16:00:01'),
(299, 'test log-2020-09-28 16:30:01', '2020-09-28 16:30:01'),
(300, 'test log-2020-09-28 17:00:01', '2020-09-28 17:00:01'),
(301, 'test log-2020-09-28 17:30:01', '2020-09-28 17:30:01'),
(302, 'test log-2020-09-28 18:00:01', '2020-09-28 18:00:01'),
(303, 'test log-2020-09-28 18:30:01', '2020-09-28 18:30:01'),
(304, 'test log-2020-09-28 19:00:01', '2020-09-28 19:00:01'),
(305, 'test log-2020-09-28 19:30:01', '2020-09-28 19:30:01'),
(306, 'test log-2020-09-28 20:00:01', '2020-09-28 20:00:01'),
(307, 'test log-2020-09-28 20:30:01', '2020-09-28 20:30:01'),
(308, 'test log-2020-09-28 21:00:01', '2020-09-28 21:00:01'),
(309, 'test log-2020-09-28 21:30:01', '2020-09-28 21:30:01'),
(310, 'test log-2020-09-28 22:00:01', '2020-09-28 22:00:01'),
(311, 'test log-2020-09-28 22:30:01', '2020-09-28 22:30:01'),
(312, 'test log-2020-09-28 23:00:01', '2020-09-28 23:00:01'),
(313, 'test log-2020-09-28 23:30:01', '2020-09-28 23:30:01'),
(314, 'test log-2020-09-29 00:00:02', '2020-09-29 00:00:02'),
(315, 'test log-2020-09-29 00:30:01', '2020-09-29 00:30:01'),
(316, 'test log-2020-09-29 01:00:01', '2020-09-29 01:00:01'),
(317, 'test log-2020-09-29 01:30:01', '2020-09-29 01:30:01'),
(318, 'test log-2020-09-29 02:00:01', '2020-09-29 02:00:01'),
(319, 'test log-2020-09-29 02:30:01', '2020-09-29 02:30:01'),
(320, 'test log-2020-09-29 03:00:02', '2020-09-29 03:00:02'),
(321, 'test log-2020-09-29 03:30:01', '2020-09-29 03:30:01'),
(322, 'test log-2020-09-29 04:00:01', '2020-09-29 04:00:01'),
(323, 'test log-2020-09-29 04:30:01', '2020-09-29 04:30:01'),
(324, 'test log-2020-09-29 05:00:01', '2020-09-29 05:00:01'),
(325, 'test log-2020-09-29 05:30:01', '2020-09-29 05:30:01'),
(326, 'test log-2020-09-29 06:00:01', '2020-09-29 06:00:01'),
(327, 'test log-2020-09-29 06:30:01', '2020-09-29 06:30:01'),
(328, 'test log-2020-09-29 07:00:02', '2020-09-29 07:00:02'),
(329, 'test log-2020-09-29 07:30:01', '2020-09-29 07:30:01'),
(330, 'test log-2020-09-29 08:00:01', '2020-09-29 08:00:01'),
(331, 'test log-2020-09-29 08:30:01', '2020-09-29 08:30:01'),
(332, 'test log-2020-09-29 09:00:01', '2020-09-29 09:00:01'),
(333, 'test log-2020-09-29 09:30:01', '2020-09-29 09:30:01'),
(334, 'test log-2020-09-29 10:00:01', '2020-09-29 10:00:01'),
(335, 'test log-2020-09-29 10:30:01', '2020-09-29 10:30:01'),
(336, 'test log-2020-09-29 11:00:01', '2020-09-29 11:00:01'),
(337, 'test log-2020-09-29 11:30:01', '2020-09-29 11:30:01'),
(338, 'test log-2020-09-29 12:00:01', '2020-09-29 12:00:01'),
(339, 'test log-2020-09-29 12:30:01', '2020-09-29 12:30:01'),
(340, 'test log-2020-09-29 13:00:02', '2020-09-29 13:00:02'),
(341, 'test log-2020-09-29 13:30:01', '2020-09-29 13:30:01'),
(342, 'test log-2020-09-29 14:00:01', '2020-09-29 14:00:01'),
(343, 'test log-2020-09-29 14:30:01', '2020-09-29 14:30:01'),
(344, 'test log-2020-09-29 15:00:01', '2020-09-29 15:00:01'),
(345, 'test log-2020-09-29 15:30:02', '2020-09-29 15:30:02'),
(346, 'test log-2020-09-29 16:00:01', '2020-09-29 16:00:01'),
(347, 'test log-2020-09-29 16:30:01', '2020-09-29 16:30:01'),
(348, 'test log-2020-09-29 17:00:01', '2020-09-29 17:00:01'),
(349, 'test log-2020-09-29 17:30:01', '2020-09-29 17:30:01'),
(350, 'test log-2020-09-29 18:00:01', '2020-09-29 18:00:01'),
(351, 'test log-2020-09-29 18:30:01', '2020-09-29 18:30:01'),
(352, 'test log-2020-09-29 19:00:01', '2020-09-29 19:00:01'),
(353, 'test log-2020-09-29 19:30:01', '2020-09-29 19:30:01'),
(354, 'test log-2020-09-29 20:00:01', '2020-09-29 20:00:01'),
(355, 'test log-2020-09-29 20:30:01', '2020-09-29 20:30:01'),
(356, 'test log-2020-09-29 21:00:01', '2020-09-29 21:00:01'),
(357, 'test log-2020-09-29 21:30:01', '2020-09-29 21:30:01'),
(358, 'test log-2020-09-29 22:00:01', '2020-09-29 22:00:01'),
(359, 'test log-2020-09-29 22:30:01', '2020-09-29 22:30:01'),
(360, 'test log-2020-09-29 23:00:01', '2020-09-29 23:00:01'),
(361, 'test log-2020-09-29 23:30:01', '2020-09-29 23:30:01'),
(362, 'test log-2020-09-30 00:00:01', '2020-09-30 00:00:01'),
(363, 'test log-2020-09-30 00:30:02', '2020-09-30 00:30:02'),
(364, 'test log-2020-09-30 01:00:01', '2020-09-30 01:00:01'),
(365, 'test log-2020-09-30 01:30:01', '2020-09-30 01:30:01'),
(366, 'test log-2020-09-30 02:00:01', '2020-09-30 02:00:01'),
(367, 'test log-2020-09-30 02:30:01', '2020-09-30 02:30:01'),
(368, 'test log-2020-09-30 03:00:01', '2020-09-30 03:00:01'),
(369, 'test log-2020-09-30 03:30:02', '2020-09-30 03:30:02'),
(370, 'test log-2020-09-30 04:00:01', '2020-09-30 04:00:01'),
(371, 'test log-2020-09-30 04:30:01', '2020-09-30 04:30:01'),
(372, 'test log-2020-09-30 05:00:01', '2020-09-30 05:00:01'),
(373, 'test log-2020-09-30 05:30:01', '2020-09-30 05:30:01'),
(374, 'test log-2020-09-30 06:00:01', '2020-09-30 06:00:01'),
(375, 'test log-2020-09-30 06:30:01', '2020-09-30 06:30:01'),
(376, 'test log-2020-09-30 07:00:01', '2020-09-30 07:00:01'),
(377, 'test log-2020-09-30 07:30:01', '2020-09-30 07:30:01'),
(378, 'test log-2020-09-30 08:00:01', '2020-09-30 08:00:01'),
(379, 'test log-2020-09-30 08:30:01', '2020-09-30 08:30:01'),
(380, 'test log-2020-09-30 09:00:01', '2020-09-30 09:00:01'),
(381, 'test log-2020-09-30 09:30:01', '2020-09-30 09:30:01'),
(382, 'test log-2020-09-30 10:00:01', '2020-09-30 10:00:01'),
(383, 'test log-2020-09-30 10:30:01', '2020-09-30 10:30:01'),
(384, 'test log-2020-09-30 11:00:01', '2020-09-30 11:00:01'),
(385, 'test log-2020-09-30 11:30:01', '2020-09-30 11:30:01'),
(386, 'test log-2020-09-30 12:00:01', '2020-09-30 12:00:01'),
(387, 'test log-2020-09-30 12:30:01', '2020-09-30 12:30:01'),
(388, 'test log-2020-09-30 13:00:01', '2020-09-30 13:00:01'),
(389, 'test log-2020-09-30 13:30:02', '2020-09-30 13:30:02'),
(390, 'test log-2020-09-30 14:00:01', '2020-09-30 14:00:01'),
(391, 'test log-2020-10-02 16:31:19', '2020-10-02 16:31:19'),
(392, 'test log-2020-10-02 16:33:22', '2020-10-02 16:33:22'),
(393, 'test log-2020-10-02 16:34:11', '2020-10-02 16:34:11'),
(394, 'test log-2020-10-04 07:05:50', '2020-10-04 07:05:50'),
(395, 'test log-2020-10-05 07:50:25', '2020-10-05 07:50:25'),
(396, 'test log-2020-10-05 08:00:02', '2020-10-05 08:00:02'),
(397, 'test log-2020-10-05 08:30:01', '2020-10-05 08:30:01'),
(398, 'test log-2020-10-05 09:00:01', '2020-10-05 09:00:01'),
(399, 'test log-2020-10-05 10:00:02', '2020-10-05 10:00:02'),
(400, 'test log-2020-10-05 10:01:01', '2020-10-05 10:01:01'),
(401, 'test log-2020-10-05 11:00:01', '2020-10-05 11:00:01'),
(402, 'test log-2020-10-05 11:01:01', '2020-10-05 11:01:01'),
(403, 'test log-2020-10-05 10:55:23', '2020-10-05 10:55:23'),
(404, 'test log-2020-10-05 11:00:01', '2020-10-05 11:00:01'),
(405, 'test log-2020-10-05 11:30:01', '2020-10-05 11:30:01'),
(406, 'test log-2020-10-05 12:00:01', '2020-10-05 12:00:01'),
(407, 'test log-2020-10-05 12:30:02', '2020-10-05 12:30:02'),
(408, 'test log-2020-10-05 13:00:02', '2020-10-05 13:00:02'),
(409, 'test log-2020-10-05 13:30:02', '2020-10-05 13:30:02'),
(410, 'test log-2020-10-05 14:00:01', '2020-10-05 14:00:01'),
(411, 'test log-2020-10-05 14:30:01', '2020-10-05 14:30:01'),
(412, 'test log-2020-10-05 15:00:02', '2020-10-05 15:00:02'),
(413, 'test log-2020-10-05 15:30:01', '2020-10-05 15:30:01'),
(414, 'test log-2020-10-05 16:00:02', '2020-10-05 16:00:02'),
(415, 'test log-2020-10-05 16:30:02', '2020-10-05 16:30:02'),
(416, 'test log-2020-10-05 17:00:01', '2020-10-05 17:00:01'),
(417, 'test log-2020-10-05 17:30:01', '2020-10-05 17:30:01'),
(418, 'test log-2020-10-05 18:00:02', '2020-10-05 18:00:02'),
(419, 'test log-2020-10-05 18:30:01', '2020-10-05 18:30:01'),
(420, 'test log-2020-10-05 19:00:01', '2020-10-05 19:00:01'),
(421, 'test log-2020-10-05 19:30:01', '2020-10-05 19:30:01'),
(422, 'test log-2020-10-05 20:00:01', '2020-10-05 20:00:01'),
(423, 'test log-2020-10-05 20:30:01', '2020-10-05 20:30:01'),
(424, 'test log-2020-10-05 21:00:01', '2020-10-05 21:00:01'),
(425, 'test log-2020-10-05 21:30:01', '2020-10-05 21:30:01'),
(426, 'test log-2020-10-05 22:00:01', '2020-10-05 22:00:01'),
(427, 'test log-2020-10-05 22:30:01', '2020-10-05 22:30:01'),
(428, 'test log-2020-10-05 23:00:01', '2020-10-05 23:00:01'),
(429, 'test log-2020-10-05 23:30:01', '2020-10-05 23:30:01'),
(430, 'test log-2020-10-06 00:00:02', '2020-10-06 00:00:02'),
(431, 'test log-2020-10-06 00:30:01', '2020-10-06 00:30:01'),
(432, 'test log-2020-10-06 01:00:01', '2020-10-06 01:00:01'),
(433, 'test log-2020-10-06 01:30:01', '2020-10-06 01:30:01'),
(434, 'test log-2020-10-06 02:00:01', '2020-10-06 02:00:01'),
(435, 'test log-2020-10-06 02:30:02', '2020-10-06 02:30:02'),
(436, 'test log-2020-10-06 03:00:01', '2020-10-06 03:00:01'),
(437, 'test log-2020-10-06 03:30:01', '2020-10-06 03:30:01'),
(438, 'test log-2020-10-06 04:00:01', '2020-10-06 04:00:01'),
(439, 'test log-2020-10-06 04:30:02', '2020-10-06 04:30:02'),
(440, 'test log-2020-10-06 05:00:01', '2020-10-06 05:00:01'),
(441, 'test log-2020-10-06 05:30:01', '2020-10-06 05:30:01'),
(442, 'test log-2020-10-06 06:00:01', '2020-10-06 06:00:01'),
(443, 'test log-2020-10-06 06:30:01', '2020-10-06 06:30:01'),
(444, 'test log-2020-10-06 07:00:01', '2020-10-06 07:00:01'),
(445, 'test log-2020-10-06 07:30:01', '2020-10-06 07:30:01'),
(446, 'test log-2020-10-06 08:00:01', '2020-10-06 08:00:01'),
(447, 'test log-2020-10-06 08:30:01', '2020-10-06 08:30:01'),
(448, 'test log-2020-10-06 09:00:01', '2020-10-06 09:00:01'),
(449, 'test log-2020-10-06 09:30:01', '2020-10-06 09:30:01'),
(450, 'test log-2020-10-06 10:00:01', '2020-10-06 10:00:01'),
(451, 'test log-2020-10-06 10:30:01', '2020-10-06 10:30:01'),
(452, 'test log-2020-10-06 11:00:01', '2020-10-06 11:00:01'),
(453, 'test log-2020-10-06 11:30:02', '2020-10-06 11:30:02'),
(454, 'test log-2020-10-06 12:00:01', '2020-10-06 12:00:01'),
(455, 'test log-2020-10-06 12:30:01', '2020-10-06 12:30:01'),
(456, 'test log-2020-10-06 13:00:01', '2020-10-06 13:00:01'),
(457, 'test log-2020-10-06 13:30:01', '2020-10-06 13:30:01'),
(458, 'test log-2020-10-06 14:00:01', '2020-10-06 14:00:01'),
(459, 'test log-2020-10-06 14:30:01', '2020-10-06 14:30:01'),
(460, 'test log-2020-10-06 15:00:01', '2020-10-06 15:00:01'),
(461, 'test log-2020-10-06 15:30:01', '2020-10-06 15:30:01'),
(462, 'test log-2020-10-06 16:00:01', '2020-10-06 16:00:01'),
(463, 'test log-2020-10-06 16:30:01', '2020-10-06 16:30:01'),
(464, 'test log-2020-10-06 17:00:01', '2020-10-06 17:00:01'),
(465, 'test log-2020-10-06 17:30:01', '2020-10-06 17:30:01'),
(466, 'test log-2020-10-06 18:00:01', '2020-10-06 18:00:01'),
(467, 'test log-2020-10-06 18:30:01', '2020-10-06 18:30:01'),
(468, 'test log-2020-10-06 19:00:01', '2020-10-06 19:00:01'),
(469, 'test log-2020-10-06 19:30:01', '2020-10-06 19:30:01'),
(470, 'test log-2020-10-06 20:00:02', '2020-10-06 20:00:02'),
(471, 'test log-2020-10-06 20:30:01', '2020-10-06 20:30:01'),
(472, 'test log-2020-10-06 21:00:01', '2020-10-06 21:00:01'),
(473, 'test log-2020-10-06 21:30:01', '2020-10-06 21:30:01'),
(474, 'test log-2020-10-06 22:00:01', '2020-10-06 22:00:01'),
(475, 'test log-2020-10-06 22:30:01', '2020-10-06 22:30:01'),
(476, 'test log-2020-10-06 23:00:01', '2020-10-06 23:00:01'),
(477, 'test log-2020-10-06 23:30:01', '2020-10-06 23:30:01'),
(478, 'test log-2020-10-07 00:00:01', '2020-10-07 00:00:01'),
(479, 'test log-2020-10-07 00:30:01', '2020-10-07 00:30:01'),
(480, 'test log-2020-10-07 01:00:01', '2020-10-07 01:00:01'),
(481, 'test log-2020-10-07 01:30:01', '2020-10-07 01:30:01'),
(482, 'test log-2020-10-07 02:00:01', '2020-10-07 02:00:01'),
(483, 'test log-2020-10-07 02:30:01', '2020-10-07 02:30:01'),
(484, 'test log-2020-10-07 03:00:01', '2020-10-07 03:00:01'),
(485, 'test log-2020-10-07 03:30:01', '2020-10-07 03:30:01'),
(486, 'test log-2020-10-07 04:00:01', '2020-10-07 04:00:01'),
(487, 'test log-2020-10-07 04:30:01', '2020-10-07 04:30:01'),
(488, 'test log-2020-10-07 05:00:01', '2020-10-07 05:00:01'),
(489, 'test log-2020-10-07 05:30:01', '2020-10-07 05:30:01'),
(490, 'test log-2020-10-07 06:00:02', '2020-10-07 06:00:02'),
(491, 'test log-2020-10-07 06:30:01', '2020-10-07 06:30:01'),
(492, 'test log-2020-10-07 07:00:01', '2020-10-07 07:00:01'),
(493, 'test log-2020-10-07 07:30:01', '2020-10-07 07:30:01'),
(494, 'test log-2020-10-07 08:00:01', '2020-10-07 08:00:01'),
(495, 'test log-2020-10-07 08:30:01', '2020-10-07 08:30:01'),
(496, 'test log-2020-10-07 09:00:01', '2020-10-07 09:00:01'),
(497, 'test log-2020-10-07 09:30:01', '2020-10-07 09:30:01'),
(498, 'test log-2020-10-07 10:00:01', '2020-10-07 10:00:01'),
(499, 'test log-2020-10-07 10:30:01', '2020-10-07 10:30:01'),
(500, 'test log-2020-10-07 11:00:02', '2020-10-07 11:00:02'),
(501, 'test log-2020-10-07 11:30:01', '2020-10-07 11:30:01'),
(502, 'test log-2020-10-07 12:00:01', '2020-10-07 12:00:01'),
(503, 'test log-2020-10-07 12:30:01', '2020-10-07 12:30:01'),
(504, 'test log-2020-10-07 13:00:01', '2020-10-07 13:00:01'),
(505, 'test log-2020-10-07 13:30:01', '2020-10-07 13:30:01'),
(506, 'test log-2020-10-07 14:00:02', '2020-10-07 14:00:02'),
(507, 'test log-2020-10-07 14:30:01', '2020-10-07 14:30:01'),
(508, 'test log-2020-10-07 15:00:01', '2020-10-07 15:00:01'),
(509, 'test log-2020-10-07 15:30:01', '2020-10-07 15:30:01'),
(510, 'test log-2020-10-07 16:00:01', '2020-10-07 16:00:01'),
(511, 'test log-2020-10-07 16:30:02', '2020-10-07 16:30:02'),
(512, 'test log-2020-10-07 17:00:01', '2020-10-07 17:00:01'),
(513, 'test log-2020-10-07 17:30:01', '2020-10-07 17:30:01'),
(514, 'test log-2020-10-07 18:00:01', '2020-10-07 18:00:01'),
(515, 'test log-2020-10-07 18:30:01', '2020-10-07 18:30:01'),
(516, 'test log-2020-10-07 19:00:01', '2020-10-07 19:00:01'),
(517, 'test log-2020-10-07 19:30:01', '2020-10-07 19:30:01'),
(518, 'test log-2020-10-07 20:00:01', '2020-10-07 20:00:01'),
(519, 'test log-2020-10-07 20:30:01', '2020-10-07 20:30:01'),
(520, 'test log-2020-10-07 21:00:01', '2020-10-07 21:00:01'),
(521, 'test log-2020-10-07 21:30:01', '2020-10-07 21:30:01'),
(522, 'test log-2020-10-07 22:00:01', '2020-10-07 22:00:01'),
(523, 'test log-2020-10-07 22:30:01', '2020-10-07 22:30:01'),
(524, 'test log-2020-10-07 23:00:01', '2020-10-07 23:00:01'),
(525, 'test log-2020-10-07 23:30:01', '2020-10-07 23:30:01'),
(526, 'test log-2020-10-08 00:00:01', '2020-10-08 00:00:01'),
(527, 'test log-2020-10-08 00:30:01', '2020-10-08 00:30:01'),
(528, 'test log-2020-10-08 01:00:01', '2020-10-08 01:00:01'),
(529, 'test log-2020-10-08 01:30:01', '2020-10-08 01:30:01'),
(530, 'test log-2020-10-08 02:00:01', '2020-10-08 02:00:01'),
(531, 'test log-2020-10-08 02:30:01', '2020-10-08 02:30:01'),
(532, 'test log-2020-10-08 03:00:01', '2020-10-08 03:00:01'),
(533, 'test log-2020-10-08 03:30:02', '2020-10-08 03:30:02'),
(534, 'test log-2020-10-08 04:00:01', '2020-10-08 04:00:01'),
(535, 'test log-2020-10-08 04:30:02', '2020-10-08 04:30:02'),
(536, 'test log-2020-10-08 05:00:01', '2020-10-08 05:00:01'),
(537, 'test log-2020-10-08 05:30:01', '2020-10-08 05:30:01'),
(538, 'test log-2020-10-08 06:00:01', '2020-10-08 06:00:01'),
(539, 'test log-2020-10-08 06:30:02', '2020-10-08 06:30:02'),
(540, 'test log-2020-10-08 07:00:02', '2020-10-08 07:00:02'),
(541, 'test log-2020-10-08 07:30:01', '2020-10-08 07:30:01'),
(542, 'test log-2020-10-08 08:00:02', '2020-10-08 08:00:02'),
(543, 'test log-2020-10-08 08:30:01', '2020-10-08 08:30:01'),
(544, 'test log-2020-10-08 09:00:01', '2020-10-08 09:00:01'),
(545, 'test log-2020-10-08 09:30:01', '2020-10-08 09:30:01'),
(546, 'test log-2020-10-08 10:00:01', '2020-10-08 10:00:01'),
(547, 'test log-2020-10-08 10:30:01', '2020-10-08 10:30:01'),
(548, 'test log-2020-10-08 11:00:01', '2020-10-08 11:00:01'),
(549, 'test log-2020-10-08 11:30:01', '2020-10-08 11:30:01'),
(550, 'test log-2020-10-08 12:00:01', '2020-10-08 12:00:01'),
(551, 'test log-2020-10-08 12:30:02', '2020-10-08 12:30:02'),
(552, 'test log-2020-10-08 13:00:01', '2020-10-08 13:00:01'),
(553, 'test log-2020-10-08 13:30:01', '2020-10-08 13:30:01'),
(554, 'test log-2020-10-08 14:00:02', '2020-10-08 14:00:02'),
(555, 'test log-2020-10-08 14:30:01', '2020-10-08 14:30:01'),
(556, 'test log-2020-10-08 15:00:01', '2020-10-08 15:00:01'),
(557, 'test log-2020-10-08 15:30:01', '2020-10-08 15:30:01'),
(558, 'test log-2020-10-08 16:00:02', '2020-10-08 16:00:02'),
(559, 'test log-2020-10-08 16:30:02', '2020-10-08 16:30:02'),
(560, 'test log-2020-10-08 17:00:01', '2020-10-08 17:00:01'),
(561, 'test log-2020-10-08 17:30:01', '2020-10-08 17:30:01'),
(562, 'test log-2020-10-08 18:00:01', '2020-10-08 18:00:01'),
(563, 'test log-2020-10-08 18:30:01', '2020-10-08 18:30:01'),
(564, 'test log-2020-10-08 19:00:01', '2020-10-08 19:00:01'),
(565, 'test log-2020-10-08 19:30:01', '2020-10-08 19:30:01'),
(566, 'test log-2020-10-08 20:00:02', '2020-10-08 20:00:02'),
(567, 'test log-2020-10-08 20:30:01', '2020-10-08 20:30:01'),
(568, 'test log-2020-10-08 21:00:01', '2020-10-08 21:00:01'),
(569, 'test log-2020-10-08 21:30:01', '2020-10-08 21:30:01'),
(570, 'test log-2020-10-08 22:00:01', '2020-10-08 22:00:01'),
(571, 'test log-2020-10-08 22:30:01', '2020-10-08 22:30:01'),
(572, 'test log-2020-10-08 23:00:02', '2020-10-08 23:00:02'),
(573, 'test log-2020-10-08 23:30:01', '2020-10-08 23:30:01'),
(574, 'test log-2020-10-09 00:00:01', '2020-10-09 00:00:01'),
(575, 'test log-2020-10-09 00:30:01', '2020-10-09 00:30:01'),
(576, 'test log-2020-10-09 01:00:01', '2020-10-09 01:00:01'),
(577, 'test log-2020-10-09 01:30:01', '2020-10-09 01:30:01'),
(578, 'test log-2020-10-09 02:00:02', '2020-10-09 02:00:02'),
(579, 'test log-2020-10-09 02:30:02', '2020-10-09 02:30:02'),
(580, 'test log-2020-10-09 03:00:01', '2020-10-09 03:00:01'),
(581, 'test log-2020-10-09 03:30:01', '2020-10-09 03:30:01'),
(582, 'test log-2020-10-09 04:00:01', '2020-10-09 04:00:01'),
(583, 'test log-2020-10-09 04:30:01', '2020-10-09 04:30:01'),
(584, 'test log-2020-10-09 05:00:01', '2020-10-09 05:00:01'),
(585, 'test log-2020-10-09 05:30:01', '2020-10-09 05:30:01'),
(586, 'test log-2020-10-09 06:00:01', '2020-10-09 06:00:01'),
(587, 'test log-2020-10-09 06:30:01', '2020-10-09 06:30:01'),
(588, 'test log-2020-10-09 07:00:01', '2020-10-09 07:00:01'),
(589, 'test log-2020-10-09 07:30:01', '2020-10-09 07:30:01'),
(590, 'test log-2020-10-09 08:00:01', '2020-10-09 08:00:01'),
(591, 'test log-2020-10-09 08:30:01', '2020-10-09 08:30:01'),
(592, 'test log-2020-10-09 09:00:01', '2020-10-09 09:00:01'),
(593, 'test log-2020-10-09 09:30:01', '2020-10-09 09:30:01'),
(594, 'test log-2020-10-09 10:00:01', '2020-10-09 10:00:01'),
(595, 'test log-2020-10-09 10:30:01', '2020-10-09 10:30:01'),
(596, 'test log-2020-10-09 11:00:02', '2020-10-09 11:00:02'),
(597, 'test log-2020-10-09 11:30:01', '2020-10-09 11:30:01'),
(598, 'test log-2020-10-09 12:00:01', '2020-10-09 12:00:01'),
(599, 'test log-2020-10-09 12:30:01', '2020-10-09 12:30:01'),
(600, 'test log-2020-10-09 13:00:01', '2020-10-09 13:00:01'),
(601, 'test log-2020-10-09 13:30:01', '2020-10-09 13:30:01'),
(602, 'test log-2020-10-09 14:00:01', '2020-10-09 14:00:01'),
(603, 'test log-2020-10-09 14:30:01', '2020-10-09 14:30:01'),
(604, 'test log-2020-10-09 15:00:02', '2020-10-09 15:00:02'),
(605, 'test log-2020-10-09 15:30:01', '2020-10-09 15:30:01'),
(606, 'test log-2020-10-09 16:00:01', '2020-10-09 16:00:01'),
(607, 'test log-2020-10-09 16:30:01', '2020-10-09 16:30:01'),
(608, 'test log-2020-10-09 17:00:01', '2020-10-09 17:00:01'),
(609, 'test log-2020-10-09 17:30:02', '2020-10-09 17:30:02'),
(610, 'test log-2020-10-09 18:00:01', '2020-10-09 18:00:01'),
(611, 'test log-2020-10-09 18:30:01', '2020-10-09 18:30:01'),
(612, 'test log-2020-10-09 19:00:01', '2020-10-09 19:00:01'),
(613, 'test log-2020-10-09 19:30:01', '2020-10-09 19:30:01'),
(614, 'test log-2020-10-09 20:00:01', '2020-10-09 20:00:01'),
(615, 'test log-2020-10-09 20:30:01', '2020-10-09 20:30:01'),
(616, 'test log-2020-10-09 21:00:02', '2020-10-09 21:00:02'),
(617, 'test log-2020-10-09 21:30:01', '2020-10-09 21:30:01'),
(618, 'test log-2020-10-09 22:00:01', '2020-10-09 22:00:01'),
(619, 'test log-2020-10-09 22:30:01', '2020-10-09 22:30:01'),
(620, 'test log-2020-10-09 23:00:01', '2020-10-09 23:00:01'),
(621, 'test log-2020-10-09 23:30:01', '2020-10-09 23:30:01'),
(622, 'test log-2020-10-10 00:00:02', '2020-10-10 00:00:02'),
(623, 'test log-2020-10-10 00:30:01', '2020-10-10 00:30:01'),
(624, 'test log-2020-10-10 01:00:01', '2020-10-10 01:00:01'),
(625, 'test log-2020-10-10 01:30:01', '2020-10-10 01:30:01'),
(626, 'test log-2020-10-10 02:00:01', '2020-10-10 02:00:01'),
(627, 'test log-2020-10-10 02:30:01', '2020-10-10 02:30:01'),
(628, 'test log-2020-10-10 03:00:01', '2020-10-10 03:00:01'),
(629, 'test log-2020-10-10 03:30:01', '2020-10-10 03:30:01'),
(630, 'test log-2020-10-10 04:00:01', '2020-10-10 04:00:01'),
(631, 'test log-2020-10-10 04:30:01', '2020-10-10 04:30:01'),
(632, 'test log-2020-10-10 05:00:01', '2020-10-10 05:00:01'),
(633, 'test log-2020-10-10 05:30:01', '2020-10-10 05:30:01'),
(634, 'test log-2020-10-10 06:00:02', '2020-10-10 06:00:02'),
(635, 'test log-2020-10-10 06:30:01', '2020-10-10 06:30:01'),
(636, 'test log-2020-10-10 07:00:01', '2020-10-10 07:00:01'),
(637, 'test log-2020-10-10 07:30:01', '2020-10-10 07:30:01'),
(638, 'test log-2020-10-10 08:00:01', '2020-10-10 08:00:01'),
(639, 'test log-2020-10-10 08:30:02', '2020-10-10 08:30:02'),
(640, 'test log-2020-10-10 09:00:02', '2020-10-10 09:00:02'),
(641, 'test log-2020-10-10 09:30:01', '2020-10-10 09:30:01'),
(642, 'test log-2020-10-10 10:00:01', '2020-10-10 10:00:01'),
(643, 'test log-2020-10-10 10:30:01', '2020-10-10 10:30:01'),
(644, 'test log-2020-10-10 11:00:01', '2020-10-10 11:00:01'),
(645, 'test log-2020-10-10 11:30:01', '2020-10-10 11:30:01'),
(646, 'test log-2020-10-10 12:00:02', '2020-10-10 12:00:02'),
(647, 'test log-2020-10-10 12:30:01', '2020-10-10 12:30:01'),
(648, 'test log-2020-10-10 13:00:01', '2020-10-10 13:00:01'),
(649, 'test log-2020-10-10 13:30:01', '2020-10-10 13:30:01'),
(650, 'test log-2020-10-10 14:00:01', '2020-10-10 14:00:01'),
(651, 'test log-2020-10-10 14:30:01', '2020-10-10 14:30:01'),
(652, 'test log-2020-10-10 15:00:01', '2020-10-10 15:00:01'),
(653, 'test log-2020-10-10 15:30:01', '2020-10-10 15:30:01'),
(654, 'test log-2020-10-10 16:00:01', '2020-10-10 16:00:01'),
(655, 'test log-2020-10-10 16:30:01', '2020-10-10 16:30:01'),
(656, 'test log-2020-10-10 17:00:02', '2020-10-10 17:00:02'),
(657, 'test log-2020-10-10 17:30:01', '2020-10-10 17:30:01'),
(658, 'test log-2020-10-10 18:00:01', '2020-10-10 18:00:01'),
(659, 'test log-2020-10-10 18:30:01', '2020-10-10 18:30:01'),
(660, 'test log-2020-10-10 19:00:01', '2020-10-10 19:00:01'),
(661, 'test log-2020-10-10 19:30:01', '2020-10-10 19:30:01'),
(662, 'test log-2020-10-10 20:00:01', '2020-10-10 20:00:01'),
(663, 'test log-2020-10-10 20:30:01', '2020-10-10 20:30:01'),
(664, 'test log-2020-10-10 21:00:02', '2020-10-10 21:00:02'),
(665, 'test log-2020-10-10 21:30:02', '2020-10-10 21:30:02'),
(666, 'test log-2020-10-10 22:00:01', '2020-10-10 22:00:01'),
(667, 'test log-2020-10-10 22:30:02', '2020-10-10 22:30:02'),
(668, 'test log-2020-10-10 23:00:01', '2020-10-10 23:00:01'),
(669, 'test log-2020-10-10 23:30:01', '2020-10-10 23:30:01'),
(670, 'test log-2020-10-11 00:00:01', '2020-10-11 00:00:01'),
(671, 'test log-2020-10-11 00:30:01', '2020-10-11 00:30:01'),
(672, 'test log-2020-10-11 01:00:01', '2020-10-11 01:00:01'),
(673, 'test log-2020-10-11 01:30:01', '2020-10-11 01:30:01'),
(674, 'test log-2020-10-11 02:00:02', '2020-10-11 02:00:02'),
(675, 'test log-2020-10-11 02:30:01', '2020-10-11 02:30:01'),
(676, 'test log-2020-10-11 03:00:01', '2020-10-11 03:00:01'),
(677, 'test log-2020-10-11 03:30:01', '2020-10-11 03:30:01'),
(678, 'test log-2020-10-11 04:00:01', '2020-10-11 04:00:01'),
(679, 'test log-2020-10-11 04:30:01', '2020-10-11 04:30:01'),
(680, 'test log-2020-10-11 05:00:01', '2020-10-11 05:00:01'),
(681, 'test log-2020-10-11 05:30:01', '2020-10-11 05:30:01'),
(682, 'test log-2020-10-11 06:00:01', '2020-10-11 06:00:01'),
(683, 'test log-2020-10-11 06:30:01', '2020-10-11 06:30:01'),
(684, 'test log-2020-10-11 07:00:01', '2020-10-11 07:00:01'),
(685, 'test log-2020-10-11 07:30:01', '2020-10-11 07:30:01'),
(686, 'test log-2020-10-11 08:00:01', '2020-10-11 08:00:01'),
(687, 'test log-2020-10-11 08:30:02', '2020-10-11 08:30:02'),
(688, 'test log-2020-10-11 09:00:01', '2020-10-11 09:00:01'),
(689, 'test log-2020-10-11 09:30:02', '2020-10-11 09:30:02'),
(690, 'test log-2020-10-11 10:00:01', '2020-10-11 10:00:01'),
(691, 'test log-2020-10-11 10:30:01', '2020-10-11 10:30:01'),
(692, 'test log-2020-10-11 11:00:01', '2020-10-11 11:00:01'),
(693, 'test log-2020-10-11 11:30:01', '2020-10-11 11:30:01'),
(694, 'test log-2020-10-11 12:00:02', '2020-10-11 12:00:02'),
(695, 'test log-2020-10-11 12:30:01', '2020-10-11 12:30:01'),
(696, 'test log-2020-10-11 13:00:01', '2020-10-11 13:00:01'),
(697, 'test log-2020-10-11 13:30:01', '2020-10-11 13:30:01'),
(698, 'test log-2020-10-11 14:00:01', '2020-10-11 14:00:01'),
(699, 'test log-2020-10-11 14:30:01', '2020-10-11 14:30:01'),
(700, 'test log-2020-10-11 15:00:01', '2020-10-11 15:00:01'),
(701, 'test log-2020-10-11 15:30:01', '2020-10-11 15:30:01'),
(702, 'test log-2020-10-11 16:00:01', '2020-10-11 16:00:01'),
(703, 'test log-2020-10-11 16:30:01', '2020-10-11 16:30:01'),
(704, 'test log-2020-10-11 17:00:02', '2020-10-11 17:00:02'),
(705, 'test log-2020-10-11 17:30:02', '2020-10-11 17:30:02'),
(706, 'test log-2020-10-11 18:00:01', '2020-10-11 18:00:01'),
(707, 'test log-2020-10-11 18:30:01', '2020-10-11 18:30:01'),
(708, 'test log-2020-10-11 19:00:01', '2020-10-11 19:00:01'),
(709, 'test log-2020-10-11 19:30:02', '2020-10-11 19:30:02'),
(710, 'test log-2020-10-11 20:00:02', '2020-10-11 20:00:02'),
(711, 'test log-2020-10-11 20:30:01', '2020-10-11 20:30:01'),
(712, 'test log-2020-10-11 21:00:01', '2020-10-11 21:00:01'),
(713, 'test log-2020-10-11 21:30:01', '2020-10-11 21:30:01'),
(714, 'test log-2020-10-11 22:00:01', '2020-10-11 22:00:01'),
(715, 'test log-2020-10-11 22:30:01', '2020-10-11 22:30:01'),
(716, 'test log-2020-10-11 23:00:02', '2020-10-11 23:00:02'),
(717, 'test log-2020-10-11 23:30:01', '2020-10-11 23:30:01'),
(718, 'test log-2020-10-12 00:00:01', '2020-10-12 00:00:01'),
(719, 'test log-2020-10-12 00:30:01', '2020-10-12 00:30:01'),
(720, 'test log-2020-10-12 01:00:01', '2020-10-12 01:00:01'),
(721, 'test log-2020-10-12 01:30:01', '2020-10-12 01:30:01'),
(722, 'test log-2020-10-12 02:00:01', '2020-10-12 02:00:01'),
(723, 'test log-2020-10-12 02:30:01', '2020-10-12 02:30:01'),
(724, 'test log-2020-10-12 03:00:01', '2020-10-12 03:00:01'),
(725, 'test log-2020-10-12 03:30:01', '2020-10-12 03:30:01'),
(726, 'test log-2020-10-12 04:00:01', '2020-10-12 04:00:01'),
(727, 'test log-2020-10-12 04:30:01', '2020-10-12 04:30:01'),
(728, 'test log-2020-10-12 05:00:01', '2020-10-12 05:00:01'),
(729, 'test log-2020-10-12 05:30:01', '2020-10-12 05:30:01'),
(730, 'test log-2020-10-12 06:00:01', '2020-10-12 06:00:01'),
(731, 'test log-2020-10-12 06:30:01', '2020-10-12 06:30:01'),
(732, 'test log-2020-10-12 07:00:01', '2020-10-12 07:00:01'),
(733, 'test log-2020-10-12 07:30:01', '2020-10-12 07:30:01'),
(734, 'test log-2020-10-12 08:00:02', '2020-10-12 08:00:02'),
(735, 'test log-2020-10-12 08:30:01', '2020-10-12 08:30:01'),
(736, 'test log-2020-10-12 09:00:01', '2020-10-12 09:00:01'),
(737, 'test log-2020-10-12 09:30:01', '2020-10-12 09:30:01'),
(738, 'test log-2020-10-12 10:00:01', '2020-10-12 10:00:01'),
(739, 'test log-2020-10-12 10:30:01', '2020-10-12 10:30:01'),
(740, 'test log-2020-10-12 11:00:02', '2020-10-12 11:00:02'),
(741, 'test log-2020-10-12 11:30:01', '2020-10-12 11:30:01'),
(742, 'test log-2020-10-12 12:00:01', '2020-10-12 12:00:01'),
(743, 'test log-2020-10-12 12:30:01', '2020-10-12 12:30:01'),
(744, 'test log-2020-10-12 13:00:02', '2020-10-12 13:00:02'),
(745, 'test log-2020-10-12 13:30:01', '2020-10-12 13:30:01'),
(746, 'test log-2020-10-12 14:00:01', '2020-10-12 14:00:01'),
(747, 'test log-2020-10-12 14:30:01', '2020-10-12 14:30:01'),
(748, 'test log-2020-10-12 15:00:01', '2020-10-12 15:00:01'),
(749, 'test log-2020-10-12 15:30:01', '2020-10-12 15:30:01'),
(750, 'test log-2020-10-12 16:00:01', '2020-10-12 16:00:01'),
(751, 'test log-2020-10-12 16:30:01', '2020-10-12 16:30:01'),
(752, 'test log-2020-10-12 17:00:01', '2020-10-12 17:00:01'),
(753, 'test log-2020-10-12 17:30:01', '2020-10-12 17:30:01'),
(754, 'test log-2020-10-12 18:00:01', '2020-10-12 18:00:01'),
(755, 'test log-2020-10-12 18:30:01', '2020-10-12 18:30:01'),
(756, 'test log-2020-10-12 19:00:01', '2020-10-12 19:00:01'),
(757, 'test log-2020-10-12 19:30:01', '2020-10-12 19:30:01'),
(758, 'test log-2020-10-12 20:00:01', '2020-10-12 20:00:01'),
(759, 'test log-2020-10-12 20:30:01', '2020-10-12 20:30:01'),
(760, 'test log-2020-10-12 21:00:01', '2020-10-12 21:00:01'),
(761, 'test log-2020-10-12 21:30:01', '2020-10-12 21:30:01'),
(762, 'test log-2020-10-12 22:00:02', '2020-10-12 22:00:02'),
(763, 'test log-2020-10-12 22:30:01', '2020-10-12 22:30:01'),
(764, 'test log-2020-10-12 23:00:01', '2020-10-12 23:00:01'),
(765, 'test log-2020-10-12 23:30:01', '2020-10-12 23:30:01'),
(766, 'test log-2020-10-13 00:00:01', '2020-10-13 00:00:01'),
(767, 'test log-2020-10-13 00:30:01', '2020-10-13 00:30:01'),
(768, 'test log-2020-10-13 01:00:01', '2020-10-13 01:00:01'),
(769, 'test log-2020-10-13 01:30:01', '2020-10-13 01:30:01'),
(770, 'test log-2020-10-13 02:00:01', '2020-10-13 02:00:01'),
(771, 'test log-2020-10-13 02:30:01', '2020-10-13 02:30:01'),
(772, 'test log-2020-10-13 03:00:01', '2020-10-13 03:00:01'),
(773, 'test log-2020-10-13 03:30:01', '2020-10-13 03:30:01'),
(774, 'test log-2020-10-13 04:00:01', '2020-10-13 04:00:01'),
(775, 'test log-2020-10-13 04:30:01', '2020-10-13 04:30:01'),
(776, 'test log-2020-10-13 05:00:01', '2020-10-13 05:00:01'),
(777, 'test log-2020-10-13 05:30:01', '2020-10-13 05:30:01'),
(778, 'test log-2020-10-13 06:00:01', '2020-10-13 06:00:01'),
(779, 'test log-2020-10-13 06:30:01', '2020-10-13 06:30:01'),
(780, 'test log-2020-10-13 07:00:01', '2020-10-13 07:00:01'),
(781, 'test log-2020-10-13 07:30:01', '2020-10-13 07:30:01'),
(782, 'test log-2020-10-13 08:00:01', '2020-10-13 08:00:01'),
(783, 'test log-2020-10-13 08:30:01', '2020-10-13 08:30:01'),
(784, 'test log-2020-10-13 09:00:01', '2020-10-13 09:00:01'),
(785, 'test log-2020-10-13 09:30:01', '2020-10-13 09:30:01'),
(786, 'test log-2020-10-13 10:00:01', '2020-10-13 10:00:01'),
(787, 'test log-2020-10-13 10:30:01', '2020-10-13 10:30:01'),
(788, 'test log-2020-10-13 11:00:02', '2020-10-13 11:00:02'),
(789, 'test log-2020-10-13 11:30:01', '2020-10-13 11:30:01'),
(790, 'test log-2020-10-13 12:00:01', '2020-10-13 12:00:01'),
(791, 'test log-2020-10-13 12:30:01', '2020-10-13 12:30:01'),
(792, 'test log-2020-10-13 13:00:01', '2020-10-13 13:00:01'),
(793, 'test log-2020-10-13 13:30:01', '2020-10-13 13:30:01'),
(794, 'test log-2020-10-13 14:00:01', '2020-10-13 14:00:01'),
(795, 'test log-2020-10-13 14:30:01', '2020-10-13 14:30:01'),
(796, 'test log-2020-10-13 15:00:01', '2020-10-13 15:00:01'),
(797, 'test log-2020-10-13 15:30:01', '2020-10-13 15:30:01'),
(798, 'test log-2020-10-13 16:00:02', '2020-10-13 16:00:02'),
(799, 'test log-2020-10-13 16:30:01', '2020-10-13 16:30:01'),
(800, 'test log-2020-10-13 17:00:02', '2020-10-13 17:00:02'),
(801, 'test log-2020-10-13 17:30:01', '2020-10-13 17:30:01'),
(802, 'test log-2020-10-13 18:00:01', '2020-10-13 18:00:01'),
(803, 'test log-2020-10-13 18:30:01', '2020-10-13 18:30:01'),
(804, 'test log-2020-10-13 19:00:01', '2020-10-13 19:00:01'),
(805, 'test log-2020-10-13 19:30:01', '2020-10-13 19:30:01'),
(806, 'test log-2020-10-13 20:00:01', '2020-10-13 20:00:01'),
(807, 'test log-2020-10-13 20:30:02', '2020-10-13 20:30:02'),
(808, 'test log-2020-10-13 21:00:01', '2020-10-13 21:00:01'),
(809, 'test log-2020-10-13 21:30:01', '2020-10-13 21:30:01'),
(810, 'test log-2020-10-13 22:00:01', '2020-10-13 22:00:01'),
(811, 'test log-2020-10-13 22:30:01', '2020-10-13 22:30:01'),
(812, 'test log-2020-10-13 23:00:01', '2020-10-13 23:00:01'),
(813, 'test log-2020-10-13 23:30:01', '2020-10-13 23:30:01'),
(814, 'test log-2020-10-14 00:00:01', '2020-10-14 00:00:01'),
(815, 'test log-2020-10-14 00:30:02', '2020-10-14 00:30:02'),
(816, 'test log-2020-10-14 01:00:01', '2020-10-14 01:00:01'),
(817, 'test log-2020-10-14 01:30:01', '2020-10-14 01:30:01'),
(818, 'test log-2020-10-14 02:00:01', '2020-10-14 02:00:01'),
(819, 'test log-2020-10-14 02:30:01', '2020-10-14 02:30:01'),
(820, 'test log-2020-10-14 03:00:01', '2020-10-14 03:00:01'),
(821, 'test log-2020-10-14 03:30:01', '2020-10-14 03:30:01'),
(822, 'test log-2020-10-14 04:00:01', '2020-10-14 04:00:01'),
(823, 'test log-2020-10-14 04:30:01', '2020-10-14 04:30:01'),
(824, 'test log-2020-10-14 05:00:01', '2020-10-14 05:00:01'),
(825, 'test log-2020-10-14 05:30:01', '2020-10-14 05:30:01'),
(826, 'test log-2020-10-14 06:00:01', '2020-10-14 06:00:01'),
(827, 'test log-2020-10-14 06:30:01', '2020-10-14 06:30:01'),
(828, 'test log-2020-10-14 07:00:01', '2020-10-14 07:00:01'),
(829, 'test log-2020-10-14 07:30:01', '2020-10-14 07:30:01'),
(830, 'test log-2020-10-14 08:00:02', '2020-10-14 08:00:02'),
(831, 'test log-2020-10-14 08:30:01', '2020-10-14 08:30:01'),
(832, 'test log-2020-10-14 09:00:01', '2020-10-14 09:00:01'),
(833, 'test log-2020-10-14 09:30:02', '2020-10-14 09:30:02'),
(834, 'test log-2020-10-14 10:00:01', '2020-10-14 10:00:01');
INSERT INTO `test` (`id`, `test`, `tm`) VALUES
(835, 'test log-2020-10-14 10:30:01', '2020-10-14 10:30:01'),
(836, 'test log-2020-10-14 11:00:01', '2020-10-14 11:00:01'),
(837, 'test log-2020-10-14 11:30:01', '2020-10-14 11:30:01'),
(838, 'test log-2020-10-14 12:00:01', '2020-10-14 12:00:01'),
(839, 'test log-2020-10-14 12:30:01', '2020-10-14 12:30:01'),
(840, 'test log-2020-10-14 13:00:01', '2020-10-14 13:00:01'),
(841, 'test log-2020-11-02 22:00:01', '2020-11-02 22:00:01'),
(842, 'test log-2020-11-03 05:04:04', '2020-11-03 05:04:04'),
(843, 'test log-2020-11-04 12:50:27', '2020-11-04 12:50:27'),
(844, 'test log-2020-11-05 06:55:16', '2020-11-05 06:55:16'),
(845, 'test log-2020-11-06 04:35:25', '2020-11-06 04:35:25'),
(846, 'test log-2020-11-07 02:00:01', '2020-11-07 02:00:01'),
(847, 'test log-2020-11-08 02:00:01', '2020-11-08 02:00:01'),
(848, 'test log-2020-11-09 02:00:01', '2020-11-09 02:00:01'),
(849, 'test log-2020-11-10 02:00:01', '2020-11-10 02:00:01'),
(850, 'test log-2020-11-11 02:00:01', '2020-11-11 02:00:01'),
(851, 'test log-2020-11-12 02:00:01', '2020-11-12 02:00:01'),
(852, 'test log-2020-11-13 04:00:01', '2020-11-13 04:00:01'),
(853, 'test log-2020-11-14 04:00:01', '2020-11-14 04:00:01'),
(854, 'test log-2020-11-15 04:00:01', '2020-11-15 04:00:01'),
(855, 'test log-2020-11-16 04:00:01', '2020-11-16 04:00:01'),
(856, 'test log-2020-11-17 04:00:01', '2020-11-17 04:00:01'),
(857, 'test log-2020-11-18 04:00:01', '2020-11-18 04:00:01'),
(858, 'test log-2020-11-19 04:00:01', '2020-11-19 04:00:01');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `test_id` int(95) NOT NULL,
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
  `ip_address` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`test_id`, `userid`, `test_name`, `test_email_id`, `test_city`, `test_state`, `test_country`, `test_title`, `test_desc`, `test_status`, `date_time`, `ip_address`) VALUES
(1, 1, '', '', '', '', '', 'testimonial', 'testimonial testimonial testimonial', 1, '2012-01-25 11:08:28', '127.0.0.1'),
(7, 25, NULL, NULL, NULL, NULL, NULL, 'Hello', 'sakjasdhfkasd', 1, '2017-01-19 13:18:02', '114.134.91.94');

-- --------------------------------------------------------

--
-- Table structure for table `test_cron`
--

CREATE TABLE `test_cron` (
  `id` int(11) NOT NULL,
  `test` varchar(200) DEFAULT NULL,
  `time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) NOT NULL,
  `userid` bigint(20) DEFAULT NULL,
  `contact_no` varchar(30) DEFAULT NULL,
  `contact_mailid` varchar(100) DEFAULT NULL,
  `ticket_no` varchar(30) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text,
  `ticket_status` varchar(30) DEFAULT NULL,
  `postdate` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0-new,1-onhold,2-fixed,3-reopen,4-close'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_conversation`
--

CREATE TABLE `ticket_conversation` (
  `con_id` bigint(20) NOT NULL,
  `adminid` int(1) DEFAULT NULL,
  `userid` bigint(20) DEFAULT NULL,
  `ticket_no` varchar(30) DEFAULT NULL,
  `from_id` text,
  `to_id` text,
  `tkt_message` text,
  `ticket_status` varchar(40) DEFAULT NULL,
  `con_date` datetime DEFAULT NULL,
  `ip_address` varchar(30) DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '0-new,1-onhold,2-reopen,3-fixed,4-close'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topic_detail`
--

CREATE TABLE `topic_detail` (
  `topic_id` int(5) NOT NULL,
  `topic` varchar(50) DEFAULT NULL,
  `posteddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_detail`
--

INSERT INTO `topic_detail` (`topic_id`, `topic`, `posteddate`) VALUES
(1, 'web design', '2005-07-23'),
(2, 'Coding hash', '2005-07-25'),
(3, 'php coding', '2005-07-23'),
(4, 'photo shop', '2005-07-07'),
(5, 'RDBMS Concepts', '2005-07-23'),
(6, 'J2EE', '2005-07-23'),
(7, 'adv java', '2005-07-23'),
(8, 'sample coding', '2005-07-28'),
(9, 'new test', '2005-08-11'),
(11, 'dsf', '2005-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `update_program`
--

CREATE TABLE `update_program` (
  `update_id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `prog_id` int(11) DEFAULT NULL,
  `referral_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `useronline`
--

CREATE TABLE `useronline` (
  `id` bigint(20) NOT NULL,
  `ip` varchar(15) DEFAULT '',
  `timestamp` varchar(15) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useronline`
--

INSERT INTO `useronline` (`id`, `ip`, `timestamp`) VALUES
(100, '127.0.0.1', '1328093345'),
(101, '127.0.0.1', '1328093517'),
(102, '127.0.0.1', '1328093845'),
(103, '127.0.0.1', '1328093845'),
(104, '127.0.0.1', '1328093857'),
(105, '127.0.0.1', '1328093857'),
(106, '127.0.0.1', '1328093868'),
(107, '127.0.0.1', '1328093868'),
(108, '127.0.0.1', '1328093873'),
(109, '127.0.0.1', '1328093873');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(16) DEFAULT NULL,
  `visit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `withdraw_id` int(11) NOT NULL,
  `member_id` int(20) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `withdraw_date` date DEFAULT NULL,
  `amount` double(30,8) DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_pay`
--

CREATE TABLE `withdraw_pay` (
  `pay_id` int(11) NOT NULL,
  `withdraw_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `account_no` int(11) DEFAULT NULL,
  `amount` double(30,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `admin_commission`
--
ALTER TABLE `admin_commission`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `advertisement_banners`
--
ALTER TABLE `advertisement_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `advertisement_plans`
--
ALTER TABLE `advertisement_plans`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `alerts_table`
--
ALTER TABLE `alerts_table`
  ADD PRIMARY KEY (`alerts_id`);

--
-- Indexes for table `blocktrail_ipn`
--
ALTER TABLE `blocktrail_ipn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cb_response`
--
ALTER TABLE `cb_response`
  ADD PRIMARY KEY (`int`);

--
-- Indexes for table `cms_table`
--
ALTER TABLE `cms_table`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `coin_sell`
--
ALTER TABLE `coin_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contentmodify`
--
ALTER TABLE `contentmodify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `crypto_payments`
--
ALTER TABLE `crypto_payments`
  ADD PRIMARY KEY (`paymentID`),
  ADD UNIQUE KEY `key3` (`boxID`,`orderID`,`userID`,`txID`,`amount`,`addr`),
  ADD KEY `boxID` (`boxID`),
  ADD KEY `boxType` (`boxType`),
  ADD KEY `userID` (`userID`),
  ADD KEY `countryID` (`countryID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `amount` (`amount`),
  ADD KEY `amountUSD` (`amountUSD`),
  ADD KEY `coinLabel` (`coinLabel`),
  ADD KEY `unrecognised` (`unrecognised`),
  ADD KEY `addr` (`addr`),
  ADD KEY `txID` (`txID`),
  ADD KEY `txDate` (`txDate`),
  ADD KEY `txConfirmed` (`txConfirmed`),
  ADD KEY `txCheckDate` (`txCheckDate`),
  ADD KEY `processed` (`processed`),
  ADD KEY `processedDate` (`processedDate`),
  ADD KEY `recordCreated` (`recordCreated`),
  ADD KEY `key1` (`boxID`,`orderID`),
  ADD KEY `key2` (`boxID`,`orderID`,`userID`);

--
-- Indexes for table `css`
--
ALTER TABLE `css`
  ADD PRIMARY KEY (`css_id`);

--
-- Indexes for table `daily_interest`
--
ALTER TABLE `daily_interest`
  ADD PRIMARY KEY (`daily_interest_id`);

--
-- Indexes for table `demo_account`
--
ALTER TABLE `demo_account`
  ADD PRIMARY KEY (`demo_id`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `deposit_old`
--
ALTER TABLE `deposit_old`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `deposit_req`
--
ALTER TABLE `deposit_req`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `downlines`
--
ALTER TABLE `downlines`
  ADD PRIMARY KEY (`down_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `forexnews`
--
ALTER TABLE `forexnews`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipn_handle`
--
ALTER TABLE `ipn_handle`
  ADD PRIMARY KEY (`handle_id`);

--
-- Indexes for table `ipn_response`
--
ALTER TABLE `ipn_response`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `level_commission`
--
ALTER TABLE `level_commission`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `live_statistics`
--
ALTER TABLE `live_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_subjects`
--
ALTER TABLE `mail_subjects`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `mandatory_list`
--
ALTER TABLE `mandatory_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `meta_info`
--
ALTER TABLE `meta_info`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offlinepay`
--
ALTER TABLE `offlinepay`
  ADD PRIMARY KEY (`deposit_id`);

--
-- Indexes for table `parterners`
--
ALTER TABLE `parterners`
  ADD PRIMARY KEY (`parter_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pass_saver`
--
ALTER TABLE `pass_saver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_process`
--
ALTER TABLE `payment_process`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pay_period`
--
ALTER TABLE `pay_period`
  ADD PRIMARY KEY (`pay_period_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `plan_master`
--
ALTER TABLE `plan_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotional`
--
ALTER TABLE `promotional`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`query_id`);

--
-- Indexes for table `rate_us`
--
ALTER TABLE `rate_us`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `representative`
--
ALTER TABLE `representative`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `representatives`
--
ALTER TABLE `representatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representative_level_commission`
--
ALTER TABLE `representative_level_commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `representative_referal`
--
ALTER TABLE `representative_referal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sitebanner`
--
ALTER TABLE `sitebanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_manager`
--
ALTER TABLE `site_manager`
  ADD PRIMARY KEY (`feature_id`);

--
-- Indexes for table `site_statistics`
--
ALTER TABLE `site_statistics`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `sub_deposit`
--
ALTER TABLE `sub_deposit`
  ADD PRIMARY KEY (`sub_deposit_id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
  ADD PRIMARY KEY (`footer_id`);

--
-- Indexes for table `tbl_hits`
--
ALTER TABLE `tbl_hits`
  ADD PRIMARY KEY (`hits_id`);

--
-- Indexes for table `tbl_ip`
--
ALTER TABLE `tbl_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_cron`
--
ALTER TABLE `test_cron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_conversation`
--
ALTER TABLE `ticket_conversation`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `topic_detail`
--
ALTER TABLE `topic_detail`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `update_program`
--
ALTER TABLE `update_program`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `useronline`
--
ALTER TABLE `useronline`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`withdraw_id`);

--
-- Indexes for table `withdraw_pay`
--
ALTER TABLE `withdraw_pay`
  ADD PRIMARY KEY (`pay_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_commission`
--
ALTER TABLE `admin_commission`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `advertisement_banners`
--
ALTER TABLE `advertisement_banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `advertisement_plans`
--
ALTER TABLE `advertisement_plans`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `alerts_table`
--
ALTER TABLE `alerts_table`
  MODIFY `alerts_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blocktrail_ipn`
--
ALTER TABLE `blocktrail_ipn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cb_response`
--
ALTER TABLE `cb_response`
  MODIFY `int` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_table`
--
ALTER TABLE `cms_table`
  MODIFY `cms_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `coin_sell`
--
ALTER TABLE `coin_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contentmodify`
--
ALTER TABLE `contentmodify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `country_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `crypto_payments`
--
ALTER TABLE `crypto_payments`
  MODIFY `paymentID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `css`
--
ALTER TABLE `css`
  MODIFY `css_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `daily_interest`
--
ALTER TABLE `daily_interest`
  MODIFY `daily_interest_id` int(40) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demo_account`
--
ALTER TABLE `demo_account`
  MODIFY `demo_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `deposit_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `deposit_old`
--
ALTER TABLE `deposit_old`
  MODIFY `deposit_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit_req`
--
ALTER TABLE `deposit_req`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downlines`
--
ALTER TABLE `downlines`
  MODIFY `down_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `forexnews`
--
ALTER TABLE `forexnews`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=717;

--
-- AUTO_INCREMENT for table `ipn_handle`
--
ALTER TABLE `ipn_handle`
  MODIFY `handle_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipn_response`
--
ALTER TABLE `ipn_response`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level_commission`
--
ALTER TABLE `level_commission`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=781;

--
-- AUTO_INCREMENT for table `live_statistics`
--
ALTER TABLE `live_statistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail_subjects`
--
ALTER TABLE `mail_subjects`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mandatory_list`
--
ALTER TABLE `mandatory_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `meta_info`
--
ALTER TABLE `meta_info`
  MODIFY `meta_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offlinepay`
--
ALTER TABLE `offlinepay`
  MODIFY `deposit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parterners`
--
ALTER TABLE `parterners`
  MODIFY `parter_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pass_saver`
--
ALTER TABLE `pass_saver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `payment_process`
--
ALTER TABLE `payment_process`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pay_period`
--
ALTER TABLE `pay_period`
  MODIFY `pay_period_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `plan_master`
--
ALTER TABLE `plan_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotional`
--
ALTER TABLE `promotional`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `query_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rate_us`
--
ALTER TABLE `rate_us`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `representative`
--
ALTER TABLE `representative`
  MODIFY `rep_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `representatives`
--
ALTER TABLE `representatives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `representative_level_commission`
--
ALTER TABLE `representative_level_commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `representative_referal`
--
ALTER TABLE `representative_referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sitebanner`
--
ALTER TABLE `sitebanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_manager`
--
ALTER TABLE `site_manager`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `site_statistics`
--
ALTER TABLE `site_statistics`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_deposit`
--
ALTER TABLE `sub_deposit`
  MODIFY `sub_deposit_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_hits`
--
ALTER TABLE `tbl_hits`
  MODIFY `hits_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ip`
--
ALTER TABLE `tbl_ip`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=859;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `test_id` int(95) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `test_cron`
--
ALTER TABLE `test_cron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_conversation`
--
ALTER TABLE `ticket_conversation`
  MODIFY `con_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topic_detail`
--
ALTER TABLE `topic_detail`
  MODIFY `topic_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `update_program`
--
ALTER TABLE `update_program`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useronline`
--
ALTER TABLE `useronline`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `withdraw_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdraw_pay`
--
ALTER TABLE `withdraw_pay`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
