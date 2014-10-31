-- phpMyAdmin SQL Dump
-- version 3.5.6
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2014 at 05:27 AM
-- Server version: 5.1.56-community
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nutrabeandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_image` text NOT NULL,
  `gender` varchar(100) NOT NULL,
  `user_permission` varchar(50) NOT NULL,
  `admin_passquestion` text NOT NULL,
  `admin_passanswer` text NOT NULL,
  `groupid` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `user_image`, `gender`, `user_permission`, `admin_passquestion`, `admin_passanswer`, `groupid`, `create_date`, `modify_date`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'test@desss.com', '065049-usr_default.png', 'male', '1', '    ', '    ', 1, '0000-00-00 00:00:00', '2014-10-01 06:50:49'),
(14, 'karuna', '696d29e0940a4957748fe3fc9efd22a3', '', '', '', '', '  ', '  ', 3, '0000-00-00 00:00:00', '2014-05-23 00:21:20'),
(10, 'useradmin', 'e3eb3a3569f8abc9a7bd998375accf18', '', '', '', '', ' ', ' ', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_cms_menu`
--

CREATE TABLE IF NOT EXISTS `admin_cms_menu` (
  `admin_menuid` int(11) NOT NULL AUTO_INCREMENT,
  `admin_menuname` varchar(500) NOT NULL,
  `admin_menuurl` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `menugroup_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_menuid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `admin_cms_menu`
--

INSERT INTO `admin_cms_menu` (`admin_menuid`, `admin_menuname`, `admin_menuurl`, `parent_id`, `menugroup_id`, `order_id`, `created_date`) VALUES
(1, 'Request Quote', 'request_quote.php', 0, 0, 0, '2014-10-27 12:21:42'),
(2, 'Request Qoute', 'request_quote.php', 0, 0, 0, '2014-04-24 05:59:59'),
(4, 'Users', 'user_list.php', 0, 1, 2, '2014-04-24 08:33:21'),
(5, 'Analitics', 'analitic_code.php', 0, 1, 3, '2014-04-24 08:33:21'),
(6, 'Blog', 'blog.php', 0, 0, 0, '2014-04-23 23:07:29'),
(7, 'Contact', 'contact.php', 0, 0, 0, '2014-04-23 23:07:47'),
(8, 'New Page', 'page_index.php', 0, 0, 0, '2014-04-23 23:08:03'),
(9, 'Home Banner', 'homebanner.php', 0, 0, 0, '2014-04-23 23:08:20'),
(10, 'Map', 'maps.php', 0, 0, 0, '2014-04-23 23:08:41'),
(11, 'Main Page', 'main_page.php', 0, 0, 0, '2014-04-23 23:13:12'),
(12, 'Menu Navigation', 'menu_navigation.php', 0, 0, 0, '2014-04-23 23:09:14'),
(13, 'Portfolio', 'view_industry.php', 0, 0, 0, '2014-04-23 23:09:33'),
(14, 'Footer Link', 'viewFooterDetail.php', 0, 0, 0, '2014-04-23 23:09:51'),
(15, 'Tob Banner Link', 'top_banner_links.php', 0, 0, 0, '2014-04-23 23:10:08'),
(16, 'Tab Content', 'content_tab.php', 0, 0, 0, '2014-04-26 12:12:39'),
(17, 'Admin Group', 'admin_group_view.php', 0, 0, 0, '2014-04-23 23:10:47'),
(18, 'Admin Menu Group', 'menu_group.php', 0, 0, 0, '2014-04-26 11:35:11'),
(19, 'Product', 'product.php', 0, 0, 0, '2014-05-13 23:02:24'),
(20, 'My Profile', 'myprofile.php', 0, 0, 0, '2014-05-13 23:05:12'),
(21, 'Order Details', 'order_details.php', 0, 0, 0, '2014-05-13 23:12:06'),
(22, 'Tax', 'tax.php', 0, 0, 0, '2014-05-14 23:48:45'),
(23, 'Menu Name', 'menu_name.php', 0, 0, 0, '2014-05-15 22:40:45'),
(24, 'User Details', 'user_details.php', 0, 0, 0, '2014-05-15 22:42:19'),
(25, 'Invoices', 'invoice.php', 0, 0, 0, '2014-05-15 22:44:43'),
(26, 'Brands', 'brands.php', 0, 0, 0, '2014-05-18 00:55:36'),
(27, ' Category', 'categories.php', 0, 0, 0, '2014-05-18 04:17:30'),
(28, 'Url Rewrite', 'urlrewrite.php', 0, 0, 0, '2014-05-18 04:29:44'),
(29, 'Admin Group', 'admin_group_view.php', 0, 0, 0, '2014-05-20 02:15:08'),
(30, 'Social Media', 'social_media_list.php', 0, 0, 0, '2014-05-22 22:01:53'),
(31, 'Testimonial', 'testimonials_list.php', 0, 0, 0, '2014-05-22 22:03:47'),
(32, 'Frequent', 'frequent_list.php', 0, 0, 0, '2014-05-23 02:28:52'),
(34, 'Success', 'success.html', 0, 0, 0, '2014-05-24 05:49:56'),
(35, 'Shipping Details', 'shipping_details.php', 0, 0, 0, '2014-05-29 15:03:30'),
(36, 'Catalog', '#', 0, 0, 0, '2014-06-03 17:08:43'),
(37, 'Promotions', '#', 0, 0, 0, '2014-06-12 14:01:21'),
(38, 'Promo Quote', 'promo_quote.php', 0, 0, 0, '2014-06-12 14:03:47'),
(39, 'Attributes', 'catalog_product_attribute.php', 0, 0, 0, '2014-06-17 18:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `advertisement_tbl`
--

CREATE TABLE IF NOT EXISTS `advertisement_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) NOT NULL,
  `image_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `advertisement_tbl`
--

INSERT INTO `advertisement_tbl` (`id`, `image_name`, `image_type`) VALUES
(1, 'adbanner.gif', 1),
(2, 'ad3.jpg', 2),
(7, 'ad3.jpg', 3),
(5, 'adbanner.gif', 5),
(8, 'ad3.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `analitic_tbl`
--

CREATE TABLE IF NOT EXISTS `analitic_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_misc` text NOT NULL,
  `g_analitic` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `analitic_tbl`
--

INSERT INTO `analitic_tbl` (`id`, `meta_misc`, `g_analitic`) VALUES
(1, '<meta http-equiv="X-UA-Compatible" content="IE=edge" />\r\n<meta name="author" content="desss" />\r\n<meta name="msvalidate.01" content="AFF2FF8E340C6E6EDDCE685B044FE393" />\r\n<meta name="google-site-verification" content="HAmClMrTChhktEwZ7ivYC64sFEG-28uFPDz-4TSa5Z8" />\r\n<meta name="verify-v1"  content="6acnMpOYebURHpg/TeKl2E48GAoZQLVkYxP52C7ttEs=" />\r\n<META name="y_key" content="d7ef66b2d7ad3080" />\r\n<meta name="msvalidate.01" content="C9436AE4100DD3B916EF4ED938717F2D" />\r\n<meta name="robots" content="index, follow, noydir" >                                                ', '<script type="text/javascript">\r\n\r\n  var _gaq = _gaq || [];\r\n  _gaq.push([''_setAccount'', ''UA-8352606-1'']);\r\n  _gaq.push([''_trackPageview'']);\r\n\r\n  (function() {\r\n    var ga = document.createElement(''script''); ga.type = ''text/javascript''; ga.async = true;\r\n    ga.src = (''https:'' == document.location.protocol ? ''https://ssl'' : ''http://www'') + ''.google-analytics.com/ga.js'';\r\n    var s = document.getElementsByTagName(''script'')[0]; s.parentNode.insertBefore(ga, s);\r\n  })();\r\n\r\n</script>                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_tbl`
--

CREATE TABLE IF NOT EXISTS `attribute_tbl` (
  `attribute_id` int(11) NOT NULL AUTO_INCREMENT,
  `attribute_code` varchar(100) NOT NULL,
  `attribute_scope` varchar(100) NOT NULL,
  `attribute_default_value` int(11) NOT NULL,
  `attribute_unique_value` varchar(100) NOT NULL,
  `attribute_values_required` varchar(100) NOT NULL,
  `attribute_apply_to` varchar(100) NOT NULL,
  `attribute_admin` varchar(100) NOT NULL,
  `attribute_default_store` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`attribute_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `attribute_tbl`
--

INSERT INTO `attribute_tbl` (`attribute_id`, `attribute_code`, `attribute_scope`, `attribute_default_value`, `attribute_unique_value`, `attribute_values_required`, `attribute_apply_to`, `attribute_admin`, `attribute_default_store`, `create_date`) VALUES
(2, 'admin', 'Store View', 100, 'No', 'Yes', 'Simple Product', 'test', 'test', '2014-06-17 14:03:54'),
(3, 'test', 'Website', 11, 'Yes', 'No', 'Grouped Product', 'test', 'test', '2014-06-17 14:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `authorize_net_status`
--

CREATE TABLE IF NOT EXISTS `authorize_net_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enabled` enum('Yes','No') NOT NULL,
  `title` text NOT NULL,
  `mode_type` varchar(20) NOT NULL,
  `gateway_live` text NOT NULL,
  `apn_login_live` text NOT NULL,
  `trans_key_live` text NOT NULL,
  `gateway_sandbox` text NOT NULL,
  `apn_login_sandbox` text NOT NULL,
  `trans_key_sanbox` text NOT NULL,
  `cr_card_type` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  `time_created` datetime NOT NULL,
  `update_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `authorize_net_status`
--

INSERT INTO `authorize_net_status` (`id`, `enabled`, `title`, `mode_type`, `gateway_live`, `apn_login_live`, `trans_key_live`, `gateway_sandbox`, `apn_login_sandbox`, `trans_key_sanbox`, `cr_card_type`, `sort_order`, `time_created`, `update_datetime`) VALUES
(1, 'Yes', 'test', 'Test Mode', 'Gateway URL ( Production ):', 'API Login ID ( Production ):', 'Transaction Key ( Production ):', 'Gateway URL ( Test Mode ):', 'API Login ID ( Test Mode ):', 'Transaction Key ( Test Mode ):', 'a:1:{i:0;s:8:"Discover";}', 0, '2014-06-06 11:09:42', '2014-06-06 20:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `banner_message`
--

CREATE TABLE IF NOT EXISTS `banner_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(500) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `banner_message`
--

INSERT INTO `banner_message` (`id`, `message`, `created_date`) VALUES
(1, 'gfgdsfg', '2012-05-22 16:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `banner_tbl`
--

CREATE TABLE IF NOT EXISTS `banner_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `banner_tbl`
--

INSERT INTO `banner_tbl` (`id`, `image_name`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tbl`
--

CREATE TABLE IF NOT EXISTS `blog_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(220) NOT NULL,
  `title` varchar(200) NOT NULL,
  `real_description` text NOT NULL,
  `img_description` text NOT NULL,
  `meta_name` text NOT NULL,
  `meta_content` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `h1_title` text NOT NULL,
  `h2_title` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `meta_misc` text NOT NULL,
  `req_quo` varchar(500) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `is_menu` tinyint(1) NOT NULL,
  `order_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `Created_Date` datetime NOT NULL,
  `is_show` int(11) NOT NULL,
  `iconimg` varchar(200) NOT NULL,
  `is_restaurant` varchar(300) NOT NULL,
  `img_alt` varchar(100) NOT NULL,
  `blog_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `blog_tbl`
--

INSERT INTO `blog_tbl` (`id`, `file_name`, `title`, `real_description`, `img_description`, `meta_name`, `meta_content`, `meta_title`, `meta_keyword`, `h1_title`, `h2_title`, `image`, `meta_misc`, `req_quo`, `image_name`, `is_menu`, `order_id`, `parent_id`, `Created_Date`, `is_show`, `iconimg`, `is_restaurant`, `img_alt`, `blog_order`) VALUES
(7, 'salient-features-of-a-well-developed-website.html', 'Salient Features Of A Well Developed Website', '<p>\r\n	In this fast growing world of technology, internet plays a vital role. Nowadays everyone has become so computer savvy, that if they want any information, the first thing that they do is to browse the internet.So a website should be capable of giving the required information all at a glance. So if you want your business to grow in leaps and bounds, the first thing that you should do is to own a web site exclusively for you and your requirements.Your success story depends on how much internet exposure your website gets.</p>\r\n<h2>\r\n	Let us now discuss what the features of a well developed website should be:</h2>\r\n<p>\r\n	&bull; A webpage should be aesthetic and informative. It has to be visual soft and It should also give all the necessary information about your products and services..<br />\r\n	&bull; The information given should speak volumes about your company&#39;s efficiency.It should bring more and more visitors to your website. These visits should be converted to business.<br />\r\n	&bull; A webpage should be designed in such a way that it is easily navigable.<br />\r\n	&bull; The content of the webpages should be so good that it should give all relevant information.<br />\r\n	&bull; The website should be SEO friendly, so that it ranks first in the Google updates. If your company&#39;s name appears first, that means it is very popular and well designed.<br />\r\n	&bull; See to it that your contents have the right keywords at the right place and the right number of times. Keyword density plays a major role in highlighting a company.<br />\r\n	&bull; If you are an online business man, then a compelling web presence is very important. Nowadays online business has become very popular.<br />\r\n	&bull; A well designed ecommerce website is the best solution for your online business. Care should be taken that you develop a website that caters smooth online transactions and offers different payment options.<br />\r\n	&bull; You can upload blogs and articles, using different tools like Wordpress, Joomla and Drupal, that highlight the various features of your company.<br />\r\n	&bull; Your webpage should be well connected to all the social networking websites like Facebook and Twitter. Sometimes you can directly interact with your customers.<br />\r\n	&bull; Logo brochure and catalog designs can give a great internet exposure to your website. A well designed logo or a brochure can draw the attention of the customer, thus giving an impetus to your business.<br />\r\n	&bull; When you contact any web designer or developer ask them to create customized web pages just for you. Your website should be designed according to your requirements.<br />\r\n	&bull; If you already own a website that is static, or if you want to redesign a website, then a web designer can do so and construct a website to speak about your business.</p>\r\n<p>\r\n	As a business man, you may set your goals but you need a strong media to help you reach it. So own a website that gives you instant recognition and carry your business to a great height within a short span of time. Get an excellent website and grow into a successful entrepreneur.</p>\r\n', 'In this fast growing world of technology, internet plays a vital role. Nowadays everyone has become so computer savvy, that if they want any information, the first thing that they do is to browse the internet.', '', 'Read our blog for Salient Features of a Well Developed Website and grow into a successful entrepreneur.', 'Salient Features of a Well Developed Website | DESSS', 'Web Design, Well Developed Website', 'Salient Features of a Well Developed Website', '', 'developed.2.jpg', '                                                                ', 'contact-us.html', '', 45, 1, 0, '2013-04-15 00:00:00', 1, '', '', '', 1),
(10, 'seo-the-simple-formula-of-ranking-traffic-conversion.html', 'SEO - The simple formula of Ranking + Traffic = Conversion', '<p>\r\n	In this blog let us first discuss what SEO is and then find out why it is important for a business man and his website.</p>\r\n<p>\r\n	What is SEO - SEO is the abbreviation of the term Search Engine Optimization. This is actually a process by which we plan, construct, design web pages and then analyze them, so as to bring them to the top of the search engine updates.</p>\r\n<p>\r\n	Many a times, it so happens that your website is live on the website, but no one notices it. This is very frustrating. An effective SEO brings global recognition to your website through keyword rich Contents, tags and blogs. SEO Services would make your web pages more informative, more attractive and more relevant by adding specified keywords and contents so that they are identified by the crawling and indexing software of the Search Engines.</p>\r\n<p>\r\n	Let us now discuss how exactly search Engine ranks pages. The Search Engines make use of programs like spiders, crawlers and robots that analyses and index the links of the WebPages and add them to the database of the search Engine. These search engines periodically do this analysis and add details to the database. As far as indexing is concerned, the different strategies are followed by them and are constantly changed and fine tuned. Care should be taken that the pages are keyword rich to improve traffic to your website.</p>\r\n<p>\r\n	<strong>Shall we discuss the rules of how to bring traffic to your website? </strong></p>\r\n<p>\r\n	1<sup>st</sup> Rule &ndash; <strong>Carefully select Keywords</strong>: This is an important strategy to keep your website on the top of Search Engine rankings. Select keywords that are customer oriented.</p>\r\n<p>\r\n	2<sup>nd</sup> Rule &ndash; <strong>Incorporate the selected keywords into contents</strong>: This strategy would make it easy for the crawlers and spiders to identify the keywords and analyze them and later index them. Care should be taken that the contents are informative and relevant.</p>\r\n<p>\r\n	3<sup>rd</sup> Rule &ndash; <strong>Integrate keywords with Meta title and Meta description</strong>. This strategy is very important to help the crawlers search your site. Meta Tag is just a line and Meta description is just 2 or 3 lines. So make them keyword rich. You should definitely use high relevant keywords or company&rsquo;s home.</p>\r\n<p>\r\n	4<sup>th</sup> Rule <strong>&ndash; Form user friendly URLs</strong>: See to it that your website is easily navigable and not crowded or clustered. If they are crowded, then it becomes difficult for search spiders to read them and index them.</p>\r\n<p>\r\n	5<sup>th</sup> Rule &ndash; <strong>Quality links to your website increases traffic</strong>. Inbound links can be got through blogs, articles, forums and directories by linking your company&rsquo;s website to them. These inbound links are very important to improve rankings.</p>\r\n<p>\r\n	Incorporate all these SEO Strategies and make your website rank high on Search Engine updates and increase traffic to your website. These visitors would become your future customers.</p>\r\n', 'In this blog let us first discuss what SEO is and then find out why it is important for a business man and his website. We bring them to the top of the search engine updates.', '', 'SEO is the abbreviation of the term Search Engine Optimization. This is actually a process by which we plan, construct, design web pages and then analyze them, so as to bring them to the top of the search engine updates', 'SEO - The simple formula of Ranking - Desss', 'Search Engine Marketing, Email Marketing,Online Marketing', 'SEO - The simple formula of Ranking + Traffic = Conversion', '', 'ggn7b92t (2).jpg', '                                                                                                        ', 'contact-us.html', '', 45, 2, 0, '2013-05-09 00:00:00', 1, '', '', '', 1),
(11, 'online-marketing-techniques-dos-and-donts.html', 'Online Marketing Techniques: Dos and Don''ts', '<p>\r\n	To promote online marketing we have to adopt certain marketing techniques like bulk emails, blog commenting, article submission, and other SEO marketing techniques. Over the years customers and search engines like Google, Yahoo and Bing have started identifying low quality marketing techniques and have given them big thumbs down. In this blog we will discuss the dos and don&rsquo;ts of these marketing strategies.</p>\r\n<p>\r\n	1. <strong><u>Blog Commenting</u></strong><u>:</u> <u>DO</u>: Blog commenting is a great way to attract visitors to your website. Care should be taken to read an article or blog that you understand very well and then post honest comments. The comments should be informative and intelligent. You can add a relevant link at the end of the comment. This blog commenting works out best when it is written manually.</p>\r\n<p>\r\n	<u>Don&rsquo;t</u>: Don&rsquo;t add comments using any software that leaves comments on thousands of blogs quickly and at a stretch. If a spammy comment is published, the links provided do not give the required SEO benefits</p>\r\n<p>\r\n	2. <strong><u>Article submission</u></strong><u>:</u> DO: Write unique article pertaining to the website. Make the article as informative and creative as possible. You can include applicable back links to your site in this article.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; A unique article, with back link to your website brings more traffic. Take trouble to post your articles on high quality website. When you post articles on quality sites, you will also get quality traffic to your website. If the contents are clear and unique your website will not go into Google penalty box.</p>\r\n<p>\r\n	<u>Dont</u>: Don&rsquo;t simply copy article and post there with minor variations. Google has been narrowing down on low quality articles and penalizing them.</p>\r\n<p>\r\n	<u><strong>Outsourcing SEO and Marketing</strong>: </u>DO: Do as much as marketing as you can. Learn what SEO and online marketing are. Take care to select a SEO service provider meticulously. Check their credentials and capabilities and then outsource SEO and marketing services to them. Your city will house many SEO service providers. Choose the right one.&nbsp;</p>\r\n<p>\r\n	<u>Dont:</u> Don&rsquo;t simply outsource marketing and SEO to other firms and turn a deaf ear to what they say and a blind eye to what they do. Keep a strong track record of what they do to boost your business.</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SEO and other online marketing strategies are very important to your business. Take careful measures to promote your business because it is your business, your money and your time. Work for a better business, better ROI and better life.</p>\r\n', 'To promote online marketing we have to adopt certain marketing techniques like bulk emails, blog commenting, article submission, and other SEO marketing techniques. ', '', 'To promote online marketing we have to adopt certain marketing techniques like bulk emails, blog commenting, article submission, and other SEO marketing techniques. ', 'Online Marketing Techniques: Dos and Donts, Blog - Desss', 'Online Marketing Techniques: Dos and Don’ts, Blog, Desss', 'Online Marketing Techniques: Dos and Donts', '', 'online.1.jpg', '                                                                        ', 'contact-us.html', '', 45, 3, 0, '2013-05-22 00:00:00', 1, '', '', '', 1),
(13, 'is-it-possible-to-store-sync-and-share-with-your-team-members-using-sharepoint-office-365.html', 'Is it possible to store, sync and share with your team members using SharePoint Office 365', '<p>\r\n	SharePoint has many features that favor the productivity and business efficiency of enterprises. You may be individual manager working alone on a document or you are a team working together on a project. SharePoint Office 365 can help you store, sync and share your document with a chosen few or generally with others. In this blog, let us discuss how Skydrive Pro, SharePoint sites, Yammer, Microsoft Word and other features of Office 365 work seamlessly to help you create, store and share documents.</p>\r\n<ul>\r\n	<li>\r\n		<p>\r\n			On your visit to another organization you would have had interesting conversation with some customers and you would have hit upon a great idea of a new product or service. Immediately you create a document using Microsoft Word and store them for future use and get ready for your next meeting. Later on when you find time to work on a document, since the document is stored in Sky Drive Pro, you can even work from the tablet which allows access from multiple devices. Even if the place does not have Wi- Fi connection, you can still work offline because Sky Drive Pro Sync Client has synced all the contents offline. So there is no problem working offline without internet connection.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			Later on when you get time to get connected to internet you can continue working on it and the changes that you have made in the document syncs with the original version and the changes appear in the document</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			The next step is that you want to get the feedback of the other colleagues. Now you can log on to the organization&rsquo;s Yammer network and immediately others will start posting comments on your work.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			If you need more sharing, Sky Drive Pro helps you share the documents with others. You can select and share with people with whom you want to. You need not create multiple version of the document because it is stored online. Now Lync helps you to chat with others.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			Once you have some concrete ideas in place, now it is time for some cross functional team work. This is where SharePoint features help you. A SharePoint site will act as a central work space for the team to manage the project.</p>\r\n	</li>\r\n</ul>\r\n<p>\r\n	Now you realize how SharePoint Office 365 helps you to create, store and organize content. Enable yourself to SharePoint Office 365 and enjoy the benefits. You have to now just work on the project and complete it successfully.</p>\r\n', 'SharePoint has many features that favor the productivity and business efficiency of enterprises. ', '', 'SharePoint has many features that favor the productivity and business efficiency of enterprises. Read our blog.', 'Is it possible to store, sync and share with your team members using SharePoint Office 365 -DESSS', 'SharePoint App Development Houston, DESSS', 'Is it possible to store, sync and share with your team members using SharePoint Office 365', '', 'sharepoint-office.jpg', '                        ', 'contact-us.html', '', 45, 4, 0, '2013-08-12 01:57:21', 1, '', '', '', 1),
(14, 'how-can-email-marketing-really-help-you.html', 'How can email marketing really help you?', '<p>\r\n	You may be a successful businessman or you would have started a new business. At this juncture, the most important question is &#39;How to market your products and services?&#39; Many others would have suggested marketing strategies like <strong>Internet marketing</strong>, <a href="http://www.desss.com/it-services/search-engine-marketing-houston.html"><strong>Social Media marketing</strong></a> and <a href="http://www.desss.com/search-engine-marketing/google-adwords-houston.html"><strong>Google ad words</strong></a>. But have you understood that this is the apt time to try an &lsquo;email blast&rsquo;, the best futuristic approach? There is no right time on a wrong time to send an email blast. If your business is good, this will further enhance it and if the business is taking a plunge, a properly constructed <a href="http://www.desss.com/search-engine-marketing/email-marketing-houston.html"><strong>email blast will bring the business to the top</strong></a>.</p>\r\n<p>\r\n	<strong>How attractive your email content should be?</strong></p>\r\n<p>\r\n	If your customers were to check the mails and found just another customary news letter, they will simply delete it without even opening it. So care should be taken to create an interesting, catchy email, with unique title that the customers will not miss, Let your email talk or give interesting information about your services, advantages and even the exciting offers that they are going to get on some products or services. Let the language be simple and understandable. For example you can title your email this way: &rsquo;Hurry up! Don&rsquo;t Miss the exciting offers!&rsquo; The customers on reading this title will definitely be intrigued to find out what special offers are there in your company.</p>\r\n<p>\r\n	<strong>The advantages of an &lsquo;email blast&rsquo;:</strong></p>\r\n<ul>\r\n	<li>\r\n		One of the best ways of marketing your product.</li>\r\n	<li>\r\n		Helps you be in contact with your customers.</li>\r\n	<li>\r\n		You retain your old customers.</li>\r\n	<li>\r\n		You get new customers.</li>\r\n	<li>\r\n		You are able to convey important information at the right time.</li>\r\n</ul>\r\n<p>\r\n	Try this futuristic approach of marketing and you will definitely benefit from this.</p>\r\n', 'You may be a successful businessman or you would have started a new business. At this juncture, the most important question is ‘How to market your products and services?’', '', 'DESSS Email Marketing Blog, Houston. You may be a successful businessman or you would have started a new business. At this juncture, the most important question is ‘How to market your products and services?', 'How can email marketing really help you?', 'Email Marketing Houston, DESSS', 'How can email marketing really help you', '', 'marketing.jpg', '                                        ', 'contact-us.html', '', 45, 5, 0, '2013-08-14 00:00:00', 1, '', '', '', 1),
(15, 'the-top-5-ways-to-keep-your-ecommerce-website-secure-and-improve-trust-level.html', 'The Top 5 ways to keep your Ecommerce Website Secure and improve trust level', '<p>\r\n	With the exponential growth in ecommerce, many businessmen have started wanting <a href="http://www.desss.com/ecommerce-services/ecommerce-web-design-houston.html"><strong>ecommerce website</strong></a> that enables online business. These websites should have all the security features to promote safe online business. A recent statistical study showed that 20% of customers have left ecommerce sites and online shopping because of security issues. With the growth in cyber criminals, many customers do not wish to do any transaction online. As a business man, you have to take some steps to keep your website secure and develop trust in the mind of the people who are using these facilities. In this blog, I am going to discuss how we can keep our <a href="http://www.desss.com/ecommerce-services/ecommerce-web-development-houston.html"><strong>ecommerce website safe and secure</strong></a>.</p>\r\n<p>\r\n	<strong>Use and advertise a service to increase trust:</strong> Use a service like SAFE or McAfee secure that will increase the security level of your ecommerce website. Advertise the logos on your website. The visitors who come to your website will understand that you give top priority to security. They develop trust and this will increase the business efficiency of your business. You can even use VeriSign Trust Seal which is visible from Search Engines.</p>\r\n<p>\r\n	<strong>Use a Security Socket Layer (SSL):</strong> When you want to make any kind of data transaction from and to your customer, be sure to use a Security Socket Layer (SSL). The logo is exhibited on your website and the customers will understand that the site to be well protected and thus improve trust level.</p>\r\n<p>\r\n	<strong>Keep all the ecommerce software up to date: </strong> You may use any solution like <a href="http://www.desss.com/ecommerce-services/x-cart-website-design-development-houston.html"><strong>X Cart</strong></a>, <a href="http://www.desss.com/ecommerce-services/zen-cart-website-design-development-houston.html"><strong>Zen Cart</strong></a> or <a href="http://www.desss.com/ecommerce-services/magento-website-design-development-houston.html"><strong>Magento</strong></a> but always keep them updated. Keep the site updated with all the latest security features. Keep your database software and other tools updated. This will help you to save your site from being hacked.</p>\r\n<p>\r\n	<strong>Find out the security features of ISP (Internet Service Provider):</strong> Find out what security arrangement your internet service provider has made. They can use security features like Web Application Firewall or Host Based intrusion Detection System.</p>\r\n<p>\r\n	<strong>Keep an eye on the other features:</strong> Even after following all these security measures, customers may not trust you. The most obvious thing now is to communicate to them your address, phone number or you can even arrange a chat session with them. Explain what security measures you have introduced to keep the website secure. Testimonials and reviews also work very well to improve trust. Add a blog or an article to explain all the security features.</p>\r\n<p>\r\n	Don&rsquo;t wait till your website is hacked. Take stringent safety measures on time and keep your website safe and secure. With these measures you can build the customers trust and retain them for better business efficiency.</p>\r\n', 'With the exponential growth in ecommerce, many businessmen have started wanting ecommerce website that enables online business. These websites should have all the security features to promote safe online business. ', '', 'DESSS Ecommerce web design and development blog, Houston. With the exponential growth in ecommerce, many businessmen have started wanting ecommerce website that enables online business. These websites should have all the security features to promote safe online business. ', 'The Top 5 ways to keep your Ecommerce Website Secure and improve trust level', 'Ecommerce website design houston', 'The Top 5 ways to keep your Ecommerce Website Secure and improve trust level', '', 'ecommerce.jpg', '                ', 'contact-us.html', '', 45, 6, 0, '2013-09-02 01:59:37', 1, '', '', '', 1),
(16, 'the-top-seo-benefits-of-a-responsive-web-design.html', 'The top SEO benefits of a Responsive Web Design, Blog - DESSS', '<p>\r\n	Responsive Designs are mostly preferred by everyone because they are effective on all devices like <a href="http://www.desss.com/it-services/mobile-application-development-houston.html"><strong>mobile</strong></a>, desktop and tablets and <a href="http://www.desss.com/it-services/ipad-app-development-houston.html"><strong>iPad</strong></a>, thus saving time and money. This allows you to create a website that is compatible with all devices. These <a href="http://www.desss.com/showcase/portfolio/responsive-web-design-development-houston.php"><strong>Responsive Web Design websites</strong></a> have many SEO benefits too. In this blog let us discuss what the SEO benefits of Responsive Design Websites are.</p>\r\n<ul>\r\n	<li>\r\n		<p>\r\n			<strong>Consistent SEO friendly content:</strong> There is no need to update different contents for different versions. Just update one and the contents get updated in all. This increases the SEO value of your website. Your site will get a good SERP rating and more visitors will come to your web pages.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			<strong>No fear of canonical problems and penalties for duplicate content:</strong> A canonical code is the code used by search engine crawlers/ spiders to tell search engines which URL is of the original version of your webpage. Since RWD makes 3 sites to one, you need not place a canonical tag to prevent penalty due to duplicate contents. RWD streamlines all the processes and will make the content appear as one.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			<strong>Greater in bound links:</strong> There are chances of getting more inbound links because RWD has the same URL across all devices. A person searching something on a mobile device plugs a URL into the search engine and desktop URL is redirected to mobile specific URL. In RWD all the URL&rsquo;s are the same in all devices, so inbound links become higher. Inbound links are like priceless deposits for your site. The more inbound links you site gets the better SERP ranking it will get.</p>\r\n	</li>\r\n</ul>\r\n<p>\r\n	Responsive Web Design is the most &lsquo;in thing&rsquo; now. It has many other benefits including the <a href="http://www.desss.com/it-services/search-engine-optimization-services-houston.html"><strong>SEO benefits</strong></a>. Opt for a RWD and have a greater business efficiency.</p>\r\n', 'In this blog let us discuss what the SEO benefits of Responsive Design Websites are. These Responsive Web Design websites have many SEO benefits too.', '', 'Responsive Designs are mostly preferred by everyone because they are effective on all devices like mobile, desktop and tablets and iPad, thus saving time and money. These Responsive Web Design websites have many SEO benefits too.', 'The top SEO benefits of a Responsive Web Design | DESSS', '', 'The top SEO benefits of a Responsive Web Design', '', '', '        ', 'contact-us.html', '', 45, 7, 0, '2013-09-25 03:54:47', 1, '', '', '', 1),
(17, 'why-should-you-opt-for-online-document-management-application-software.html', 'Why should you opt for Online Document Management Application software?', '<p>\r\n	With an exponential growth in industrial world, the data that needs to be stored has also grown exponentially. Every organization has documents in the form of files, letters, invoices, bills, feedback letters and others to store and preserve for future growth. Now Online Document Management software has become so popular, that very soon they will replace all the bulky files that are stored in large, giant sized cabinets. With efficient Document Management, the enterprise stands to benefit a lot, like increased productivity, enhanced business efficiency, lower IT spending and it becomes organized in whatever it does.</p>\r\n<h2>\r\n	What exactly is online Document Management software?</h2>\r\n<p>\r\n	This is a tool to help businessmen store, edit, add and manage documents so that they will be helpful later to take important decisions. Recently the law makers of the country have started stressing on the importance of having all the documents managed digitally. Many of the industries have already started working towards paperless future.</p>\r\n<h2>\r\n	Let us now discuss the benefits of online document management:</h2>\r\n<ul>\r\n	<li>\r\n		<p>\r\n			<strong>Sharing becomes easy:</strong> This software enables enterprises easy sharing of data with other employees, management, partners and stake holders. If data are viewed and shared digitally, then the organization work flow speeds up, business efficiency increases and ROI improves. All data sharing processes are automated. So data sharing is a child&rsquo;s play.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			<strong>The enterprise grows in leaps and bounds:</strong> With digitally managing the document, the business owners and managers are able to concentrate on their core business and devote less time to document management. The employees on the hand are able to support greatly on business decisions.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			<strong>No security issues:</strong> These applications software has several layers of security. So any personal data is tightly secured. In fact these documents are more secured than storing files and documents in cabinets.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			<strong>Accessing and comparing of data become easy:</strong> In case you follow the traditional way of storing document in cabinets, it becomes very difficult to find any data, if needed compare them with the older documents. If you follow the new trend of storing documents digitally, then comparing with older data becomes very easy.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			<strong>ECO friendly:</strong> Less of paper work, so environment friendly. You will save money on paper costs, ink/ Toner costs, storage equipment costs, files and cabinet&rsquo;s costs and of course&nbsp; saving the time of the employee.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			<strong>View the files from anywhere, everywhere:</strong> You can view the data from anywhere through the internet. This software makes it possible for managers and business owners view documents from anywhere and can even share files with the other employees.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			<strong>Automates all the processes:</strong> Most of these software automates all the processes. So compiling, viewing, sharing, storing and detailing document become a child&rsquo;s play.</p>\r\n	</li>\r\n</ul>\r\n<p>\r\n	An <a href="http://www.desss.com/solutions/document-management-system-solution-provider-houston.html"><strong>Online Document Management Software</strong></a> offers many advantages. Make use of the software and benefit the most.</p>\r\n', 'With an exponential growth in industrial world, the data that needs to be stored has also grown exponentially. Every organization has documents in the form of files, letters, invoices, bills, feedback letters and others to store and preserve for future growth. ', '', 'With an exponential growth in industrial world, the data that needs to be stored has also grown exponentially. Every organization has documents in the form of files, letters, invoices, bills, feedback letters and others to store and preserve for future growth.', 'Why should you opt for Online Document Management Application software, Blog | DESSS', 'Online Document Management Application software', 'Why should you opt for Online Document Management Application software', '', '', '                        ', 'contact-us.html', '', 45, 8, 0, '2013-09-30 02:39:09', 1, '', '', '', 1),
(18, 'dont-worry-about-ecommerce-fraudulence-follow-these-simple-strategies.html', 'Don''t worry about Ecommerce fraudulence. Follow these simple strategies.', '<p><a href="http:// http//www.desss.com/ecommerce-services/ecommerce-web-design-houston.html"><strong>Ecommerce Websites</strong></a> are a big boon to business, but it has its own disadvantage. Statistics has showed that 0.8% of online business is fraudulent and people have faced a huge revenue loss from online transactions. Don&rsquo;t worry! Follow these simple strategies to keep your online ecommerce business safe and secure.</p>\r\n<p><strong>1. Priority should be given to choosing the right platform:</strong> When it comes to choosing the right platform don&rsquo;t just see the monthly costs and transaction rates. Go a step beyond this and look for security features. See if the platform offers risk management features.</p>\r\n<p><strong>2. Go in for PCI compliance:</strong> Payment Card Industry Data Security Standard (PCI DSS) is a set of security requirements that demands all companies that have online transactions enable a secure environment to keep all credit card information and other sensitive information safe and secure. PCI is designed in such a way that it protects all sensitive data like customers&rsquo; names and account number, expiry date, name, social security number etc. Compliance with PCI has become mandatory. Any non compliance to this will result in huge fines and loss to business.</p>\r\n<p><strong>3. Do a security check of your website:</strong> After taking the first two steps, then make your website as secure as possible for your customers, your business, bank and credit card dealers. Check if the site is shown as &lsquo;https&rsquo;. Update passwords and data base regularly to the web server control panel. You can even hire a security auditor to check whether your site is safe and secure.</p>\r\n<p><strong>4. Add some additional security features:</strong> There are some companies that offer additional security features. They are :</p>\r\n<p>1. Verified by Visa</p>\r\n<p>&nbsp;2. VeriSign</p>\r\n<p>&nbsp;3. McAfee Secure</p>\r\n<p>&nbsp;4. MasterCard Merchant Fraud Protection.</p>\r\n<p><strong>5. Suspicious activities in your website? Setup alerts:</strong> You may set alerts when:</p>\r\n<ul>\r\n<li>The same person places multi orders using various credit cards.</li>\r\n<li>Phone numbers and address don&rsquo;t match.</li>\r\n<li>If someone orders large quantities and want a quick delivery of products and is even ready to pay a little extra.</li>\r\n</ul>\r\n<p><strong>6. Never store any sensitive data:</strong> PCI compliance never allows any business owner to store sensitive data like credit card number, customer data and other CW2 codes.</p>\r\n<p><strong>7. Never Miss the tracking numbers:</strong> Have a tracking number for all the transactions. If there is a tracking number, it becomes easy for us to find out if the product has been delivered to the customer. On the customer receiving a product he can sign the delivery form.</p>\r\n<p><strong>8. Make your customers choose strong passwords:</strong> When the customers open an online account with you, make him choose a strong unique password that cannot be easily hacked.</p>\r\n<p><strong>9. Make your employee aware of all security measures: </strong>Be Strict with your employees regarding the security measures that you have taken regarding passwords, credit card numbers, names and social security numbers.</p>\r\n<p>Ecommerce sites can be really beneficial to you. Take care of all the security features and make your <a href="http://www.desss.com/ecommerce-services/ecommerce-web-design-houston.html"><strong>ecommerce website</strong></a> as safe and secure as possible.</p>', 'Ecommerce Websites are a big boon to business, but it has its own disadvantage. Statistics has showed that 0.8% of online business is fraudulent and people have faced a huge revenue loss from online transactions. ', '', 'Ecommerce Websites are a big boon to business, but it has its own disadvantage. Statistics has showed that 0.8% of online business is fraudulent and people have faced a huge revenue loss from online transactions. ', 'Dont worry about Ecommerce fraudulence. Follow these simple strategies, Blog, DESSS', 'Ecommerce Web Design, Ecommerce Web Development, Ecommerce Website Design, Ecommerce Website Development', 'Dont worry about Ecommerce fraudulence. Follow these simple strategies', 'blog', '', '                        ', 'contact-us.html', '', 45, 9, 0, '2014-04-10 12:50:50', 1, '', '', '', 1),
(19, 'what-seo-strategies-that-you-should-follow-to-give-better-serp-ranking-to-your-ecommerce-website.html', 'What SEO strategies that you should follow to give better SERP ranking to your ecommerce website?', '<p>\r\n	Whether you are building a new website or redesigning and improving an existing website you have to follow certain SEO strategies to bring to your website to the top of SERP rankings.</p>\r\n<p>\r\n	<strong>Strategy No 1:</strong></p>\r\n<h2>\r\n	<strong>Do Complete Research of Keywords:</strong></h2>\r\n<p>\r\n	While choosing keywords to optimize your website you have to keep in mind three important factors i.e relevancy, how high is the search volume and ranking difficulty. Choose keywords that are relevant to your products. Don&rsquo;t choose keywords that are highly competitive. If you use such keywords that are highly competitive then your website will take a long time to appear on SERP ranking page. Choose some additional keywords and use them in the blog for better optimization.You can even use long tail keywords in blogs. Also make a list of keywords that your competitors are trying to optimize .Try to focus on these keywords and optimize them.</p>\r\n<p>\r\n	<strong>Strategy 2:</strong></p>\r\n<h2>\r\n	<strong>Find out from where your competitors are getting their inbound links:</strong></h2>\r\n<p>\r\n	You can also try to get inbound links from websites that have high&nbsp; DA(Domain Authority) or PA (Page Authority).</p>\r\n<p>\r\n	<strong>Strategy 3:</strong></p>\r\n<h2>\r\n	<strong>Fix all site errors:</strong></h2>\r\n<p>\r\n	Using tools find out all the errors of your website like 404 redirection, duplicate content, Meta titles and Meta descriptions.</p>\r\n<p>\r\n	<strong>Strategy 4:</strong></p>\r\n<h2>\r\n	<strong>Improve the speed of the website:</strong></h2>\r\n<p>\r\n	It is very important that your website should load quickly. You can use more server space, use different CMS and reduce images and files.</p>\r\n<p>\r\n	<strong>Strategy 5:</strong></p>\r\n<h2>\r\n	<strong>Improve on-page Optimization:</strong></h2>\r\n<p>\r\n	Target on key word optimization, create URLs that are user friendly, make the Meta titles and descriptions meaningful and simple, create well structured sub pages and provide proper internal links.</p>\r\n<p>\r\n	<strong>Strategy 6:</strong></p>\r\n<h2>\r\n	<strong>&nbsp;Give great user experience:</strong></h2>\r\n<p>\r\n	See to it the all the processes work seamlessly, check whether the contact form works properly and make sure that the ecommerce website has increased usability.</p>\r\n<p>\r\n	<strong>Strategy 7:</strong></p>\r\n<h2>\r\n	<strong>Opt for Responsive Design : </strong></h2>\r\n<p>\r\n	With smart phones becoming popular create websites that work seamlessly on all devices like PC, laptop, smart phones and tablets. This will enable users to do online business while on the go.</p>\r\n<p>\r\n	<strong>Strategy 8:</strong></p>\r\n<h2>\r\n	<strong>Opt for customer review and testimonials:</strong></h2>\r\n<p>\r\n	This will definitely increase credibility to the website. Pack your website with fresh contents, testimonials and frequent reviews. These features will give great internet presence.</p>\r\n<p>\r\n	<strong>Strategy 9:</strong></p>\r\n<h2>\r\n	<strong>Add snippets or images:</strong></h2>\r\n<p>\r\n	This will add credibility and make people visit your website.</p>\r\n<p>\r\n	<strong>Strategy 10:</strong></p>\r\n<h2>\r\n	<strong>Integrate your site with social media websites:</strong></h2>\r\n<p>\r\n	&nbsp;Add social media buttons like face book, twitter, Google+ and LinkedIn. This will improve internet presence.</p>\r\n<p>\r\n	Ecommerce websites are the need of the day. To make your ecommerce website successful follow these <a href="http://www.desss.com/it-services/search-engine-optimization-services-houston.html"><strong>10 major SEO strategies</strong></a> and win the stiff business competition.</p>\r\n', 'Whether you are building a new website or redesigning and improving an existing website you have to follow certain SEO strategies to bring to your website to the top of SERP rankings.', '', 'Whether you are building a new website or redesigning and improving an existing website you have to follow certain SEO strategies to bring to your website to the top of SERP rankings.', 'What SEO strategies that you should follow to give better SERP ranking to your ecommerce website? Blog | DESSS', 'SEO Company Houston', 'What SEO strategies that you should follow to give better SERP ranking to your ecommerce website?', '', '', '        ', 'contact-us.html', '', 45, 10, 0, '2013-10-08 02:28:02', 1, '', '', '', 1),
(20, 'can-google-update-hummingbird-really-affect-seo-techniques.html', 'Can Google update Hummingbird really affect SEO techniques?', '<p>\r\n	Google&rsquo;s latest update &lsquo;Hummingbird&rsquo; was really a bolt from the blue. Although we were aware of this update earlier, Google had kept it secretive till Friday 27th September 2013.In this blog we will find what exactly is Hummingbird and how has it affected SEO Techniques.<br />\r\n	<br />\r\n	Nowadays with the exponential rise in mobile searches, people interact with search engines in a different way i.e. asking their queries not in words but in the form of questions. Hummingbird is Google&rsquo;s solutions to the challenge put forth by people who use search engines in different ways i.e. not using specific words but questions or long sentences. So Google has come out with solutions for complicated search queries.<br />\r\n	<br />\r\n	<strong>The following are the SEO strategies that you should take care of:-</strong></p>\r\n<ul>\r\n	<li>\r\n		<p>\r\n			Use the right Keyword, check the keyword relevance and density while writing contents and blogs.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			Share blog links with social sites which will speed up the time for search engine indexing.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			Focus on website and blog content. See to it the content and blogs give the readers what they want. Ask yourself this question, &lsquo;Will the readers be satisfied with what they read?&rsquo; So make sure that your contents are enough worthy.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			When you write blogs, try to write in your own words and make it unique. Don&rsquo;t simply copy and paste. Never post low quality blogs.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			Go for content authorship. This gives credibility to what you write. With this Google is able to attribute the content to the author. You are able to prove that you are a genuine author.</p>\r\n	</li>\r\n</ul>\r\n<p>\r\n	Google has made this update to reduce micro niche blogs or low quality blogs from showing up on search engine result pages. Don&rsquo;t go in for keyword stuffing. Practice ethical SEO and win the race.</p>\r\n', 'Google’s latest update ‘Hummingbird’ was really a bolt from the blue. Although we were aware of this update earlier, Google had kept it secretive till Friday 27th September 2013.', '', 'In this blog we will find what exactly is Hummingbird and how has it affected SEO Techniques.', 'Can Google update Hummingbird really affect SEO techniques? Blog | DESSS', 'SEO, Web Design, Web Development, Houston, DESSS', 'Can Google update Hummingbird really affect SEO techniques?', '', '', '        ', 'contact-us.html', '', 45, 11, 0, '2013-10-11 04:48:19', 1, '', '', '', 1),
(21, 'why-should-seo-be-done-to-optimize-websites-for-users-and-not-for-search-engine-rankings.html', 'Why should SEO be done to optimize websites for users and not for search engine rankings?', '<p>Are you a website owner? Are you worried about your website not appearing on the first page of SERP rankings? Planning to hire a new <a href="http://www.desss.com/it-services/search-engine-optimization-services-houston.html"><strong>SEO</strong></a> analyst who is promising exceptional results? Decided to fire the existing analyst because he is not able to show results? Think twice before you take any decision. SEO looks like a magical wand to many, who think that just waving this wand can make the website appear on the first page of Google&rsquo;s search results. In fact, SEO is a steady process which when done ethically can produce wonderful results. In this blog let us discuss what SEO is and what it isn&rsquo;t.</p>\r\n<p>Are you aware of the fact that the best way of optimizing a website is to optimize it for the users and not for search engine rankings? This is what Google is also trying to do. The recent update Hummingbird is the Google&rsquo;s solution to complicated search queries. People have started using search queries not in the form of words but in the form of questions. If you are worried about search engine rankings rather than relevant contents, then you are fighting a losing battle.</p>\r\n<p>Google clearly states how to gain ranking for your website. It asks you to &lsquo;create a useful information rich website and write pages that clearly and accurately describe your content&rsquo;.</p>\r\n<h2><strong>How can you optimize your website?</strong></h2>\r\n<ul>\r\n<li>\r\n<p>Write useful contents</p>\r\n</li>\r\n<li>\r\n<p>Publish white papers.</p>\r\n</li>\r\n<li>\r\n<p>Write relevant blogs.</p>\r\n</li>\r\n<li>\r\n<p>Publish articles.</p>\r\n</li>\r\n<li>\r\n<p>Share research findings.</p>\r\n</li>\r\n<li>\r\n<p>Add detailed case studies.</p>\r\n</li>\r\n<li>\r\n<p>Add FAQ.</p>\r\n</li>\r\n<li>\r\n<p>Post interviews.</p>\r\n</li>\r\n<li>\r\n<p>Add testimonials.</p>\r\n</li>\r\n<li>\r\n<p>Create useful applications.</p>\r\n</li>\r\n</ul>\r\n<p>So don&rsquo;t worry about where you are in SERP rankings, Follow the above mentioned strategies meticulously, work patiently. &lsquo;SEO&rsquo; is not magical. It needs time and commitment. Practice ethical SEO and have a great time ahead.</p>', 'Are you a website owner? Are you worried about your website not appearing on the first page of SERP rankings? Planning to hire a new SEO analyst who is promising exceptional results?', '', 'Dont worry about SERP rankings. To know more about ethical SEO practices read our blog.', 'Why should SEO be done to optimize websites for users and not for search engine rankings? Blog | DESSS', 'SEO Company Houston', 'Why should SEO be done to optimize websites for users and not for search engine rankings?', '', '', '                                ', 'contact-us.html', '', 45, 12, 0, '2014-05-20 10:05:26', 1, '', '', '', 1),
(22, 'what-are-the-social-media-marketing-trends-of-2014.html', 'What are the Social Media Marketing Trends of 2014?', '<p>\r\n	With every business trying to get the best internet presence for their business, with more and more social media websites appearing every day, we have to understand that social media marketing is no more a luxury but a necessity. In this blog, let us discuss what trends of social media marketing can be beneficial to you.</p>\r\n<p>\r\n	<strong>Investment in social media is a must: </strong>Some of the businesses have already understood the benefits of social media integration in the form of traffic to the website and revenue generation. In 2014, you will definitely see more companies hiring <strong>social media strategists or managers</strong> to do this integration.</p>\r\n<p>\r\n	<strong>Every company should understand the benefit of social media integration:</strong> Social media integration offer many benefits like company branding, enhanced credibility, advertising, enhanced customer faith and loyalty and improved business efficiency. Business should understand that social media marketing is the main feature of SEO.</p>\r\n<p>\r\n	<strong>Google+ may become popular: </strong>Although face book has 1.15 billion active users, Google+ is fast gaining momentum. Having Google authorship may prove to be a vital SEO tool in 2014 and it may also be an important component in Google&rsquo;s search engine algorithm in 2014.</p>\r\n<p>\r\n	<strong>Visual content will reign supreme:</strong> Instead of simple texts, images and videos may reign the social media world.</p>\r\n<p>\r\n	<strong>Micro videos will become popular:</strong> With people becoming busier, who has the time to watch a 3 min or 5min video? Micro videos may become popular. With some of the social media websites offering &lsquo;video sharing&rsquo; features and with some of them allocating 8-15 seconds video, you are expected to post videos that fit their category.</p>\r\n<p>\r\n	<strong>LinkedIn will become popular in B2B growth: </strong>As a major professional site LinkedIn will play a major role in the exponential growth of business. The recent launch of Influencers Program&rsquo; by LinkedIn has made more businessmen become a member of LinkedIn.</p>\r\n<p>\r\n	<strong>Face Book turns 10 in 2014: </strong>It has been 10 long fruitful years for Face Book. They will definitely concentrate more to bring new trends, adding new features to Face Book to make it popular.</p>\r\n<p>\r\n	2014 is going to be a year of changes. Integrate well with social media and enhance business profitability.</p>\r\n', 'With every business trying to get the best internet presence for their business, with more and more social media website appearing every day, we have to understand that social media marketing is no more a luxury but a necessity. ', '', 'In this blog, let us discuss what trends of social media marketing can be beneficial to you.', 'What are the Social Media Marketing Trends of 2014? Blog | DESSS', 'Social Media Marketing Houston', 'What are the Social Media Marketing Trends of 2014?', '', '', '                ', 'contact-us.html', '', 45, 13, 0, '2013-10-23 04:26:25', 1, '', '', '', 1);
INSERT INTO `blog_tbl` (`id`, `file_name`, `title`, `real_description`, `img_description`, `meta_name`, `meta_content`, `meta_title`, `meta_keyword`, `h1_title`, `h2_title`, `image`, `meta_misc`, `req_quo`, `image_name`, `is_menu`, `order_id`, `parent_id`, `Created_Date`, `is_show`, `iconimg`, `is_restaurant`, `img_alt`, `blog_order`) VALUES
(23, 'appealing-mobile-applications-for-health-care-professionals.html', 'Appealing Mobile Applications for Health care Professionals', '<p>\r\n	Mobile devices have caused a niche for themselves in the ever developing world of technology. The medical professionals are facing stiff challenges like changing regulatory environment, demand for quality healthcare, increasing inflation and decreasing profitability. The need has come to provide cost effective quality medical treatment using the available resources. <a href="http://www.desss.com/it-services/mobile-application-development-houston.html"><strong>Mobile apps</strong></a> play a major role in enabling medical professionals to offer quality health care to the residents of the US.</p>\r\n<p>\r\n	A recent study has shown that around 70% medical professionals are using mobile apps for various purposes. In this blog, we are going to discuss how mobile apps have helped medical professionals improve business efficiency.</p>\r\n<p>\r\n	<strong>Apps for lab results and images:</strong> These are mobile apps that provide lab results like ECG, eye tests, blood tests to the medical professionals, who by viewing them can take immediate decision while on the go and offer required treatment to the patients. CT scan results, MRI, X-Ray and ultrasound images can also be sent to the smart phone that will help them to take the required medical decisions.</p>\r\n<p>\r\n	<strong>Apps that foster M to M (Machine to Machine) communication:</strong> These are apps available nowadays that help to convert a mobile device to a medical device. An arm cuff of a blood pressure instrument can be connected to the smart phone to record blood pressure. Using a relevant app a smart phone can become an ECG machine to record changes in the heart beats. All these innovative apps can help the pro take required decisions quickly.</p>\r\n<p>\r\n	<strong>Apps useful for administrators:</strong> Some apps play a major role in patient coding and tracking, billing, hospital management, supply management and inventory management.</p>\r\n<p>\r\n	<strong>Training apps:</strong> Using videos, chat, text and images, young upcoming physicians and surgeons can share and access literature, live presentations and CME proceedings to gain more knowledge.</p>\r\n<p>\r\n	As far as mobile applications are concerned sky is the limit. There are many more innovative apps yet to reach the market. I am very sure that these mobile apps are going to bring in a big revolution as far as healthcare is concerned.</p>\r\n', 'Mobile devices have caused a niche for themselves in the ever developing world of technology. The medical professionals are facing stiff challenges like changing regulatory environment, demand for quality healthcare, increasing inflation and decreasing profitability. ', '', 'In this blog we are going to discuss how mobile apps development have helped medical professionals improve business efficiency.', 'Appealing Mobile Applications for Health care Professionals | DESSS', 'Mobile Application Development Houston', 'Appealing Mobile Applications for Health care Professionals', '', '', '        ', 'contact-us.html', '', 45, 14, 0, '2013-10-28 00:55:09', 1, '', '', '', 1),
(24, 'an-easy-guide-for-social-media-integration-with-your-business-site.html', 'An easy guide for social media integration with your business site', '<p>\r\n	With all the social media websites becoming more and more popular, with more and more active users of social media, it has become compulsory for businesses to get their website integrated with social media websites like Facebook, Twitter, LinkedIn and Google +. In the blog I want to provide some guide lines for social media integration. A careful step by step plan is necessary to get effective results.</p>\r\n<ol>\r\n	<li>\r\n		<p>\r\n			Let the social media links be displayed clearly on the website or blog. One of the best places to place the social media icon is the header or footer.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			See to it that Facebook and Twitter updates are visible on the first or home page of the website. This will help the company showcase the visitors&rsquo; engagement with the company.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			&nbsp;Don&rsquo;t forget to add share button to the blog. This enables the readers share the content that they have read with others. They can even share an image.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			Don&rsquo;t forget to check how web traffic is coming to the site. Using Google analytics or Kiss metrics find out what part of the contents or blog has been liked and shared the most. This will help you to stream line your business plan.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			Make way for the visitors to log in through their social media accounts.</p>\r\n	</li>\r\n	<li>\r\n		<p>\r\n			Make sure to add videos or images to your blog which will definitely attract visitors and who will in turn share them with others. This feature will drive more traffic to your website.</p>\r\n	</li>\r\n</ol>\r\n<p>\r\n	&nbsp;These are a few tips to make the best use of social media integration with your website. This will greatly help in making the website popular, increase business efficiency and enhance ROI.</p>\r\n', 'With all the social media websites becoming more and more popular, with more and more active users of social media, it has become compulsory for businesses to get their website integrated with social media websites like Facebook, Twitter, LinkedIn and Google +. ', '', 'In the blog we provide guide lines for social media integration. A careful step by step plan is necessary to get effective results.', 'An easy guide for social media integration with your business site | DESSS', 'Social Media Marketing Houston', 'An easy guide for social media integration with your business site', '', '', '                ', 'contact-us.html', '', 45, 15, 0, '2013-10-29 05:37:57', 1, '', '', '', 1),
(25, 'what-are-the-characteristics-of-a-simple-ecommerce-website.html', 'What are the characteristics of a simple eCommerce website?', '<p>\r\n	Building an online store for your ecommerce website has always been a daunting experience. After deciding on the project, follow these simple strategies to make your <strong>ecommerce website</strong> work wonders for you.</p>\r\n<p>\r\n	<strong>Strategy 1: Project well what you know the best:</strong></p>\r\n<p>\r\n	The internet is a vast ocean of information, images and colors. If you don&rsquo;t stand out then you will simply disappear into oblivion. Make your Ecommerce website speak your language. Be creative to showcase your strengths. Design your website in such a way that it stands out from the rest. Make your online store as attractive as possible. Provide such an excellent user experience that your customers will want to come back to you again. Make the Homepage as informative and as credible as possible. Specially craft the designs and descriptions in such a way that your customers should feel that they might not find a similar product or service anywhere else.</p>\r\n<p>\r\n	<strong>Strategy 2: Make your website as easily navigable as you can:</strong></p>\r\n<p>\r\n	A crowded website with irrelevant information will definitely drive away all the customers.</p>\r\n<p>\r\n	Strictly follow these features</p>\r\n<ol>\r\n	<li>\r\n		A navigation list on the left or top of the page.</li>\r\n	<li>\r\n		A clear search bar.</li>\r\n	<li>\r\n		A clearly laid out footer will all necessary information.</li>\r\n	<li>\r\n		A system of breadcrumbs.</li>\r\n	<li>\r\n		Add buttons that look and function properly.</li>\r\n</ol>\r\n<p>\r\n	You can also be creative enough to add all the details in your own way. But care should be taken that all features are displayed correctly.</p>\r\n<p>\r\n	<strong>Strategy 3: Give extensive product details:</strong></p>\r\n<p>\r\n	&nbsp;In any online business website, customers generally focus on the product details. Display your products clearly along with attractive images, prices, Zoom option, add to shopping cart, cost details, shipping costs (If any), in how many days the product would reach the customer, user ratings and payment options.</p>\r\n<p>\r\n	<strong>Strategy 4: Use the platform that works wonders for your business:</strong></p>\r\n<p>\r\n	Decide on what your Ecommerce requirements are and then choose a platform that will work seamlessly for your business. Choose a CMS that will fit your website the best. Your website should be able to give seamless online transactions without any hiccups. Choose a solid platform that will foster excellent functionality.</p>\r\n<p>\r\n	Make your <strong>Ecommerce website</strong> speak of your unique business, your care for your customers and your interest in giving your customers a rich user friendly online business experience. Create a simple but effective ecommerce website and enjoy the benefits.</p>\r\n', 'Building an online store for your ecommerce website has always been a daunting experience. After deciding on the project, follow these simple strategies to make your ecommerce website work wonders for you.', '', 'Building an online store for your ecommerce website has always been a daunting experience. ', 'What are the characteristics of a simple ecommerce website, Blog | DESSS', 'Website Design Company Houston, ECommerce website Design Houston, Informative Blog, DESSS', 'What are the characteristics of a simple ecommerce website?', '', '', '        ', 'contact-us.html', '', 45, 16, 0, '2013-11-06 04:48:37', 1, '', '', '', 1),
(26, 'want-to-become-a-web-design-expert-follow-these-simple-steps.html', 'WANT TO BECOME A WEB DESIGN EXPERT? Follow these simple steps', '<p>\r\n	Many <a href="http://www.desss.com/web-applications/web-design-houston.html"><strong>web designers</strong></a> want the whole world to recognize them as experts but the sad part is that nobody does that. Take these careful measures to make people recognize you as expert. It is definitely time taking but effective.</p>\r\n<p>\r\n	You want to possess those qualities that will make others turn back and look at you and listen to what you say. So how can you achieve this?</p>\r\n<p>\r\n	<strong>Step-1:</strong></p>\r\n<p>\r\n	Expertise comes with time and extreme perseverance. You have to work extremely hard for at least 4 full years. Keep your eyes and ears open to whatever is happening around you. Learn whatever is expected of you and much more. Have intense thirst for knowledge. Over the years you will gain the ability to solve problems. Even if you face new challenges you will become an expert in solving these issues. Lessons learned the hard way will never be forgotten. Equip yourself with all the modern processes and methodologies; don&rsquo;t become an antique in your approach.</p>\r\n<p>\r\n	<strong>Step-2:</strong></p>\r\n<p>\r\n	Web designing is not a job; it has to be a passion. You have to live the web designer life. Obsessive passion for the job will make you expert web designers.</p>\r\n<p>\r\n	<strong>Step-3:</strong></p>\r\n<p>\r\n	Make mistakes and learn from them. Take risk and of course in the process you will definitely make mistakes. Don&rsquo;t be afraid of failure. You have to remember that &lsquo;Failure is the stepping stone to success&rsquo;. Experiences thus got get completely etched in your mind. Learn to face failure with dignity. Be accountable to what you do. Many will advise you to be always successful in life but I will instead advice you to fail at least sometimes in life. This will give an opportunity to rise and shine. In due course of time you will become an expert.</p>\r\n<p>\r\n	<strong>Steps-4:</strong></p>\r\n<p>\r\n	Express the right context at the right place. You may be an expert web designer, but no one will listen to you, if you discuss things carelessly in a pub or a parking place. Arrange seminars, attend conferences, write a book or share your thoughts in webinars. Your speech will be listened to. Never be shallow in your presentations. Do in depth analysis and then share your thoughts at the right places and at the right time. You will be considered an expert.</p>\r\n<p>\r\n	<strong>Step-5:</strong></p>\r\n<p>\r\n	Articulate yourself properly. If your client is dissatisfied with the design that you have created, instead of getting irritated speak to the client in a convincing way. Patience in work and talk is always rewarded.</p>\r\n<p>\r\n	<strong>Step-6:</strong></p>\r\n<p>\r\n	Don&rsquo;t be egoistic or prejudiced. Be humble enough to listen to what others say about web design. A careful listener is always considered at expert.</p>\r\n<p>\r\n	Follow these simple steps and become an expert web designer. Remember that after becoming an expert web designer, don&rsquo;t become boastful. Be helpful to others and guide them in what they do. Be creative, constructive, convincing and committed in whatever you do. I am sure you can become an expert web designer.</p>\r\n', 'Many web designers want the whole world to recognize them as experts but the sad part is that nobody does that. Take these careful measures to make people recognize you as expert. ', '', '', 'Want to Become a Web Design Expert? Follow these simple steps | DESSS', 'Web Design Expert, Houston, Texas, USA, DESSS', 'Want to Become a Web Design Expert? Follow these simple steps', '', '', '                ', 'contact-us.html', '', 45, 17, 0, '2013-11-11 04:17:52', 1, '', '', '', 1),
(27, 'how-best-to-optimize-about-us-page-of-your-website-for-better-internet-visibility.html', 'How best to optimize ''About us'' page of your website for better internet visibility?', '<p>\r\n	Content marketing is not just posting blogs and social media integration; it also means the website content. Are you aware of the fact that the &lsquo;About us Page&rsquo; is the most visited page in a website that gives a clear picture of what you are, what kind of services you offer and other related features.&nbsp; In this blog, let us discuss what important features of About Us page are mandatory to attract visitors to the page.<br />\r\n	<br />\r\n	<br />\r\n	A brief Description: This mirrors what kind of a company you are. You can add details of when the company was started and the kind of services that you offer.<br />\r\n	<br />\r\n	Vision: Organization without a vision is like a person without a goal in life. About us page should definitely speak about your vision.<br />\r\n	<br />\r\n	Goals and Objectives: These will definitely have a great impact on the visitors who visit your website as it improves credibly.<br />\r\n	<br />\r\n	Integrate a fact sheet: A fact sheet clearly focuses on the strengths of the business. This of course makes the customers know about you.<br />\r\n	<br />\r\n	Add Key differentiators: &lsquo;Winners don&rsquo;t do different things but do things differently&rsquo;. If you want success knocking at your door than you should be different from others. The About us page should definitely focus on those factors that differentiate you from others.<br />\r\n	<br />\r\n	Quality Commitment: Quality should not be an act but a habit. Yes! every aspect of your organization and services and products should promise customers quality. Tell your customers that you are a bunch of people who never compromise with quality.<br />\r\n	<br />\r\n	Add Information about the History of company: Every Customer has the right to know information about when the company was stared and who the management members are. This will make them trust you.<br />\r\n	<br />\r\n	The About us page reflects the authenticity of your organization. Carefully design it and build trust among customers.<br />\r\n	&nbsp;</p>\r\n', 'Content marketing is not just posting blogs and social media integration; it also means the website content. Are you aware of the fact that the ''About us Page'' is the most visited page in a website that gives a clear picture of what you are, what kind of services you offer and other related features.', '', 'In this blog let us discuss what important features of About Us page are mandatory to attract visitors to the page.', 'How best to optimize ''About us'' page of your website for better internet visibility? DESSS', 'How best to optimize About us page of your website for better internet visibility, DESSS, Houston Web Development, Mobile Application Company', 'How best to optimize ''About us'' page of your website for better internet visibility?', '', '', '                                                                                                                                                        ', 'contact-us.html', '', 45, 18, 0, '0000-00-00 00:00:00', 0, '', '', '', 1),
(29, 'digital-marketing/website-design-web-development-company-houston.html', 'SALES & MARKETING TOOLS FOR YOUR BUSINESS', '<table align="center" cellpadding="0" cellspacing="0" style="margin:0px;font-family:Arial, Helvetica, sans-serif;color:#FFF; background:#000000 !important;" width="1000">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<h1 style="margin:50px 0px 0px 50px; line-height:50px; font-size:40px; color:#FFFFFF;">\r\n					Professional Web Design<br />\r\n					&amp; Web Development</h1>\r\n			</td>\r\n			<td>\r\n				<a href="http://www.desss.com" style="text-decoration:none; text-align:right; color:#FFF; font-size:22px; display:block; margin:50px 50px 0px 0px;">www.desss.com</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td align="center" colspan="2" style="margin-bottom:30px;">\r\n				<img alt="DESSS Applying Technologies" src="http://www.desss.com/images/mob-device.png" style="margin-bottom:30px;" title="DESSS Applying Technologies" width="90%" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td bgcolor="#f06a00" colspan="2">\r\n				<table style="/* IE10 Consumer Preview */ \r\nbackground-image: -ms-linear-gradient(top, #F16A00 0%, #000000 100%);\r\n\r\n/* Mozilla Firefox */ \r\nbackground-image: -moz-linear-gradient(top, #F16A00 0%, #000000 100%);\r\n\r\n/* Opera */ \r\nbackground-image: -o-linear-gradient(top, #F16A00 0%, #000000 100%);\r\n\r\n/* Webkit (Safari/Chrome 10) */ \r\nbackground-image: -webkit-gradient(linear, left top, left bottom, color-stop(0, #F16A00), color-stop(1, #000000));\r\n\r\n/* Webkit (Chrome 11+) */ \r\nbackground-image: -webkit-linear-gradient(top, #F16A00 0%, #000000 100%);\r\n\r\n/* W3C Markup, IE10 Release Preview */ \r\nbackground-image: linear-gradient(to bottom, #F16A00 0%, #000000 100%);" width="100%">\r\n					<tbody>\r\n						<tr>\r\n							<td align="center" colspan="2">\r\n								<h2 class="flyer_h2">\r\n									SALES &amp; MARKETING TOOLS FOR YOUR BUSINESS</h2>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td align="left" style="line-height: 30px; font-size: 20px;" width="50%">\r\n								<ul class="flyer_list">\r\n									<li>\r\n										<a href="http://www.desss.com/it-services/it-services-houston.html">Web Design / Development</a></li>\r\n									<li>\r\n										<a href="http://www.desss.com/it-services/mobile-application-development-houston.html">Responsive / Mobile Web Design<br />\r\n										(iPhone / Android / iPad / Tablets)</a></li>\r\n									<li>\r\n										Print Design / Production</li>\r\n									<li>\r\n										Video Production</li>\r\n									<li>\r\n										Business Development</li>\r\n									<li>\r\n										<a href="http://www.desss.com/search-engine-marketing/email-marketing-houston.html">E-mail Marketing</a></li>\r\n								</ul>\r\n							</td>\r\n							<td align="left" style="line-height: 30px; font-size: 20px;" width="50%">\r\n								<ul class="flyer_list">\r\n									<li>\r\n										CRM Systems</li>\r\n									<li>\r\n										SEO (Search Engine Optimization)</li>\r\n									<li>\r\n										SEM (Search Engine Marketing)</li>\r\n									<li>\r\n										<a href="http://www.desss.com/search-engine-marketing/google-adwords-houston.html">PPC (Pay Per Click - Google Adwords)</a></li>\r\n									<li>\r\n										<a href="http://www.desss.com/it-services/content-management-system-cms-houston.html">CMS (Content Management System)</a></li>\r\n									<li>\r\n										<a href="http://www.desss.com/search-engine-optimization/web-analytics-houston.html">Website Analytics</a></li>\r\n									<li>\r\n										Professional Consultation</li>\r\n								</ul>\r\n							</td>\r\n						</tr>\r\n						<tr>\r\n							<td align="center" colspan="2" style=" border-top: 1px solid #6D6D6D;">\r\n								<h3 style="font-weight:normal; margin:20px 0;">\r\n									<i><a href="mailto:info@desss.com" style="text-decoration:none; color:#FFF;">info@desss.com</a> or Call Us Today for More Information - 713.589.6496</i></h3>\r\n							</td>\r\n						</tr>\r\n					</tbody>\r\n				</table>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', '', 'Digital Marketing', 'Digital Marketing', 'Digital Marketing', 'Digital Marketing', '', '', '                                                                                ', 'contact-us.html', '', 45, 1, 0, '2014-03-07 00:57:35', 1, '', '', '', 1),
(31, 'test_page.html', 'test', '<p>test</p>', 'test', '', 'test', 'test', 'test', 'test', 'testt', 'images.jpg', '', '', '', 45, 0, 0, '2014-05-20 09:32:11', 0, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `categories_image` varchar(64) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `categories_name` varchar(50) NOT NULL,
  `categories_description` text NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `categories_status` tinyint(1) NOT NULL DEFAULT '1',
  `master_cat_url` varchar(100) NOT NULL,
  `url_name` text NOT NULL,
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `show_left_panel` enum('Yes','No') NOT NULL DEFAULT 'No',
  PRIMARY KEY (`categories_id`),
  KEY `idx_parent_id_cat_id_zen` (`parent_id`,`categories_id`),
  KEY `idx_status_zen` (`categories_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`categories_id`, `language_id`, `categories_image`, `parent_id`, `categories_name`, `categories_description`, `date_added`, `last_modified`, `categories_status`, `master_cat_url`, `url_name`, `cat_order`, `show_left_panel`) VALUES
(1, 1, NULL, 1, 'Copier Toner', 'Copier Toner', NULL, NULL, 1, 'canon', 'copier-toner', 1, 'No'),
(2, 1, NULL, 1, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'canon', 'laser-and-fax-toners', 2, 'No'),
(3, 1, NULL, 1, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'canon', 'inkjet-cartridges', 3, 'No'),
(4, 1, NULL, 2, 'Copier Toner', 'Copier Toner', NULL, NULL, 1, 'konica-minolta', 'copier-toner', 4, 'No'),
(5, 1, NULL, 2, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'konica-minolta', 'laser-and-fax-toners', 5, 'No'),
(6, 1, NULL, 3, 'Copier Toner', 'Copier Toner', NULL, NULL, 1, 'kyocera-mita', 'copier-toner', 6, 'No'),
(7, 1, NULL, 3, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'kyocera-mita', 'laser-and-fax-toners', 7, 'No'),
(8, 1, NULL, 4, 'Copier Toner', 'Copier Toner', NULL, NULL, 1, 'panasonic', 'copier-toner', 8, 'No'),
(9, 1, NULL, 4, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'panasonic', 'laser-and-fax-toners', 9, 'No'),
(10, 1, NULL, 5, 'Copier Toner', 'Copier Toner', NULL, NULL, 1, 'ricoh', 'copier-toner', 10, 'No'),
(11, 1, NULL, 5, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'ricoh', 'laser-and-fax-toners', 11, 'No'),
(12, 1, NULL, 6, 'Copier Toner', 'Copier Toner', NULL, NULL, 1, 'toshiba', 'copier-toner', 12, 'No'),
(13, 1, NULL, 7, 'Copier Toner', 'Copier Toner', NULL, NULL, 1, 'xerox', 'copier-toner', 13, 'No'),
(14, 1, NULL, 7, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'xerox', 'laser-and-fax-toners', 14, 'No'),
(15, 1, NULL, 8, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'brother', 'laser-and-fax-toners', 15, 'No'),
(16, 1, NULL, 8, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'brother', 'inkjet-cartridges', 16, 'No'),
(35, 1, '', 19, 'Laser And Fax Toners', 'Laser And Fax Toners', '2013-04-23 01:53:20', NULL, 1, 'dell', 'laser-and-fax-toners', 2, 'No'),
(19, 1, NULL, 11, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'epson', 'laser-and-fax-toners', 19, 'No'),
(20, 1, NULL, 11, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'epson', 'inkjet-cartridges', 20, 'No'),
(36, 1, '', 20, 'Laser And Fax Toners', 'Laser And Fax Toners', '2013-04-23 02:53:34', NULL, 1, 'hp', 'laser-and-fax-toners', 2, 'No'),
(23, 1, NULL, 14, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'ibm', 'laser-and-fax-toners', 23, 'No'),
(24, 1, NULL, 15, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'lexmark', 'laser-and-fax-toners', 24, 'No'),
(25, 1, NULL, 15, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'lexmark', 'inkjet-cartridges', 25, 'No'),
(26, 1, NULL, 16, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'oki-okidata', 'laser-and-fax-toners', 26, 'No'),
(27, 1, NULL, 17, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'samsung', 'laser-and-fax-toners', 27, 'No'),
(28, 1, NULL, 18, 'Laser And Fax Toners', 'Laser And Fax Toners', NULL, NULL, 1, 'sharp', 'laser-and-fax-toners', 28, 'No'),
(29, 1, NULL, 19, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'dell', 'inkjet-cartridges', 29, 'No'),
(30, 1, NULL, 20, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'hp', 'inkjet-cartridges', 30, 'No'),
(31, 1, NULL, 21, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'kodak', 'inkjet-cartridges', 31, 'No'),
(32, 1, NULL, 22, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'neopost-hasler', 'inkjet-cartridges', 32, 'No'),
(33, 1, NULL, 23, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'pitney-bowes', 'inkjet-cartridges', 33, 'No'),
(34, 1, NULL, 24, 'Inkjet Cartridges', 'Inkjet Cartridges', NULL, NULL, 1, 'universal-photo-paper-refill-hits', 'inkjet-cartridges', 34, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `php_session_id` varchar(100) NOT NULL,
  `added_date` datetime NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `date_reference` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `categories_image` varchar(64) DEFAULT NULL,
  `category_image_thump` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `categories_name` varchar(50) NOT NULL,
  `categories_description` text NOT NULL,
  `brand_url` varchar(100) NOT NULL,
  `master_cat_id` int(11) NOT NULL,
  `master_cat_url` varchar(100) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `categories_status` tinyint(1) NOT NULL DEFAULT '1',
  `url_name` text NOT NULL,
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_key` text NOT NULL,
  `h1` longtext NOT NULL,
  `h2` longtext NOT NULL,
  `show_left_panel` enum('Yes','No') NOT NULL DEFAULT 'No',
  `navigation_status` varchar(100) NOT NULL,
  `categories_active` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`categories_id`),
  KEY `idx_parent_id_cat_id_zen` (`parent_id`,`categories_id`),
  KEY `idx_status_zen` (`categories_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `language_id`, `categories_image`, `category_image_thump`, `parent_id`, `categories_name`, `categories_description`, `brand_url`, `master_cat_id`, `master_cat_url`, `date_added`, `last_modified`, `categories_status`, `url_name`, `cat_order`, `meta_title`, `meta_desc`, `meta_key`, `h1`, `h2`, `show_left_panel`, `navigation_status`, `categories_active`, `create_date`, `modify_date`, `sort_order`) VALUES
(1, 1, '', '', 0, 'NutraBean Multivitamins', '', '', 0, '', '2014-10-21 23:23:13', NULL, 1, '', 0, 'NutraBean Multivitamins', '', '', '', '', 'No', 'Yes', 'Yes', '0000-00-00 00:00:00', '2014-10-21 23:23:13', 1),
(2, 1, 'nutra_plus.png', 'nutra_plus.png', 0, 'Nutrabean Plus', 'Studies show that the caffeine in coffee increases the production of stress hormones, stimulates the excretion of vital nutrients and interferes with the absorption of essential vitamins and minerals.', '', 0, '', '2014-05-21 11:03:14', NULL, 1, '', 0, 'Nutrabean Plus', '', '', '', '', 'No', 'Yes', 'Yes', '0000-00-00 00:00:00', '2014-05-21 22:33:14', 2),
(3, 1, '', '', 0, 'VitaCafe', '', '', 0, '', '2014-05-21 11:03:03', NULL, 1, '', 0, 'VitaCafe', '', '', '', '', 'No', 'Yes', 'Yes', '0000-00-00 00:00:00', '2014-05-21 22:33:03', 3),
(4, 1, '', '', 0, 'VitaCafe plus', '', '', 0, '', '2014-05-21 11:02:49', NULL, 1, '', 0, 'VitaCafe plus', '', '', '', '', 'No', 'Yes', 'Yes', '0000-00-00 00:00:00', '2014-05-21 22:32:49', 4);

-- --------------------------------------------------------

--
-- Table structure for table `categories_description`
--

CREATE TABLE IF NOT EXISTS `categories_description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `categories_name` varchar(32) NOT NULL DEFAULT '',
  `categories_description` text NOT NULL,
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`categories_id`,`language_id`),
  KEY `idx_categories_name_zen` (`categories_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cms_menu_tbl`
--

CREATE TABLE IF NOT EXISTS `cms_menu_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(30) NOT NULL,
  `menu_url` varchar(50) NOT NULL,
  `group_id` int(11) NOT NULL,
  `feature` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `cms_menu_tbl`
--

INSERT INTO `cms_menu_tbl` (`id`, `menu_name`, `menu_url`, `group_id`, `feature`) VALUES
(1, 'Social Media', 'social_media_list.php', 1, ''),
(2, 'Request Qoute', 'request_quote.php', 1, ''),
(3, 'Testimonial', 'testimonial.php', 2, ''),
(4, 'Users', 'user_list.php', 1, ''),
(5, 'Analitics', 'analitic_code.php', 1, ''),
(6, 'Blog', 'blog.php', 3, ''),
(7, 'Contact', 'contact.php', 2, ''),
(8, 'New Page', 'page_index.php', 0, ''),
(9, 'Home Banner', 'homebanner.php', 2, ''),
(10, 'Map', 'maps.php', 0, ''),
(11, 'Main Page', 'main_page.php', 1, ''),
(12, 'Menu Navigation', 'menu_navigation.php', 1, ''),
(13, 'Portfolio', 'view_industry.php', 2, ''),
(14, 'Footer Link', 'viewFooterDetail.php', 1, ''),
(15, 'Tob Banner Link', 'top_banner_links.php', 1, ''),
(16, 'Tab Content', 'content_tab_page.php', 1, ''),
(17, 'Admin Group', 'admin_group_view.php', 1, ''),
(18, 'menu group', 'menu_group.php', 1, ''),
(19, 'Menu Name', 'menu_name.php', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `countries_id` int(11) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(64) NOT NULL DEFAULT '',
  `countries_iso_code_2` char(2) NOT NULL DEFAULT '',
  `countries_iso_code_3` char(3) NOT NULL DEFAULT '',
  `address_format_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`countries_id`),
  KEY `idx_countries_name_zen` (`countries_name`),
  KEY `idx_address_format_id_zen` (`address_format_id`),
  KEY `idx_iso_2_zen` (`countries_iso_code_2`),
  KEY `idx_iso_3_zen` (`countries_iso_code_3`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countries_id`, `countries_name`, `countries_iso_code_2`, `countries_iso_code_3`, `address_format_id`) VALUES
(240, 'Aaland Islands', 'AX', 'ALA', 1),
(1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 5),
(15, 'Azerbaijan', 'AZ', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'BGD', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 2),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', 'CY', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 5),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', 'GIB', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 1),
(113, 'Korea, Republic of', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'MLT', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia, Federated States of', 'FM', 'FSM', 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', 'RO', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 4),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 3),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 6),
(223, 'United States', 'US', 'USA', 2),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Zaire', 'ZR', 'ZAR', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1),
(241, 'Srilanka', 'SR', 'SRL', 0);

-- --------------------------------------------------------

--
-- Table structure for table `couponimages`
--

CREATE TABLE IF NOT EXISTS `couponimages` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `coupon_image` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `couponimages`
--

INSERT INTO `couponimages` (`id`, `coupon_image`) VALUES
(1, '300px-Hopetoun_falls.jpg'),
(2, 'Chrysanthemum.jpg'),
(3, 'Desert.jpg'),
(4, 'Lighthouse.jpg'),
(6, 'Penguins.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_range`
--

CREATE TABLE IF NOT EXISTS `coupon_range` (
  `range_id` int(5) NOT NULL AUTO_INCREMENT,
  `coupon_id` int(5) NOT NULL,
  `value_from` varchar(50) NOT NULL,
  `value_to` varchar(50) NOT NULL,
  `redemption_value` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`range_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=242 ;

--
-- Dumping data for table `coupon_range`
--

INSERT INTO `coupon_range` (`range_id`, `coupon_id`, `value_from`, `value_to`, `redemption_value`, `created_date`) VALUES
(34, 5, '', '', '', '2010-09-28 19:18:49'),
(35, 7, '100', '200', '10', '2012-08-30 11:43:39'),
(36, 7, '200', '300', '20', '2012-08-30 11:43:39'),
(50, 8, '401', '500', '40', '2012-09-05 05:51:07'),
(49, 8, '301', '400', '30', '2012-09-05 05:51:07'),
(48, 8, '201', '300', '20', '2012-09-05 05:51:07'),
(47, 8, '100', '200', '10', '2012-09-05 05:51:07'),
(57, 2, '100', '1501', '35', '2012-09-05 09:06:35'),
(241, 3, '18002', '19002', '352', '2013-01-09 02:51:30'),
(240, 3, '11112', '12002', '202', '2013-01-09 02:51:30'),
(239, 3, '10002', '11102', '152', '2013-01-09 02:51:30'),
(237, 6, '4345', '3455', '45', '2012-12-30 05:10:55'),
(236, 6, '4345', '33435', '345', '2012-12-30 05:10:55'),
(238, 6, '5', '5', '5', '2012-12-30 05:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `footerlink_tbl`
--

CREATE TABLE IF NOT EXISTS `footerlink_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `footer_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `footerlink_tbl`
--

INSERT INTO `footerlink_tbl` (`id`, `footer_name`) VALUES
(2, 'Bookkeeping'),
(3, 'Books'),
(4, 'Christmas Supplies'),
(5, 'Conference Supplies'),
(6, 'Desk Accessories'),
(7, 'File Organisation'),
(8, 'Labeling'),
(9, 'Mail Supplies'),
(10, 'Paper'),
(11, 'Presentation'),
(12, 'Retail Supplies'),
(13, 'Mail Supplies'),
(14, '');

-- --------------------------------------------------------

--
-- Table structure for table `footer_menu`
--

CREATE TABLE IF NOT EXISTS `footer_menu` (
  `footer_id` int(8) NOT NULL AUTO_INCREMENT,
  `footer_name` varchar(200) NOT NULL,
  `pagr_url` varchar(200) NOT NULL,
  `link_page` int(5) NOT NULL,
  `creat_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`footer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `footer_menu`
--

INSERT INTO `footer_menu` (`footer_id`, `footer_name`, `pagr_url`, `link_page`, `creat_date`) VALUES
(12, 'Nutrabean', '#', 4, '2014-05-24 01:13:18'),
(17, 'Home', 'http://desssecommerce.local-listing.us', 3, '2014-05-23 07:05:49'),
(20, 'About', '#', 2, '2014-05-23 07:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `form_gen_support_tbl`
--

CREATE TABLE IF NOT EXISTS `form_gen_support_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fb_menu_id` int(11) NOT NULL,
  `option_name` varchar(50) NOT NULL,
  `option_value` varchar(50) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `form_gen_support_tbl`
--

INSERT INTO `form_gen_support_tbl` (`id`, `fb_menu_id`, `option_name`, `option_value`, `order_id`) VALUES
(23, 13, 'name2', 'value2', 3),
(22, 13, 'name1', 'value1', 2),
(21, 13, 'aa', 'aa', 1),
(18, 8, 'name', 'value', 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_gen_tbl`
--

CREATE TABLE IF NOT EXISTS `form_gen_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `field_menu` varchar(50) NOT NULL,
  `field_name` varchar(50) NOT NULL,
  `mandatory` int(11) NOT NULL,
  `field_order` int(11) NOT NULL,
  `field_type` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `form_gen_tbl`
--

INSERT INTO `form_gen_tbl` (`id`, `category_id`, `field_menu`, `field_name`, `mandatory`, `field_order`, `field_type`, `created_date`) VALUES
(1, 3, 'test menu', 'test name', 1, 1, 1, '2010-12-22 16:42:22'),
(8, 1, 'aa', 'aa', 1, 4, 4, '2006-01-02 08:06:55'),
(13, 3, 'field menu', 'field name', 2, 2, 3, '2012-08-30 11:54:43'),
(10, 1, 'hlhlk', 'hkl', 1, 1, 1, '2010-12-22 13:38:10'),
(11, 6, 'aa', 'ss', 1, 1, 1, '2010-12-22 21:58:29'),
(12, 1, 'Hello', 'Test', 1, 1, 1, '2012-08-30 11:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `frequent_tbl`
--

CREATE TABLE IF NOT EXISTS `frequent_tbl` (
  `frequent_id` int(11) NOT NULL AUTO_INCREMENT,
  `frequent_name` varchar(100) NOT NULL,
  `frequent_desc` text NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`frequent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `frequent_tbl`
--

INSERT INTO `frequent_tbl` (`frequent_id`, `frequent_name`, `frequent_desc`, `sort_order`) VALUES
(2, 'Where is caffeine found?', 'Caffeine naturally occurring in coffee,Tea,and Chocolate.It is also found in most energy drinks and sodas.Nutrabean is formulated for coffee drinkers and caffeine users.', 2),
(3, ' Im currently take a multivitamin,can I still take Nutrabean?', 'Nutrabean Plus+ Was formulated for those currently taking a multivitamin but looking for additional support.Our plus+formula contains the same dose of clinically proven ingredients found in Nutrabean Mulitivitamins.', 2),
(4, 'If Idon''t drink coffee,is Nutrabean right for me?', ' Nutrabean is a high quality multivitamin, and can be used by anyone looking for optimal balance.', 3),
(5, 'How is nutrabean made?', 'Nutrabean''s unique blend is all-natural and safe. Manufactured in US laboratories under FDA GMP (Good Manufacturing Practices) to ensure purity and quality.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `gift_coupon`
--

CREATE TABLE IF NOT EXISTS `gift_coupon` (
  `coupon_id` int(8) NOT NULL,
  `coupon_type` varchar(30) NOT NULL,
  `sub_coupon_type` varchar(30) NOT NULL,
  `product_code` varchar(20) NOT NULL,
  `redem_type` varchar(20) NOT NULL,
  `redeemvalue` varchar(50) NOT NULL,
  `coupon_remption_code` varchar(20) NOT NULL,
  `offer_name` varchar(20) NOT NULL,
  `valid_from_date` date NOT NULL,
  `valid_To_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gift_coupon`
--

INSERT INTO `gift_coupon` (`coupon_id`, `coupon_type`, `sub_coupon_type`, `product_code`, `redem_type`, `redeemvalue`, `coupon_remption_code`, `offer_name`, `valid_from_date`, `valid_To_date`, `created_date`) VALUES
(3, 'Seasonal', 'Product specific', '1', 'Range', '12', 'name-001', 'new seasonal', '2012-09-05', '2012-12-26', '2013-01-09 02:51:30'),
(5, '', '', '', '', '', 'nn', 'nn', '0000-00-00', '0000-00-00', '2012-09-06 05:48:51'),
(2, 'Regular', 'General', '', 'Range', '', 'test2', 'test2', '2012-09-01', '2012-09-30', '2012-09-05 09:06:35'),
(1, 'Regular', 'General', '', 'Fixed', '25', 'test1', 'test1', '2012-09-01', '2012-09-30', '2012-09-05 08:59:24'),
(6, 'Seasonal', 'General', '', 'Range', '', '23456RTFGH3', 'New year', '2013-02-13', '2013-01-23', '2012-12-30 05:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `gift_coupon_tbl`
--

CREATE TABLE IF NOT EXISTS `gift_coupon_tbl` (
  `coupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_coupon_type` varchar(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `valid_from_date` date NOT NULL,
  `valid_To_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `empty_rows` varchar(100) NOT NULL,
  `shopping_cart_price` varchar(100) NOT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_table`
--

CREATE TABLE IF NOT EXISTS `group_table` (
  `admin_groupid` int(11) NOT NULL AUTO_INCREMENT,
  `admin_groupname` varchar(500) NOT NULL,
  `admin_role` varchar(100) NOT NULL,
  `admin_menugroup` int(15) NOT NULL,
  `admin_view` int(10) NOT NULL,
  `admin_add` int(10) NOT NULL,
  `admin_edit` int(10) NOT NULL,
  `admin_delete` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group_table`
--

INSERT INTO `group_table` (`admin_groupid`, `admin_groupname`, `admin_role`, `admin_menugroup`, `admin_view`, `admin_add`, `admin_edit`, `admin_delete`, `created_date`) VALUES
(1, 'Superadmin', 'Superadmin', 0, 1, 1, 1, 1, '2014-05-20 02:10:38'),
(2, 'admin', 'admin', 0, 1, 1, 1, 1, '2014-05-23 03:53:49'),
(3, 'test', 'test', 0, 1, 1, 1, 1, '2014-05-23 03:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `handling_charges`
--

CREATE TABLE IF NOT EXISTS `handling_charges` (
  `handling_id` int(8) NOT NULL AUTO_INCREMENT,
  `value_from` varchar(10) NOT NULL,
  `value_to` varchar(10) NOT NULL,
  `handling_charges` varchar(10) NOT NULL,
  `enabled` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `method_name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`handling_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `handling_charges`
--

INSERT INTO `handling_charges` (`handling_id`, `value_from`, `value_to`, `handling_charges`, `enabled`, `title`, `method_name`, `type`) VALUES
(15, '25', '50', '20', '', '', '', ''),
(14, '11', '20', '5', '', '', '', ''),
(13, '0', '10', '3.22', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE IF NOT EXISTS `home_banner` (
  `image_id` int(10) NOT NULL AUTO_INCREMENT,
  `alt_text` varchar(50) NOT NULL,
  `image_type` varchar(20) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `h1_title` varchar(1000) NOT NULL,
  `h2_title` text NOT NULL,
  `image_order` varchar(100) NOT NULL,
  `Posted_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`image_id`, `alt_text`, `image_type`, `image_name`, `h1_title`, `h2_title`, `image_order`, `Posted_Date`) VALUES
(24, 'http://www.desssecommerce.local-listing.us', '', 'home-banner-shutterstock_110700254.jpg', 'SharePoint Consulting Services', 'Our  Microsoft  SharePoint  Consulting Houston services are Provided to you by a team of seasoned consultants.', '2', '2014-05-21 03:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tbl`
--

CREATE TABLE IF NOT EXISTS `invoice_tbl` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` varchar(100) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `invoice_date` date NOT NULL,
  `order_date` date NOT NULL,
  `bill_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `layout_settings`
--

CREATE TABLE IF NOT EXISTS `layout_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `configuration_title` varchar(500) NOT NULL,
  `configuration_value` varchar(500) NOT NULL,
  `configuration_desc` longtext NOT NULL,
  `configuration_boolean` int(11) NOT NULL,
  `last_modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE IF NOT EXISTS `login_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password1` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `username`, `password1`) VALUES
(1, 'karuna', 'password'),
(3, 'karuna', 'password'),
(4, '', ''),
(5, '', ''),
(6, '', ''),
(7, '', ''),
(8, '', ''),
(9, '', ''),
(10, '', ''),
(11, '', ''),
(12, '', ''),
(13, 'dfdfdfdfd', 'dfddfdfdf');

-- --------------------------------------------------------

--
-- Table structure for table `menu_group`
--

CREATE TABLE IF NOT EXISTS `menu_group` (
  `admin_menu_groupid` int(11) NOT NULL AUTO_INCREMENT,
  `admin_menugroup` varchar(500) NOT NULL,
  `admin_menus` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_group_id` int(11) NOT NULL,
  PRIMARY KEY (`admin_menu_groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menu_group`
--

INSERT INTO `menu_group` (`admin_menu_groupid`, `admin_menugroup`, `admin_menus`, `created_date`, `admin_group_id`) VALUES
(1, 'CMS', 'CMS', '2014-06-03 17:02:23', 1),
(2, 'SEO', 'SEO', '2014-04-30 22:48:50', 3),
(3, 'Other Page', 'Other Page', '2014-04-30 22:57:13', 4);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group_child`
--

CREATE TABLE IF NOT EXISTS `menu_group_child` (
  `admin_childmenu` int(11) NOT NULL AUTO_INCREMENT,
  `admin_menugroupid` int(15) NOT NULL,
  `admin_menuid` int(15) NOT NULL,
  `admin_menulevel` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_childmenu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=557 ;

--
-- Dumping data for table `menu_group_child`
--

INSERT INTO `menu_group_child` (`admin_childmenu`, `admin_menugroupid`, `admin_menuid`, `admin_menulevel`, `parent_id`, `order_id`, `created_date`) VALUES
(209, 3, 1, 1, 0, 0, '2014-05-20 00:59:05'),
(210, 3, 3, 1, 0, 1, '2014-05-20 00:59:05'),
(211, 3, 5, 1, 0, 2, '2014-05-20 00:59:05'),
(212, 3, 21, 1, 0, 3, '2014-05-20 00:59:05'),
(213, 3, 28, 1, 0, 4, '2014-05-20 00:59:05'),
(214, 3, 26, 1, 0, 5, '2014-05-20 00:59:05'),
(544, 1, 27, 1, 0, 1, '2014-10-27 08:53:58'),
(545, 1, 19, 2, 27, 0, '2014-10-27 08:53:58'),
(546, 1, 21, 1, 0, 2, '2014-10-27 08:53:58'),
(547, 1, 24, 2, 21, 1, '2014-10-27 08:53:58'),
(548, 1, 35, 2, 21, 2, '2014-10-27 08:53:58'),
(549, 1, 38, 1, 0, 3, '2014-10-27 08:53:58'),
(550, 1, 1, 2, 38, 3, '2014-10-27 08:53:58'),
(551, 1, 11, 1, 0, 4, '2014-10-27 08:53:58'),
(552, 1, 31, 2, 11, 4, '2014-10-27 08:53:58'),
(553, 1, 32, 2, 11, 5, '2014-10-27 08:53:58'),
(554, 1, 18, 1, 0, 5, '2014-10-27 08:53:58'),
(555, 1, 4, 2, 18, 6, '2014-10-27 08:53:58'),
(556, 1, 23, 2, 18, 7, '2014-10-27 08:53:58');

-- --------------------------------------------------------

--
-- Table structure for table `menu_page_tbl`
--

CREATE TABLE IF NOT EXISTS `menu_page_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(220) NOT NULL,
  `page_category` varchar(20) NOT NULL,
  `title` varchar(200) NOT NULL,
  `template_name` varchar(500) NOT NULL,
  `page_type` varchar(500) NOT NULL,
  `real_description` text NOT NULL,
  `img_description` text NOT NULL,
  `description` text NOT NULL,
  `meta_name` text NOT NULL,
  `meta_content` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `h1_title` text NOT NULL,
  `h2_title` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `iconmenuimage` varchar(300) NOT NULL,
  `meta_misc` text NOT NULL,
  `req_quo` varchar(500) NOT NULL,
  `is_menu` tinyint(1) NOT NULL,
  `order_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `Created_Date` datetime NOT NULL,
  `is_show` int(11) NOT NULL,
  `iconimg` varchar(200) NOT NULL,
  `is_restaurant` varchar(300) NOT NULL,
  `redirect_url` varchar(200) NOT NULL,
  `checkval` int(11) NOT NULL,
  `img_alt` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `menu_page_tbl`
--

INSERT INTO `menu_page_tbl` (`id`, `file_name`, `page_category`, `title`, `template_name`, `page_type`, `real_description`, `img_description`, `description`, `meta_name`, `meta_content`, `meta_title`, `meta_keyword`, `h1_title`, `h2_title`, `image`, `iconmenuimage`, `meta_misc`, `req_quo`, `is_menu`, `order_id`, `parent_id`, `Created_Date`, `is_show`, `iconimg`, `is_restaurant`, `redirect_url`, `checkval`, `img_alt`) VALUES
(11, 'returns.html', '', 'Returns', '', '', '<p><strong><span style="font-size: 12pt;">NutraBean&trade; Satisfaction Guarantee</span></strong></p>\r\n<p><br />Four Winds Nutrition, Inc retains a 30 day satisfaction guarantee on all NutraBean&trade; products purchased with the standard delivery option (non-auto-ship orders). If you are not 100% satisfied with any of our products, simply return the bottle within 30 days of receipt and you will receive a full refund, plus shipping and handling costs. To return a product you must call 855-569-2326 to obtain a Return Merchandise Authorization Number (RMA). Please note our shipping department does not accept any package that does not contain an RMA number. To be entitled to a refund, returns must be postmarked within 30 days of purchase. Customer is responsible for return shipping charges.</p>\r\n<p><br /><span style="font-size: 12pt;"><strong>Gift Card Offer</strong></span></p>\r\n<p>After an (RMA) has been issued, an electronic gift card in the amount of five (5) dollars will be issue via email. Cash alternatives will not provided. The electronic gift card will be sent to the email used at the time of purchase, no exceptions. <br /><br />Return Address: Four Winds Nutrition, Inc 2437 Bay Area Blvd #333 Houston, TX 77058 *Note: We will not accept or issue refund for any package without an RMA number.</p>', '', '', '', 'Returns', 'Returns', 'Returns', 'Returns', '', '', '', 'Returns', '', 1, 8, 0, '2014-10-28 14:19:01', 0, '', '', '', 0, ''),
(6, 'http://www.nutrabean.local-listing.us/', '', 'Home', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, '0000-00-00 00:00:00', 0, '', '', '', 0, ''),
(7, 'terms-conditions.html', '', 'Terms & Conditions', '', '', '<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><span style="font-size: 12pt;"><strong>User&nbsp;Agreement</strong></span><br />Please read the Terms &amp; Conditions before placing your order. By placing an order through this website, you agree to the terms and conditions set forth below.</span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><br /><span style="font-size: 12pt;"><strong>Product(s) Disclaimer</strong></span></span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;">All statements on this website or on any material or product sold through www.nutrabean.com have not evaluated by the Food and Drug Administration. This product is not intended to diagnose, treat, cure or prevent any disease. The information on this website or in emails is designed for educational purposes only and is not intended to be a substitute for informed medical advice or care.</span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><br /><span style="font-size: 12pt;"><strong>Warning</strong></span></span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;">WARNING: Accidental&nbsp;overdose&nbsp;of iron-containing products is a leading cause of fatal poisoning in children under 6. Keep this product out of reach of children. In case of accidental&nbsp;overdose, call a doctor or poison control center immediately.<br />Not intended for individuals under 18, unless instructed by a doctor. As with any dietary supplement, consult your health care practitioner before using this product, especially if you are pregnant, nursing, have existing medical conditions or are taking prescription medication.</span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><br /><span style="font-size: 12pt;"><strong>NutraBean&trade; Satisfaction Guarantee</strong></span></span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;">Four Winds Nutrition, Inc retains a 30 day satisfaction guarantee on all NutraBean&trade; products purchased with the standard delivery option (non-auto-ship orders). If you are not 100% satisfied with any of our products, simply return the bottle within 30 days of receipt and you will receive a full refund, plus shipping and handling costs. To return a product you must call 855-569-2326 to obtain a Return Merchandise Authorization Number (RMA). Please note our shipping department does not accept any package that does not contain an RMA number. To be entitled to a refund, returns must be postmarked within 30 days of purchase. Customer is responsible for return shipping charges.</span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><br /><strong><span style="font-size: 12pt;">Gift Card Offer</span></strong><br />&nbsp;After an (RMA) has been issued, an electronic gift card in the amount of five (5) dollars will be issue via email. Cash alternatives will not provided. The electronic gift card will be sent to the email used at the time of purchase, no exceptions. <br /><br />Return Address: Four Winds Nutrition, Inc 2437 Bay Area Blvd #333 Houston, TX 77058 *Note: We will not accept or issue refund for any package without an RMA number.</span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;"><br /><span style="font-size: 12pt;"><strong>Shipping</strong></span></span></p>\r\n<p><span style="color: #000000; font-family: Calibri; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px;">Standard Shipping:&nbsp; 3-5 Business Days for Delivery<br />*TX residents will be charged sales tax at the time of purchase.</span></p>', '', '', '', 'Nutrabean', 'Nutrabean', 'Nutrabean', 'Terms & Conditions', '', '', '', 'Nutrabean', '', 1, 3, 0, '2014-10-28 12:49:48', 0, '', '', '', 0, ''),
(8, 'contact.html', '', 'Contact', '', '', '<p>(855)5MY-BEAN <br />855-569-2326<br />sales@nutrabean.com</p>', '', '', '', 'Contact ', 'Contact ', 'Contact ', 'Contact ', '', '', '', 'Contact ', '', 1, 5, 0, '2014-10-28 12:42:39', 0, '', '', '', 0, ''),
(10, 'privacy-policy.html', '', 'Privacy Policy', '', '', '<p><span style="font-size: 12pt;"><strong>What information do we collect? </strong></span><br /><br />We collect information from you when you register on our site, place an order, subscribe to our newsletter or fill out a form. <br />When ordering or registering on our site, as appropriate, you may be asked to enter your: name, e-mail address, mailing address, phone number or credit card information. You may, however, visit our site anonymously.<br /><br /><span style="font-size: 12pt;"><strong>What do we use your information for? </strong></span><br /><br />Any of the information we collect from you may be used in one of the following ways: <br />To personalize your experience (your information helps us to better respond to your individual needs)<br />To improve our website (we continually strive to improve our website offerings based on the information and feedback we receive from you)<br />To improve customer service (your information helps us to more effectively respond to your customer service requests and support needs)<br /><br />To process transactions<br />Your information, whether public or private, will not be sold, exchanged, transferred, or given to any other company for any reason whatsoever, without your consent, other than for the express purpose of delivering the purchased product or service requested.<br /><br />To send periodic emails<br />The email address you provide for order processing, may be used to send you information and updates pertaining to your order, in addition to receiving occasional company news, updates, related product or service information, etc.<br />Note: If at any time you would like to unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email.<br /><br /><span style="font-size: 12pt;"><strong>How do we protect your information? </strong></span><br /><br />We implement a variety of security measures to maintain the safety of your personal information when you place an order or enter, submit, or access your personal information. <br />We offer the use of a secure server. All supplied sensitive/credit information is transmitted via Secure Socket Layer (SSL) technology and then encrypted into our Payment gateway providers database only to be accessible by those authorized with special access rights to such systems, and are required to?keep the information confidential.<br />After a transaction, your private information (credit cards, social security numbers, financials, etc.) will not be stored on our servers.<br /><br /><span style="font-size: 12pt;"><strong>Do we use cookies?</strong> </span><br /><br />Yes (Cookies are small files that a site or its service provider transfers to your computers hard drive through your Web browser (if you allow) that enables the sites or service providers systems to recognize your browser and capture and remember certain information<br />We use cookies to help us remember and process the items in your shopping cart, understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.<br /><br /><span style="font-size: 12pt;"><strong>Do we disclose any information to outside parties?</strong> </span><br /><br />We do not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect ours or others rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.<br /><br /><span style="font-size: 12pt;"><strong>Childrens Online Privacy Protection Act Compliance </strong></span><br /><br />We are in compliance with the requirements of COPPA (Childrens Online Privacy Protection Act), we do not collect any information from anyone under 13 years of age. Our website, products and services are all directed to people who are at least 13 years old or older.<br /><br /><span style="font-size: 12pt;"><strong>Online Privacy Policy Only</strong> </span><br /><br />This online privacy policy applies only to information collected through our website and not to information collected offline.<br /><br /><span style="font-size: 12pt;"><strong>Terms and Conditions</strong> </span><br /><br />Please also visit our Terms and Conditions section establishing the use, disclaimers, and limitations of liability governing the use of our website at www.nutrabean.com/terms<br /><br /><span style="font-size: 12pt;"><strong>Your Consent</strong> </span><br /><br />By using our site, you consent to our privacy policy.<br /><br /><span style="font-size: 12pt;"><strong>Changes to our Privacy Policy</strong> </span><br /><br />If we decide to change our privacy policy, we will post those changes on this page. <br /><br /><span style="font-size: 12pt;"><strong>Contacting Us</strong> </span><br /><br />If there are any questions regarding this privacy policy you may contact us using the information below. <br /><br />www.nutrabean.com<br />2437 Bay Area Blvd #333<br />Houston, Texas 77058<br />United States<br />info@nutrabean.co</p>', '', '', '', 'Privacy Policy ', 'Privacy Policy ', 'Privacy Policy', 'Privacy Policy', '', '', '', 'Privacy Policy', '', 1, 1, 0, '2014-10-28 14:18:02', 0, '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_tbl`
--

CREATE TABLE IF NOT EXISTS `menu_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `menu_tbl`
--

INSERT INTO `menu_tbl` (`id`, `menu_name`) VALUES
(1, 'Office Supplies'),
(2, 'School supplies'),
(3, 'Technology'),
(4, 'Furniture'),
(5, 'Ink & Toner'),
(6, 'Catering & Cleaning'),
(7, 'Print & Copy'),
(10, 'Services');

-- --------------------------------------------------------

--
-- Table structure for table `navi_each_page_tbl`
--

CREATE TABLE IF NOT EXISTS `navi_each_page_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `footer_id` int(11) NOT NULL,
  `link_id` int(11) NOT NULL,
  `page_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `navi_each_page_tbl`
--

INSERT INTO `navi_each_page_tbl` (`id`, `page_id`, `footer_id`, `link_id`, `page_order`) VALUES
(1, 0, 11, 1, 0),
(10, 0, 12, 6, 0),
(4, 0, 17, 7, 0),
(5, 0, 17, 8, 0),
(6, 0, 20, 6, 0),
(7, 0, 20, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_letter_tbl`
--

CREATE TABLE IF NOT EXISTS `news_letter_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `news_letter_tbl`
--

INSERT INTO `news_letter_tbl` (`id`, `title`, `content`, `created_date`) VALUES
(3, 'Promotion for new product', '<p>\r\n	<input id="gwProxy" type="hidden" /><!--Session data--><input id="jsProxy" onclick="jsCall();" type="hidden" />HP Toner promotions</p>\r\n', '2012-08-03 09:18:59'),
(4, 'letter3', '<p>\r\n	test details</p>\r\n', '2010-12-30 13:22:28'),
(11, 'test7', '<p>\r\n	test7</p>\r\n', '2010-12-30 13:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `nl_subscribers_tbl`
--

CREATE TABLE IF NOT EXISTS `nl_subscribers_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `enable_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `nl_subscribers_tbl`
--

INSERT INTO `nl_subscribers_tbl` (`id`, `mail`, `enable_id`) VALUES
(62, 'sathish_test.desss@yahoo.com', 1),
(58, 'chandrazekar@yahoo.com', 0),
(57, 'chandler.dev@gmail.com', 0),
(56, 'chandrasekar@desss.com', 0),
(59, 'jeevan@desss.com', 1),
(60, 'sabari@desss.com', 1),
(61, 'sathishkumar@desss.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE IF NOT EXISTS `orders_status` (
  `orders_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_status_name` varchar(32) NOT NULL DEFAULT '',
  `ord_value` varchar(50) NOT NULL,
  PRIMARY KEY (`orders_status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_billing`
--

CREATE TABLE IF NOT EXISTS `order_billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` text NOT NULL,
  `php_session_id` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `primaryphone` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `billing_created` datetime NOT NULL,
  `billing_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `order_billing`
--

INSERT INTO `order_billing` (`id`, `parent_id`, `customer_id`, `order_id`, `php_session_id`, `first_name`, `last_name`, `emailid`, `address`, `city`, `primaryphone`, `country`, `state`, `zipcode`, `billing_created`, `billing_modified`) VALUES
(1, 1, 4, '1411068Ev4', 'rpfvkmok2ojs3tsqg7lbv2q8h0140611114735', 'Jayaraj', 'Vassan', 'jayaraj@desss.com', 'c sector', 'Houston', '787-878-7878', '', '3', '11111', '2014-06-11 12:29:07', '2014-06-11 21:59:07'),
(2, 2, 6, '141206S8W6', 'akhjomobdl1iqn6l3dh4knmbm7140612030658', 'kumar', 'vel', 'karunakaran@desss.com', 'south street', 'Abiramapuram', '454-545-4545', '', '12', '56565', '2014-06-12 15:06:58', '2014-06-13 00:36:58'),
(3, 3, 5, '1413067dc5', '38nne4dvsrivs5s4l918ptnnp3140613092703', 'kumar', 'vel', 'karunakaran@desss.com', 'south street', 'Abiramapuram', '454-545-4545', '', '2', '56565', '2014-06-13 09:27:03', '2014-06-13 18:57:03'),
(4, 4, 5, '141306WUM5', '38nne4dvsrivs5s4l918ptnnp3140613105127', 'kumar', 'vel', 'karunakaran@desss.com', 'south street', 'Abiramapuram', '454-545-4545', '', '14', '56565', '2014-06-13 10:51:27', '2014-06-13 20:21:27'),
(5, 5, 5, '141306JOL5', '38nne4dvsrivs5s4l918ptnnp3140613105226', 'kumar', 'vel', 'karunakaran@desss.com', 'south street', 'Abiramapuram', '454-545-4545', '', '2', '56565', '2014-06-13 16:57:29', '2014-06-14 02:27:29'),
(6, 6, 5, '141406JxP5', 'j4ckkdiqsd44dk1nj89nt3rjq1140614010709', 'kumar', 'vel', 'karunakaran@desss.com', 'south street', 'Abiramapuram', '454-545-4545', '', '14', '56565', '2014-06-14 13:07:09', '2014-06-14 22:37:09'),
(7, 7, 5, '141406Ae55', 'j4ckkdiqsd44dk1nj89nt3rjq1140614020255', 'kumar', 'vel', 'karunakaran@desss.com', 'south street', 'Abiramapuram', '454-545-4545', '', '2', '56565', '2014-06-14 14:02:55', '2014-06-14 23:32:55'),
(8, 8, 5, '1414064Xp5', 'j4ckkdiqsd44dk1nj89nt3rjq1140614020411', 'kumar', 'vel', 'karunakaran@desss.com', 'south street', 'chennai', '454-545-4545', '', '14', '56565', '2014-06-14 14:04:11', '2014-06-14 23:34:11'),
(9, 9, 0, '140608sfc', '64up5lvilpqpit4j7i117g3ir3140806081459', 'test', 'test', 'test@desss.com', 'test', 'Abiramapuram', '232-232-3232', '', '14', '23232', '2014-08-06 08:43:21', '2014-08-06 18:13:21'),
(10, 10, 7, '141208qVQ7', '2tgth84itrcq2pf38nbt17j0h2140812121509', 'fshdgh', 'dfghdh', 'test@desss.com', 'test', 'Abiramapuram', '654-656-4564', '', '1', '56565', '2014-08-12 12:15:09', '2014-08-12 21:45:09'),
(11, 11, 7, '141208Gt37', '2tgth84itrcq2pf38nbt17j0h2140812123624', 'fshdgh', 'dfghdh', 'test@desss.com', 'test', 'Abiramapuram', '654-656-4564', '', '3', '56565', '2014-08-12 12:36:24', '2014-08-12 22:06:24'),
(12, 12, 7, '141208rys7', '2tgth84itrcq2pf38nbt17j0h2140812124309', 'test', 'test', 'test@desss.com', 'test', 'test', '343-434-3434', '', '2', '56565', '2014-08-12 12:43:09', '2014-08-12 22:13:09'),
(13, 13, 7, '141208dSz7', '2tgth84itrcq2pf38nbt17j0h2140812124434', 'test', 'test', 'test@desss.com', 'test', 'Abiramapuram', '232-222-2222', '', '2', '56565', '2014-08-12 12:44:34', '2014-08-12 22:14:34'),
(14, 14, 7, '141208oJ47', '2tgth84itrcq2pf38nbt17j0h2140812124811', 'fshdgh', 'dfghdh', 'test@desss.com', 'test', 'test', '654-656-4564', '', '2', '56565', '2014-08-12 12:48:11', '2014-08-12 22:18:11'),
(15, 15, 7, '141208S2T7', '2tgth84itrcq2pf38nbt17j0h2140812011446', 'test', 'test', 'test@desss.com', 'test', 'Abiramapuram', '444-444-4444', '', '2', '56565', '2014-08-12 13:14:46', '2014-08-12 22:44:46'),
(16, 16, 7, '141208Itq7', '2tgth84itrcq2pf38nbt17j0h2140812011729', 'test', 'test', 'test@desss.com', 'test', 'Abiramapuram', '454-544-5454', '', '16', '56565', '2014-08-12 13:17:29', '2014-08-12 22:47:29'),
(17, 17, 7, '141208dPr7', '2tgth84itrcq2pf38nbt17j0h2140812012117', 'test', 'test', 'test@desss.com', 'test', 'Abiramapuram', '444-444-4444', '', '3', '56565', '2014-08-12 13:21:17', '2014-08-12 22:51:17'),
(18, 18, 7, '1412088rd7', '2tgth84itrcq2pf38nbt17j0h2140812013553', 'test', 'test', 'test@desss.com', 'test', 'Abiramapuram', '343-434-3434', '', '11', '56565', '2014-08-12 13:35:53', '2014-08-12 23:05:53'),
(19, 19, 7, '141208HO07', '2tgth84itrcq2pf38nbt17j0h2140812013806', 'fshdgh', 'dfghdh', 'test@desss.com', 'test', 'Abiramapuram', '654-656-4564', '', '3', '56565', '2014-08-12 13:38:30', '2014-08-12 23:08:30'),
(20, 20, 7, '141208yTQ7', '2tgth84itrcq2pf38nbt17j0h2140812025701', 'test', 'test', 'test@desss.com', 'test', 'Abiramapuram', '152-121-1111', '', '13', '56565', '2014-08-12 14:57:01', '2014-08-13 00:27:01'),
(21, 21, 8, '141208eYd8', '03hd2jq6nsbiuf57o2a7lf8m45140812031810', 'Sabari', 'Vaassan', 'sabari@desss.com', 'no 2 o block', 'Houston', '384-394-3049', '', '50', '07321', '2014-08-12 15:18:10', '2014-08-13 00:48:10'),
(22, 22, 7, '141208QH97', '2tgth84itrcq2pf38nbt17j0h2140812031819', 'test', 'test', 'test@desss.com', 'test', 'Abiramapuram', '444-444-4444', '', '3', '56565', '2014-08-12 15:18:19', '2014-08-13 00:48:19'),
(23, 23, 9, '141308GVa9', '3e83bf6d392cf224cc65fb171726ebd7140813125619', 'chandelr', 'Dev', 'dev@desss.com', '5410 Plumero meadow dr', 'katy', '713-589-6496', '', '50', '77494', '2014-08-13 12:56:19', '2014-08-13 12:56:19'),
(24, 24, 10, '141408VVi10', '6dd3fa68fd256f87d491ab3c1f571d4b140814110150', 'test', 'test', 'test@desss.com', 'south', 'chennai', '444-545-4545', '', '9', '23232', '2014-08-14 11:01:50', '2014-08-14 11:01:50'),
(25, 25, 10, '141408PMZ10', '6dd3fa68fd256f87d491ab3c1f571d4b140814111018', 'test', 'test', 'test@desss.com', 'south', 'chennai', '343-433-4343', '', '4', '23232', '2014-08-14 11:10:18', '2014-08-14 11:10:18'),
(26, 26, 10, '141408m9O10', '6dd3fa68fd256f87d491ab3c1f571d4b140814111946', 'test', 'test', 'test@desss.com', 'south', 'chennai', '444-545-4545', '', '3', '23232', '2014-08-14 11:19:46', '2014-08-14 11:19:46'),
(27, 27, 10, '141408kLl10', '6dd3fa68fd256f87d491ab3c1f571d4b140814112646', 'test', 'test', 'test@desss.com', 'south', 'chennai', '444-545-4545', '', '2', '23232', '2014-08-14 11:26:46', '2014-08-14 11:26:46'),
(28, 28, 10, '141408wku10', '6dd3fa68fd256f87d491ab3c1f571d4b140814113412', 'test', 'test', 'test@desss.com', 'south', 'chennai', '444-545-4545', '', '2', '23232', '2014-08-14 11:34:12', '2014-08-14 11:34:12'),
(29, 29, 10, '14140829810', '6dd3fa68fd256f87d491ab3c1f571d4b140814120337', 'test', 'test', 'test@desss.com', 'south', 'chennai', '343-433-4343', '', '3', '23232', '2014-08-14 12:03:37', '2014-08-14 12:03:37'),
(30, 30, 10, '141408T5j10', '6dd3fa68fd256f87d491ab3c1f571d4b140814124844', 'test', 'test', 'test@desss.com', 'south', 'chennai', '343-433-4343', '', '2', '23232', '2014-08-14 12:48:44', '2014-08-14 12:48:44'),
(31, 31, 11, '141909DGG11', '3070e056a8e3eb53cc65a0174c352594140919120136', 'test', 'test', 'test@desss.com', 'south', 'chennai', '121-212-1212', '', '5', '23232', '2014-09-19 12:01:36', '2014-09-19 12:01:36'),
(32, 32, 12, '143009Xpq12', 'a56c4d6951638a2bb2a3266353572e71140930025102', 'chandler', 'Dev', 'dev@desss.com', '5410 Plumero Meadow dr', 'katy', '713-557-8001', '', '50', '77494', '2014-09-30 14:51:02', '2014-09-30 14:51:02'),
(33, 33, 13, '141310zco13', '6609deea7108ed0ee9c6b3fbbc68a715141013015740', 'chandrasekar', 'Dev', 'dev@desss.com', '5410 plumero meadow dr', 'katy', '713-557-8001', '', '50', '77494', '2014-10-13 13:57:40', '2014-10-13 13:57:40'),
(34, 34, 14, '142310p9a14', 'f649e7119ef16a790fdb95add9b54277141023075715', 'Hatem', 'Gouti', 'hatem.gouti@gmail.com', '2221 w dallas', 'Houston', '2816502677', '', '50', '77019', '2014-10-23 19:57:16', '2014-10-23 19:57:16'),
(35, 35, 15, '142710Cbf15', '94247fbfbf52851b8a751ee971260483141027061201', 'rajan', 'rajan', 's.rajan@desss.com', 'No 477 C sector', 'Houton', '978-717-7829', '', '50', '77042', '2014-10-27 06:12:01', '2014-10-27 06:12:01'),
(36, 36, 16, '1427103BW16', '206db7b6522226798facecefaea0c9f6141027073126', 'test', 'test', 'test@test.com', 'south street', 'chennai', '232-323-2323', '', '8', '45454', '2014-10-27 07:31:26', '2014-10-27 07:31:26'),
(37, 37, 17, '142810ERy17', '8ea824090ee39a980f02a417ae40f5e8141028054254', 'test', 'test', 'seleniumtest.dess@gmail.com', 'Street ', 'City', '111-111-1111', '', '7', '54543', '2014-10-28 05:43:44', '2014-10-28 05:43:44'),
(38, 38, 18, '142910tqt18', 'b9a5f04d31697ebb324a39d6208f6882141029054405', 'parthi', 'ban', 'sr.parthiban@gmail.com', 'No 477 ', 'Houston', '656-564-1651', '', '50', '77042', '2014-10-29 05:44:43', '2014-10-29 05:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `php_session_id` varchar(100) NOT NULL,
  `product_quantity` varchar(100) NOT NULL,
  `promo_coupon_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `customer_id`, `parent_id`, `order_id`, `product_id`, `php_session_id`, `product_quantity`, `promo_coupon_id`, `first_name`, `product_price`, `total_amount`, `order_date`) VALUES
(1, 4, 1, '1411068Ev4', 1, 'rpfvkmok2ojs3tsqg7lbv2q8h0140611114735', '1', 0, '', '2.00', '2.00', '2014-08-13'),
(2, 6, 2, '141206S8W6', 2, 'akhjomobdl1iqn6l3dh4knmbm7140612030658', '1', 0, '', '2.00', '2.00', '0000-00-00'),
(3, 5, 3, '1413067dc5', 2, '38nne4dvsrivs5s4l918ptnnp3140613092703', '1', 0, '', '2.00', '2.00', '0000-00-00'),
(4, 5, 4, '141306WUM5', 2, '38nne4dvsrivs5s4l918ptnnp3140613105127', '1', 0, '', '2.00', '2.00', '0000-00-00'),
(5, 5, 5, '141306JOL5', 2, '38nne4dvsrivs5s4l918ptnnp3140613105226', '1', 0, '', '2.00', '2.00', '0000-00-00'),
(6, 5, 6, '141406JxP5', 2, 'j4ckkdiqsd44dk1nj89nt3rjq1140614010709', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(7, 5, 7, '141406Ae55', 2, 'j4ckkdiqsd44dk1nj89nt3rjq1140614020255', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(8, 5, 8, '1414064Xp5', 2, 'j4ckkdiqsd44dk1nj89nt3rjq1140614020411', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(9, 0, 9, '140608sfc', 1, '64up5lvilpqpit4j7i117g3ir3140806081459', '1', 0, '', '34.99', '34.99', '0000-00-00'),
(10, 7, 10, '141208qVQ7', 2, '2tgth84itrcq2pf38nbt17j0h2140812121509', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(11, 7, 11, '141208Gt37', 2, '2tgth84itrcq2pf38nbt17j0h2140812123624', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(12, 7, 12, '141208rys7', 1, '2tgth84itrcq2pf38nbt17j0h2140812124309', '1', 0, '', '34.99', '34.99', '0000-00-00'),
(13, 7, 13, '141208dSz7', 2, '2tgth84itrcq2pf38nbt17j0h2140812124434', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(14, 7, 14, '141208oJ47', 1, '2tgth84itrcq2pf38nbt17j0h2140812124811', '1', 0, '', '34.99', '34.99', '0000-00-00'),
(15, 7, 15, '141208S2T7', 1, '2tgth84itrcq2pf38nbt17j0h2140812011446', '1', 0, '', '34.99', '34.99', '0000-00-00'),
(16, 7, 16, '141208Itq7', 2, '2tgth84itrcq2pf38nbt17j0h2140812011729', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(17, 7, 17, '141208dPr7', 2, '2tgth84itrcq2pf38nbt17j0h2140812012117', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(18, 7, 18, '1412088rd7', 1, '2tgth84itrcq2pf38nbt17j0h2140812013553', '1', 0, '', '34.99', '34.99', '0000-00-00'),
(19, 7, 19, '141208HO07', 2, '2tgth84itrcq2pf38nbt17j0h2140812013806', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(20, 7, 20, '141208yTQ7', 2, '2tgth84itrcq2pf38nbt17j0h2140812025701', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(21, 8, 21, '141208eYd8', 1, '03hd2jq6nsbiuf57o2a7lf8m45140812031810', '1', 0, '', '35.99', '35.99', '0000-00-00'),
(22, 7, 22, '141208QH97', 2, '2tgth84itrcq2pf38nbt17j0h2140812031819', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(23, 9, 23, '141308GVa9', 1, '3e83bf6d392cf224cc65fb171726ebd7140813125619', '1', 0, '', '35.99', '35.99', '0000-00-00'),
(24, 10, 24, '141408VVi10', 2, '6dd3fa68fd256f87d491ab3c1f571d4b140814110150', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(25, 10, 25, '141408PMZ10', 2, '6dd3fa68fd256f87d491ab3c1f571d4b140814111018', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(26, 10, 26, '141408m9O10', 2, '6dd3fa68fd256f87d491ab3c1f571d4b140814111946', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(27, 10, 27, '141408kLl10', 2, '6dd3fa68fd256f87d491ab3c1f571d4b140814112646', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(28, 10, 28, '141408wku10', 2, '6dd3fa68fd256f87d491ab3c1f571d4b140814113412', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(29, 10, 29, '14140829810', 2, '6dd3fa68fd256f87d491ab3c1f571d4b140814120337', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(30, 10, 30, '141408T5j10', 2, '6dd3fa68fd256f87d491ab3c1f571d4b140814124844', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(31, 11, 31, '141909DGG11', 2, '3070e056a8e3eb53cc65a0174c352594140919120136', '1', 0, '', '52.00', '52.00', '0000-00-00'),
(32, 12, 32, '143009Xpq12', 1, 'a56c4d6951638a2bb2a3266353572e71140930025102', '1', 0, '', '35.99', '35.99', '0000-00-00'),
(33, 13, 33, '141310zco13', 1, '6609deea7108ed0ee9c6b3fbbc68a715141013015740', '1', 0, '', '35.99', '35.99', '0000-00-00'),
(34, 14, 34, '142310p9a14', 1, 'f649e7119ef16a790fdb95add9b54277141023075715', '1', 0, '', '12.49', '12.49', '0000-00-00'),
(35, 15, 35, '142710Cbf15', 1, '94247fbfbf52851b8a751ee971260483141027061201', '1', 0, '', '12.49', '12.49', '0000-00-00'),
(36, 16, 36, '1427103BW16', 2, '206db7b6522226798facecefaea0c9f6141027073126', '1', 0, '', '17.49', '17.49', '0000-00-00'),
(37, 17, 37, '142810ERy17', 1, '8ea824090ee39a980f02a417ae40f5e8141028054254', '1', 0, '', '0.00', '0.00', '0000-00-00'),
(38, 18, 38, '142910tqt18', 2, 'b9a5f04d31697ebb324a39d6208f6882141029054405', '1', 0, '', '0.00', '0.00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping`
--

CREATE TABLE IF NOT EXISTS `order_shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `php_session_id` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `shipping_firstname` varchar(100) NOT NULL,
  `shipping_lastname` varchar(100) NOT NULL,
  `shipping_telephone` varchar(20) NOT NULL,
  `shipping_address` varchar(500) NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `shipping_state` varchar(100) NOT NULL,
  `shipping_country` varchar(100) NOT NULL,
  `shipping_zip` varchar(20) NOT NULL,
  `shipping_created` datetime NOT NULL,
  `shipping_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `order_shipping`
--

INSERT INTO `order_shipping` (`id`, `customer_id`, `parent_id`, `php_session_id`, `order_id`, `shipping_firstname`, `shipping_lastname`, `shipping_telephone`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_country`, `shipping_zip`, `shipping_created`, `shipping_modified`) VALUES
(1, 4, 1, 'rpfvkmok2ojs3tsqg7lbv2q8h0140611114735', '1411068Ev4', 'Jayaraj', 'Vassan', '', 'c sector', 'Houston', '3', 'United States', '11111', '2014-06-11 12:29:07', '2014-06-11 21:59:07'),
(2, 6, 2, 'akhjomobdl1iqn6l3dh4knmbm7140612030658', '141206S8W6', 'kumar', 'vel', '', 'south street', 'Abiramapuram', '12', 'United States', '56565', '2014-06-12 15:06:58', '2014-06-13 00:36:58'),
(3, 5, 3, '38nne4dvsrivs5s4l918ptnnp3140613092703', '1413067dc5', 'kumar', 'vel', '', 'south street', 'Abiramapuram', '2', 'United States', '56565', '2014-06-13 09:27:03', '2014-06-13 18:57:03'),
(4, 5, 4, '38nne4dvsrivs5s4l918ptnnp3140613105127', '141306WUM5', 'kumar', 'vel', '', 'south street', 'Abiramapuram', '14', 'United States', '56565', '2014-06-13 10:51:27', '2014-06-13 20:21:27'),
(5, 5, 5, '38nne4dvsrivs5s4l918ptnnp3140613105226', '141306JOL5', 'kumar', 'vel', '', 'south street', 'Abiramapuram', '2', 'United States', '56565', '2014-06-13 16:57:29', '2014-06-14 02:27:29'),
(6, 5, 6, 'j4ckkdiqsd44dk1nj89nt3rjq1140614010709', '141406JxP5', 'kumar', 'vel', '', 'south street', 'Abiramapuram', '14', 'United States', '56565', '2014-06-14 13:07:09', '2014-06-14 22:37:09'),
(7, 5, 7, 'j4ckkdiqsd44dk1nj89nt3rjq1140614020255', '141406Ae55', 'kumar', 'vel', '', 'south street', 'Abiramapuram', '2', 'United States', '56565', '2014-06-14 14:02:55', '2014-06-14 23:32:55'),
(8, 5, 8, 'j4ckkdiqsd44dk1nj89nt3rjq1140614020411', '1414064Xp5', 'kumar', 'vel', '', 'south street', 'chennai', '14', 'United States', '56565', '2014-06-14 14:04:11', '2014-06-14 23:34:11'),
(9, 0, 9, '64up5lvilpqpit4j7i117g3ir3140806081459', '140608sfc', 'test', 'test', '', 'test', 'Abiramapuram', '14', 'United States', '23232', '2014-08-06 08:43:21', '2014-08-06 18:13:21'),
(10, 7, 10, '2tgth84itrcq2pf38nbt17j0h2140812121509', '141208qVQ7', 'fshdgh', 'dfghdh', '', 'test', 'Abiramapuram', '1', 'United States', '56565', '2014-08-12 12:15:09', '2014-08-12 21:45:09'),
(11, 7, 11, '2tgth84itrcq2pf38nbt17j0h2140812123624', '141208Gt37', 'fshdgh', 'dfghdh', '', 'test', 'Abiramapuram', '3', 'United States', '56565', '2014-08-12 12:36:24', '2014-08-12 22:06:24'),
(12, 7, 12, '2tgth84itrcq2pf38nbt17j0h2140812124309', '141208rys7', 'test', 'test', '', 'test', 'test', '2', 'United States', '56565', '2014-08-12 12:43:09', '2014-08-12 22:13:09'),
(13, 7, 13, '2tgth84itrcq2pf38nbt17j0h2140812124434', '141208dSz7', 'test', 'test', '', 'test', 'Abiramapuram', '2', 'United States', '56565', '2014-08-12 12:44:34', '2014-08-12 22:14:34'),
(14, 7, 14, '2tgth84itrcq2pf38nbt17j0h2140812124811', '141208oJ47', 'fshdgh', 'dfghdh', '', 'test', 'test', '2', 'United States', '56565', '2014-08-12 12:48:11', '2014-08-12 22:18:11'),
(15, 7, 15, '2tgth84itrcq2pf38nbt17j0h2140812011446', '141208S2T7', 'test', 'test', '', 'test', 'Abiramapuram', '2', 'United States', '56565', '2014-08-12 13:14:46', '2014-08-12 22:44:46'),
(16, 7, 16, '2tgth84itrcq2pf38nbt17j0h2140812011729', '141208Itq7', 'test', 'test', '', 'test', 'Abiramapuram', '16', 'United States', '56565', '2014-08-12 13:17:29', '2014-08-12 22:47:29'),
(17, 7, 17, '2tgth84itrcq2pf38nbt17j0h2140812012117', '141208dPr7', 'test', 'test', '', 'test', 'Abiramapuram', '3', 'United States', '56565', '2014-08-12 13:21:17', '2014-08-12 22:51:17'),
(18, 7, 18, '2tgth84itrcq2pf38nbt17j0h2140812013553', '1412088rd7', 'test', 'test', '', 'test', 'Abiramapuram', '11', 'United States', '56565', '2014-08-12 13:35:53', '2014-08-12 23:05:53'),
(19, 7, 19, '2tgth84itrcq2pf38nbt17j0h2140812013806', '141208HO07', 'fshdgh', 'dfghdh', '', 'test', 'Abiramapuram', '3', 'United States', '56565', '2014-08-12 13:38:30', '2014-08-12 23:08:30'),
(20, 7, 20, '2tgth84itrcq2pf38nbt17j0h2140812025701', '141208yTQ7', 'test', 'test', '', 'test', 'Abiramapuram', '13', 'United States', '56565', '2014-08-12 14:57:01', '2014-08-13 00:27:01'),
(21, 8, 21, '03hd2jq6nsbiuf57o2a7lf8m45140812031810', '141208eYd8', 'Sabari', 'Vaassan', '', 'no 2 o block', 'Houston', '50', 'United States', '07321', '2014-08-12 15:18:10', '2014-08-13 00:48:10'),
(22, 7, 22, '2tgth84itrcq2pf38nbt17j0h2140812031819', '141208QH97', 'test', 'test', '', 'test', 'Abiramapuram', '3', 'United States', '56565', '2014-08-12 15:18:19', '2014-08-13 00:48:19'),
(23, 9, 23, '3e83bf6d392cf224cc65fb171726ebd7140813125619', '141308GVa9', 'chandelr', 'Dev', '', '5410 Plumero meadow dr', 'katy', '50', 'United States', '77494', '2014-08-13 12:56:19', '2014-08-13 12:56:19'),
(24, 10, 24, '6dd3fa68fd256f87d491ab3c1f571d4b140814110150', '141408VVi10', 'test', 'test', '', 'south', 'chennai', '9', 'United States', '23232', '2014-08-14 11:01:50', '2014-08-14 11:01:50'),
(25, 10, 25, '6dd3fa68fd256f87d491ab3c1f571d4b140814111018', '141408PMZ10', 'test', 'test', '', 'south', 'chennai', '4', 'United States', '23232', '2014-08-14 11:10:18', '2014-08-14 11:10:18'),
(26, 10, 26, '6dd3fa68fd256f87d491ab3c1f571d4b140814111946', '141408m9O10', 'test', 'test', '', 'south', 'chennai', '3', 'United States', '23232', '2014-08-14 11:19:46', '2014-08-14 11:19:46'),
(27, 10, 27, '6dd3fa68fd256f87d491ab3c1f571d4b140814112646', '141408kLl10', 'test', 'test', '', 'south', 'chennai', '2', 'United States', '23232', '2014-08-14 11:26:46', '2014-08-14 11:26:46'),
(28, 10, 28, '6dd3fa68fd256f87d491ab3c1f571d4b140814113412', '141408wku10', 'test', 'test', '', 'south', 'chennai', '2', 'United States', '23232', '2014-08-14 11:34:12', '2014-08-14 11:34:12'),
(29, 10, 29, '6dd3fa68fd256f87d491ab3c1f571d4b140814120337', '14140829810', 'test', 'test', '', 'south', 'chennai', '3', 'United States', '23232', '2014-08-14 12:03:37', '2014-08-14 12:03:37'),
(30, 10, 30, '6dd3fa68fd256f87d491ab3c1f571d4b140814124844', '141408T5j10', 'test', 'test', '', 'south', 'chennai', '2', 'United States', '23232', '2014-08-14 12:48:44', '2014-08-14 12:48:44'),
(31, 11, 31, '3070e056a8e3eb53cc65a0174c352594140919120136', '141909DGG11', 'test', 'test', '', 'south', 'chennai', '5', 'United States', '23232', '2014-09-19 12:01:36', '2014-09-19 12:01:36'),
(32, 12, 32, 'a56c4d6951638a2bb2a3266353572e71140930025102', '143009Xpq12', 'chandler', 'Dev', '', '5410 Plumero Meadow dr', 'katy', '50', 'United States', '77494', '2014-09-30 14:51:02', '2014-09-30 14:51:02'),
(33, 13, 33, '6609deea7108ed0ee9c6b3fbbc68a715141013015740', '141310zco13', 'chandrasekar', 'Dev', '', '5410 plumero meadow dr', 'katy', '50', 'United States', '77494', '2014-10-13 13:57:40', '2014-10-13 13:57:40'),
(34, 14, 34, 'f649e7119ef16a790fdb95add9b54277141023075715', '142310p9a14', 'Hatem', 'Gouti', '', '2221 w dallas', 'Houston', '50', 'United States', '77019', '2014-10-23 19:57:16', '2014-10-23 19:57:16'),
(35, 15, 35, '94247fbfbf52851b8a751ee971260483141027061201', '142710Cbf15', 'rajan', 'rajan', '', 'No 477 C sector', 'Houton', '50', 'United States', '77042', '2014-10-27 06:12:01', '2014-10-27 06:12:01'),
(36, 16, 36, '206db7b6522226798facecefaea0c9f6141027073126', '1427103BW16', 'test', 'test', '', 'south street', 'chennai', '8', 'United States', '45454', '2014-10-27 07:31:26', '2014-10-27 07:31:26'),
(37, 17, 37, '8ea824090ee39a980f02a417ae40f5e8141028054254', '142810ERy17', 'test', 'test', '', 'Street ', 'City', '7', 'United States', '54543', '2014-10-28 05:43:44', '2014-10-28 05:43:44'),
(38, 18, 38, 'b9a5f04d31697ebb324a39d6208f6882141029054405', '142910tqt18', 'parthi', 'ban', '', 'No 477 ', 'Houston', '50', 'United States', '77042', '2014-10-29 05:44:43', '2014-10-29 05:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE IF NOT EXISTS `order_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `auth_code` text NOT NULL,
  `order_id` text NOT NULL,
  `billing_amt` decimal(10,2) NOT NULL,
  `shipping_amt` decimal(10,2) NOT NULL,
  `tax_amt` decimal(10,2) NOT NULL,
  `grand_pay` decimal(10,2) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `delivary_status` varchar(50) NOT NULL,
  `billing_same` varchar(20) NOT NULL,
  `shipping_provider` varchar(100) NOT NULL,
  `hanling_fees` varchar(50) NOT NULL,
  `order_status` text NOT NULL,
  `php_session_id` text NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `order_created` datetime NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`id`, `customer_id`, `auth_code`, `order_id`, `billing_amt`, `shipping_amt`, `tax_amt`, `grand_pay`, `payment_method`, `transaction_id`, `delivary_status`, `billing_same`, `shipping_provider`, `hanling_fees`, `order_status`, `php_session_id`, `ip_address`, `order_created`, `last_modified`, `order_date`) VALUES
(1, 4, '000000', '1411068Ev4', '6.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', 'rpfvkmok2ojs3tsqg7lbv2q8h0140611114735', '192.168.1.48', '2014-06-11 12:29:07', '2014-06-11 21:59:09', '0000-00-00'),
(2, 6, '', '141206S8W6', '6.00', '4.00', '0.00', '6.00', 'authorised.net', '', 'Pending', 'yes', '4', 'Flatrate', 'Order Received', 'akhjomobdl1iqn6l3dh4knmbm7140612030658', '192.168.1.142', '2014-06-12 15:06:58', '2014-06-13 00:36:58', '0000-00-00'),
(3, 5, '000000', '1413067dc5', '6.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '38nne4dvsrivs5s4l918ptnnp3140613092703', '192.168.1.142', '2014-06-13 09:27:03', '2014-06-13 18:57:16', '0000-00-00'),
(4, 5, '000000', '141306WUM5', '6.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '38nne4dvsrivs5s4l918ptnnp3140613105127', '192.168.1.142', '2014-06-13 10:51:27', '2014-06-13 20:21:29', '0000-00-00'),
(5, 5, '000000', '141306JOL5', '6.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '38nne4dvsrivs5s4l918ptnnp3140613105226', '192.168.1.142', '2014-06-13 16:57:29', '2014-06-14 02:27:32', '0000-00-00'),
(6, 5, '000000', '141406JxP5', '52.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', 'j4ckkdiqsd44dk1nj89nt3rjq1140614010709', '192.168.1.142', '2014-06-14 13:07:09', '2014-06-14 22:37:12', '0000-00-00'),
(7, 5, '000000', '141406Ae55', '50.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', 'j4ckkdiqsd44dk1nj89nt3rjq1140614020255', '192.168.1.142', '2014-06-14 14:02:55', '2014-06-14 23:32:58', '0000-00-00'),
(8, 5, '000000', '1414064Xp5', '50.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', 'j4ckkdiqsd44dk1nj89nt3rjq1140614020411', '192.168.1.142', '2014-06-14 14:04:11', '2014-06-14 23:34:12', '0000-00-00'),
(9, 0, '000000', '140608sfc', '38.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '64up5lvilpqpit4j7i117g3ir3140806081459', '192.168.1.7', '2014-08-06 08:43:21', '2014-08-06 18:13:23', '0000-00-00'),
(10, 7, '000000', '141208qVQ7', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812121509', '192.168.1.7', '2014-08-12 12:15:09', '2014-08-12 21:45:21', '0000-00-00'),
(11, 7, '000000', '141208Gt37', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812123624', '192.168.1.7', '2014-08-12 12:36:24', '2014-08-12 22:06:27', '0000-00-00'),
(12, 7, '000000', '141208rys7', '38.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812124309', '192.168.1.7', '2014-08-12 12:43:09', '2014-08-12 22:13:16', '0000-00-00'),
(13, 7, '000000', '141208dSz7', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812124434', '192.168.1.7', '2014-08-12 12:44:34', '2014-08-12 22:14:36', '0000-00-00'),
(14, 7, '000000', '141208oJ47', '38.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812124811', '192.168.1.7', '2014-08-12 12:48:11', '2014-08-12 22:18:13', '0000-00-00'),
(15, 7, '000000', '141208S2T7', '38.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812011446', '192.168.1.7', '2014-08-12 13:14:46', '2014-08-12 22:44:56', '0000-00-00'),
(16, 7, '000000', '141208Itq7', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812011729', '192.168.1.7', '2014-08-12 13:17:29', '2014-08-12 22:47:34', '0000-00-00'),
(17, 7, '000000', '141208dPr7', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812012117', '192.168.1.7', '2014-08-12 13:21:17', '2014-08-12 22:51:20', '0000-00-00'),
(18, 7, '000000', '1412088rd7', '38.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812013553', '192.168.1.7', '2014-08-12 13:35:53', '2014-08-12 23:06:07', '0000-00-00'),
(19, 7, '000000', '141208HO07', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812013806', '192.168.1.7', '2014-08-12 13:38:30', '2014-08-12 23:08:34', '0000-00-00'),
(20, 7, '000000', '141208yTQ7', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812025701', '192.168.1.7', '2014-08-12 14:57:01', '2014-08-13 00:27:03', '0000-00-00'),
(21, 8, '000000', '141208eYd8', '39.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '03hd2jq6nsbiuf57o2a7lf8m45140812031810', '192.168.1.233', '2014-08-12 15:18:10', '2014-08-13 00:48:14', '0000-00-00'),
(22, 7, '000000', '141208QH97', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '2tgth84itrcq2pf38nbt17j0h2140812031819', '192.168.1.7', '2014-08-12 15:18:19', '2014-08-13 00:48:21', '0000-00-00'),
(23, 9, '000000', '141308GVa9', '39.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '3e83bf6d392cf224cc65fb171726ebd7140813125619', '98.197.93.44', '2014-08-13 12:56:19', '2014-08-13 12:56:21', '0000-00-00'),
(24, 10, '000000', '141408VVi10', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '6dd3fa68fd256f87d491ab3c1f571d4b140814110150', '182.72.202.43', '2014-08-14 11:01:50', '2014-08-14 11:01:52', '0000-00-00'),
(25, 10, '000000', '141408PMZ10', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '6dd3fa68fd256f87d491ab3c1f571d4b140814111018', '182.72.202.43', '2014-08-14 11:10:18', '2014-08-14 11:10:20', '0000-00-00'),
(26, 10, '000000', '141408m9O10', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '6dd3fa68fd256f87d491ab3c1f571d4b140814111946', '182.72.202.43', '2014-08-14 11:19:46', '2014-08-14 11:19:48', '0000-00-00'),
(27, 10, '000000', '141408kLl10', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '6dd3fa68fd256f87d491ab3c1f571d4b140814112646', '182.72.202.43', '2014-08-14 11:26:46', '2014-08-14 11:26:48', '0000-00-00'),
(28, 10, '000000', '141408wku10', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '6dd3fa68fd256f87d491ab3c1f571d4b140814113412', '182.72.202.43', '2014-08-14 11:34:12', '2014-08-14 11:34:14', '0000-00-00'),
(29, 10, '000000', '14140829810', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '6dd3fa68fd256f87d491ab3c1f571d4b140814120337', '182.72.202.43', '2014-08-14 12:03:37', '2014-08-14 12:03:38', '0000-00-00'),
(30, 10, '000000', '141408T5j10', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '6dd3fa68fd256f87d491ab3c1f571d4b140814124844', '182.72.202.43', '2014-08-14 12:48:44', '2014-08-14 12:48:45', '0000-00-00'),
(31, 11, '000000', '141909DGG11', '56.00', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '3070e056a8e3eb53cc65a0174c352594140919120136', '182.72.202.43', '2014-09-19 12:01:36', '2014-09-19 12:01:38', '0000-00-00'),
(32, 12, '000000', '143009Xpq12', '39.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', 'a56c4d6951638a2bb2a3266353572e71140930025102', '75.148.178.14', '2014-09-30 14:51:02', '2014-09-30 14:51:05', '0000-00-00'),
(33, 13, '000000', '141310zco13', '39.99', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Open', '6609deea7108ed0ee9c6b3fbbc68a715141013015740', '98.197.93.44', '2014-10-13 13:57:40', '2014-10-17 09:58:58', '0000-00-00'),
(34, 14, '000000', '142310p9a14', '16.49', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', 'f649e7119ef16a790fdb95add9b54277141023075715', '172.7.225.26', '2014-10-23 19:57:16', '2014-10-23 19:57:16', '0000-00-00'),
(35, 15, '000000', '142710Cbf15', '16.49', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '94247fbfbf52851b8a751ee971260483141027061201', '182.72.202.41', '2014-10-27 06:12:01', '2014-10-27 06:12:02', '0000-00-00'),
(36, 16, '000000', '1427103BW16', '21.49', '4.00', '0.00', '0.00', 'authorised.net', '0', 'Open', 'yes', '4', 'Flatrate', 'Order Received', '206db7b6522226798facecefaea0c9f6141027073126', '182.72.202.41', '2014-10-27 07:31:26', '2014-10-27 07:31:27', '0000-00-00'),
(37, 17, '', '142810ERy17', '0.00', '4.00', '0.00', '0.00', 'authorised.net', '', 'Pending', 'yes', '4', 'Flatrate', 'Order Received', '8ea824090ee39a980f02a417ae40f5e8141028054254', '182.72.202.41', '2014-10-28 05:43:44', '2014-10-28 05:43:44', '0000-00-00'),
(38, 18, '', '142910tqt18', '0.00', '4.00', '0.00', '0.00', 'authorised.net', '', 'Pending', 'yes', '4', 'Flatrate', 'Order Received', 'b9a5f04d31697ebb324a39d6208f6882141029054405', '182.72.202.41', '2014-10-29 05:44:43', '2014-10-29 05:44:43', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE IF NOT EXISTS `page_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `title` text NOT NULL,
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_misc` longtext NOT NULL,
  `h1` longtext NOT NULL,
  `h2` longtext NOT NULL,
  `fb_image` longtext NOT NULL,
  `fb_link` longtext NOT NULL,
  `coupon_image` longtext NOT NULL,
  `coupon_link` longtext NOT NULL,
  `Banner_top` longtext NOT NULL,
  `Banner_top_link` longtext NOT NULL,
  `Banner_bottom` longtext NOT NULL,
  `Banner_bottom_link` longtext NOT NULL,
  `banner_left` longtext NOT NULL,
  `banner_left_link` longtext NOT NULL,
  `banner_right1` longtext NOT NULL,
  `banner_right1_link` longtext NOT NULL,
  `banner_right2` longtext NOT NULL,
  `banner_right2_link` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `page_name`, `content`, `active`, `title`, `meta_title`, `meta_desc`, `meta_key`, `meta_misc`, `h1`, `h2`, `fb_image`, `fb_link`, `coupon_image`, `coupon_link`, `Banner_top`, `Banner_top_link`, `Banner_bottom`, `Banner_bottom_link`, `banner_left`, `banner_left_link`, `banner_right1`, `banner_right1_link`, `banner_right2`, `banner_right2_link`) VALUES
(1, 'index.php', '<br />\r\n', 1, 'Home', 'Laser & Fax Toners | Inkjet Cartridges | Copier Toners | Label Tapes | POS & Printer Ribbons | Thermal Fax(TTR) | Fusers & Maint Kits | Laptop Batteries & Chargers | Houston , USA - Buy Toner Online', 'Buy Toner Online offers high quality & latest model printer like ink cartridges, laser & Fax toner, laptop batteries, chargers, Thermal Fax, Copier toner. ', 'Laser Toners, Fax Toners, Inkjet Cartridges, Copier Toners, Label Tapes | POS & Printer Ribbons | Thermal Fax(TTR), Fusers, Maint Kits, Laptop Batteries, Chargers, Houston, Buy Toner Online', '', '', '', 'facebook.jpg', 'http://www.facebook.com/BuyTonerOnline', 'coupon11.jpg', '#', 'bannertopp.jpg', ' http://www.webdesignerhouston.us/', 'coupon.jpg', ' http://www.furnace-repair-tuneup.com/', 'banleft.jpg', ' http://www.desss.com/', 'banr1.jpg', 'http://www.banquethallshouston.com/', 'banr2.jpg', 'http://www.dessstelecom.com/'),
(2, 'ourstores.php', '<b>A glance at all our products:</b>\r\n<br>\r\n<ul>\r\n<li>Laser and Fax toners.</li>\r\n<li>Inkjet cartridges.</li>\r\n<li>Copier Toners.</li>\r\n<li>Label Tapes.</li>\r\n<li>POS and Printer Ribbons.</li>\r\n<li>Thermal Fax.</li>\r\n<li>Fuses and maintenance kits.</li>\r\n<li>Laptop batteries and chargers.</li>\r\n</ul>\r\n<br>\r\n<b>A view of the customer support that we offer:</b>\r\n<br>\r\n<ul>\r\n<li>24/7 customer support.</li>\r\n<li>Our experienced team answers all the queries.</li>\r\n<li>Doubts on all the products and services cleared all at once.</li>\r\n<li>Doubts about online shopping cleared instantly.</li>\r\n</ul>\r\n<br>\r\n<b>Online shopping made easy:</b>\r\n<br>\r\n<ul>\r\n<li>A clear display of all the products and prices.</li>\r\n<li>Secured payment options.</li>\r\n<li>Various payment options like credit, debit cards and internet banking.</li>\r\n<li>Discount of 10% if you order products worth more than $200.</li>\r\n<li>Suitable shopping cart solutions just for you.</li>\r\n<li>Products shipped on time to reach you promptly.</li>\r\n</ul>\r\n<br>\r\n<p>Do go through the above features and have a safe and online shopping.</p>', 1, 'Our Stores', 'Buy Inkjet Cartridges Online | Copier Toners | Label Tapes | Laptop Batteries & Chargers | Computer Accessories | Laser & Fax Toners | Houston, USA - Buy Toner Online', 'Buy Inkjet Cartridges Online - Buy Toner Online offers high quality printers with original & lowest prices, buy toner online stores will help you see our latest product & choose your best whatever brand you like.', 'Buy Inkjet Cartridges Online, Copier Toners, Label Tapes, Laptop Batteries, Chargers, Computer Accessories, Laser, Fax Toners, Houston, Buy Toner Online', '', 'Our Stores', '', '', '', '', '', 'coupon2.jpg', 'http://www.valoanshoustonusa.com/', 'coupon1.jpg', 'http://air-conditioning-installations.com/', 'coupon1lef.jpg', 'http://www.valoanshoustonusa.com/', 'coupon1righ.jpg', 'http://www.fhaloanshoustonusa.com/', 'coupon2righ.jpg', 'http://webdesignerhouston.us/'),
(4, 'aboutus.php', '<h3>\r\n	Buy Toner Online- The Fastest Growing Online Retailer.</h3>\r\n<p>\r\n	<img src="images/About-Us.jpg" class="MT10 MB10" />\r\nWe are a dedicated and trustworthy team of online retailers, who has now become one of the largest online retailers in the supply of office products like Laser and Fax toner, Copiers, and Printers. Since inception we have been striving very hard to reach the top level in this industry and we are very proud of our achievement. We never compromise on quality and customersâ€™ satisfaction is our primary concern.</p>\r\n<p>\r\n	Your choice of online retailer should be BUYTONERONLINE because we offer quality products at the most competitive rates. We display the product details and prices very clearly. Ordering, monitoring, and receiving any product becomes totally very easy. We are trustworthy and we see to it that you receive the product at the specified time. With us you are assured of a peaceful, reliable, and time bound online transactions. We offer 24/7 customer support. If you have any doubt about the products our trained customers would answer all the queries. We see to it that the products are shipped promptly so as to cause no delay. We see to it that you get all the required information about the products and services immediately. We offer secured transactions so that you donâ€™t get cheated on your money. Choose us and be assured of reliable services. With us online business becomes hassle free.</p>\r\n<p>\r\n	<strong>With your support we expect to reach greater heights</strong>. For further information please visit us or send an email to us at <a href="mailto:contact@butyoneronline.com">contact@butyoneronline.com.</a> You can even contact us.</p>\r\n', 1, 'About  Us', 'Buy Laser Toner Online | Copier Toners | POS & Printer Ribbons | Thermal Fax(TTR) | Fusers & Maint Kits | Laptop Batteries & Chargers | Houston, USA - Buy Toner Online', 'Buy Toner online offers laser & copier toner, pos & printer ribbons, thermal fax(TTR), fusers & maint kits, laptop batteries & chargers. We provide a wide range of high quality products & lowest prices online.', 'Buy Laser Toner Online, Copier Toners, POS, Printer Ribbons, Thermal Fax(TTR), Fusers & Maint Kits, Laptop Batteries, Chargers, Houston, USA, Buy Toner Online', '', 'About Us', '', '', '', '', '', 'coupon2.jpg', 'http://www.valoanshoustonusa.com/', 'coupon1.jpg', 'http://air-conditioning-installations.com/', 'coupon1lef.jpg', 'http://www.valoanshoustonusa.com/', 'coupon1righ.jpg', 'http://www.fhaloanshoustonusa.com/', 'coupon2righ.jpg', 'http://webdesignerhouston.us/'),
(5, 'contactus.php', '<img src="images/Contact-us.jpg" class="MT10 MB10" />\r\n<h3>Address</h3>\r\n<p>\r\n2825 Wilcrest dr, Suite 540\r\n<br/>\r\nHouston, Texas â€“ 77042\r\n<br/>\r\nContact: contact@butyoneronline.com \r\n</p>\r\n', 1, 'Contact  Us', 'Contact Us - Houston, USA - Buy Toner Online', 'Contact Buy toner online for more information regarding our products & brand. Please call us or register us at buytoneronline.com/register.php. We will respond you promptly.', 'Laser Toners, Fax Toners, Inkjet Cartridges, Copier Toners, Label Tapes | POS & Printer Ribbons | Thermal Fax(TTR), Fusers, Maint Kits, Laptop Batteries, Chargers, Contact Us, Houston, Buy Toner Online', '', 'Contact Us', '', '', '', '', '', 'coupon2.jpg', 'http://www.valoanshoustonusa.com/', 'coupon1.jpg', 'http://air-conditioning-installations.com/', 'coupon1lef.jpg', 'http://www.valoanshoustonusa.com/', 'coupon1righ.jpg', 'http://www.fhaloanshoustonusa.com/', 'coupon2righ.jpg', 'http://webdesignerhouston.us/'),
(12, 'guideline.html', '<b>GENERAL GUIDELINES TO ONLINE SHOPPING.</b>\r\n<ul>\r\n<li>Please check whether your website address is typed correctly. </li>\r\n<li> Donâ€™t use the popup window to update your account details. </li>\r\n<li>If you use a credit card, see to it that it is verified by VISA or MasterCard Secure transaction processes. </li>\r\n<li>Do not shop with unsecured sites. Donâ€™t shop with unknown and inconspicuous sites. </li>\r\n<li>Always choose sites that are popular. </li>\r\n<li>No bank or a website would ask for your bank details, id or password through emails. Beware of phishing mails. </li>\r\n<li>Use a credit than a debit card because it offers more security. </li>\r\n<li>Always do online shopping from home, from your own PC. Never go to the browsing centre to do online shopping. </li>\r\n<li>Donâ€™t do online transactions through easy ways like One click, Just a click, and Instant Pay. It may be easy but your banking information would be stored and if there is a breach somewhere, you are at a big risk. Always choose a proper channel. </li>\r\n<li>Take your time to shop securely. </li>\r\n</ul>\r\n<p>Take these precautionary measures and enjoy online shopping. </p>\r\n', 1, 'Guide Lines', 'Buying Guidelines | Online Stores Shopping - Buy Toner Online', 'Buying Guidelines. Some of the Online Store shopping guidelines from buytoneronline.com! Buying latest model toner & printer like  ink cartridges, laser & Fax toner, laptop batteries, chargers, Thermal Fax, Copier toner, products on the Internet can offer  a wide range of products.', 'Buying Guidelines, Online Stores Shopping, Buy Toner Online', '', '', '', '', '', 'coupon2.jpg', 'http://www.valoanshoustonusa.com/', '../upload_images/banner_images/coupon2.jpg', 'http://www.valoanshoustonusa.com/', '', '', '', '', '', '', '', ''),
(13, 'login.php', '', 1, 'Login', 'Buy Toner Online - Member Login', 'Welcome to buytoneronline.com Please log in to access our online Store.', 'Buy Toner Online, Login, Member Login', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 'register.php', '', 1, 'Register', 'Buy Toner Online | Register | Signup ', 'Welcome to buytoneronline.com, Signup is a leading online store.', 'Buy Toner Online, Register, Signup', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_type` int(11) NOT NULL DEFAULT '1',
  `meta_title` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `meta_description` text NOT NULL,
  `manage_stock` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `stock_availability` varchar(100) NOT NULL,
  `products_name` varchar(100) NOT NULL,
  `products_description` text NOT NULL,
  `products_quantity` int(11) NOT NULL DEFAULT '0',
  `products_url` varchar(300) NOT NULL,
  `products_model` varchar(32) DEFAULT NULL,
  `products_image` varchar(64) DEFAULT NULL,
  `products_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `actual_price` decimal(15,2) NOT NULL,
  `dealer_price` decimal(15,2) NOT NULL,
  `oem_price` decimal(15,2) NOT NULL,
  `visibility` varchar(100) NOT NULL,
  `tax_class` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `level3_price` decimal(15,2) NOT NULL,
  `products_virtual` tinyint(1) NOT NULL DEFAULT '0',
  `products_date_added` date NOT NULL DEFAULT '0001-01-01',
  `products_last_modified` datetime DEFAULT NULL,
  `products_date_available` datetime DEFAULT NULL,
  `products_weight` float NOT NULL DEFAULT '0',
  `products_status` tinyint(1) NOT NULL DEFAULT '0',
  `products_tax_class_id` int(11) NOT NULL DEFAULT '0',
  `manufacturers_id` int(11) DEFAULT NULL,
  `products_ordered` float NOT NULL DEFAULT '0',
  `products_quantity_order_min` float NOT NULL DEFAULT '1',
  `products_quantity_order_units` float NOT NULL DEFAULT '1',
  `products_priced_by_attribute` tinyint(1) NOT NULL DEFAULT '0',
  `product_is_free` tinyint(1) NOT NULL DEFAULT '0',
  `product_is_call` tinyint(1) NOT NULL DEFAULT '0',
  `products_quantity_mixed` tinyint(1) NOT NULL,
  `product_is_always_free_shipping` tinyint(1) NOT NULL DEFAULT '0',
  `products_qty_box_status` tinyint(1) NOT NULL,
  `products_quantity_order_max` float NOT NULL DEFAULT '0',
  `products_sort_order` int(11) NOT NULL DEFAULT '0',
  `products_discount_type` tinyint(1) NOT NULL DEFAULT '0',
  `products_discount_type_from` tinyint(1) NOT NULL DEFAULT '0',
  `products_price_sorter` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `master_categories_id` int(11) NOT NULL DEFAULT '0',
  `products_mixed_discount_quantity` tinyint(1) NOT NULL DEFAULT '1',
  `metatags_title_status` tinyint(1) NOT NULL DEFAULT '0',
  `metatags_products_name_status` tinyint(1) NOT NULL DEFAULT '0',
  `metatags_model_status` tinyint(1) NOT NULL DEFAULT '0',
  `metatags_price_status` tinyint(1) NOT NULL DEFAULT '0',
  `metatags_title_tagline_status` tinyint(1) NOT NULL DEFAULT '0',
  `feature_products` int(11) NOT NULL DEFAULT '0',
  `top_selling` int(11) NOT NULL DEFAULT '0',
  `most_popular_items` int(11) NOT NULL DEFAULT '0',
  `sku_no` varchar(500) NOT NULL,
  `mfg_part_no` varchar(500) NOT NULL,
  `type` varchar(500) NOT NULL,
  `oem_part_no` varchar(500) NOT NULL,
  `color` varchar(500) NOT NULL,
  `oem_compatibility` varchar(500) NOT NULL,
  `approx_yields` varchar(500) NOT NULL,
  `warranty` varchar(500) NOT NULL,
  `product_type` int(50) NOT NULL,
  `global_change` int(50) NOT NULL,
  `brandid` int(11) DEFAULT NULL,
  `brandname` varchar(100) DEFAULT NULL,
  `global_change_percentage` int(50) DEFAULT '0',
  `global_change_percentage_value` int(50) DEFAULT NULL,
  `product_ref_id` varchar(100) DEFAULT NULL,
  `also_fits` varchar(150) NOT NULL,
  `bat_type` varchar(150) NOT NULL,
  `products_viewed` int(5) DEFAULT '0',
  `machine_model_no` varchar(100) NOT NULL,
  `s_w_no` varchar(100) NOT NULL,
  `colors` varchar(100) NOT NULL,
  `pageyield` varchar(100) NOT NULL,
  `sugg_sell` varchar(100) NOT NULL,
  `types` varchar(100) NOT NULL,
  `product_family_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_url` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `brand_url` varchar(100) NOT NULL,
  `prod_type_id` int(11) NOT NULL,
  `prod_type_url` varchar(100) NOT NULL,
  `prod_family_id` int(11) NOT NULL,
  `product_family_url` varchar(100) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `create_date` datetime NOT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`products_id`),
  KEY `idx_products_date_added_zen` (`products_date_added`),
  KEY `idx_products_status_zen` (`products_status`),
  KEY `idx_products_date_available_zen` (`products_date_available`),
  KEY `idx_products_ordered_zen` (`products_ordered`),
  KEY `idx_products_model_zen` (`products_model`),
  KEY `idx_products_price_sorter_zen` (`products_price_sorter`),
  KEY `idx_master_categories_id_zen` (`master_categories_id`),
  KEY `idx_products_sort_order_zen` (`products_sort_order`),
  KEY `idx_manufacturers_id_zen` (`manufacturers_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `language_id`, `products_type`, `meta_title`, `meta_keywords`, `meta_description`, `manage_stock`, `quantity`, `stock_availability`, `products_name`, `products_description`, `products_quantity`, `products_url`, `products_model`, `products_image`, `products_price`, `actual_price`, `dealer_price`, `oem_price`, `visibility`, `tax_class`, `status`, `level3_price`, `products_virtual`, `products_date_added`, `products_last_modified`, `products_date_available`, `products_weight`, `products_status`, `products_tax_class_id`, `manufacturers_id`, `products_ordered`, `products_quantity_order_min`, `products_quantity_order_units`, `products_priced_by_attribute`, `product_is_free`, `product_is_call`, `products_quantity_mixed`, `product_is_always_free_shipping`, `products_qty_box_status`, `products_quantity_order_max`, `products_sort_order`, `products_discount_type`, `products_discount_type_from`, `products_price_sorter`, `master_categories_id`, `products_mixed_discount_quantity`, `metatags_title_status`, `metatags_products_name_status`, `metatags_model_status`, `metatags_price_status`, `metatags_title_tagline_status`, `feature_products`, `top_selling`, `most_popular_items`, `sku_no`, `mfg_part_no`, `type`, `oem_part_no`, `color`, `oem_compatibility`, `approx_yields`, `warranty`, `product_type`, `global_change`, `brandid`, `brandname`, `global_change_percentage`, `global_change_percentage_value`, `product_ref_id`, `also_fits`, `bat_type`, `products_viewed`, `machine_model_no`, `s_w_no`, `colors`, `pageyield`, `sugg_sell`, `types`, `product_family_id`, `cat_id`, `cat_url`, `brand_id`, `brand_url`, `prod_type_id`, `prod_type_url`, `prod_family_id`, `product_family_url`, `sort_order`, `create_date`, `modify_date`) VALUES
(1, 1, 1, '', '', '', '', 27, 'In Stock', 'Nutrabean Daily Multivitamin', '<p class=\\"\\\\&quot;\\\\\\\\&quot;\\\\\\\\\\\\\\\\&quot;p0\\\\\\\\\\\\\\\\&quot;\\\\\\\\&quot;\\\\&quot;\\">Once daily multivitamin that includes vitamins A-E, multi-mineral blend, fluid balance support complex, adrenal support complex, multi-enzyme blend, bioavailability complex</p>', 0, 'Get your 30 Day- Risk Free Trail', NULL, 'tablet_box_2.png', '24.99', '12.49', '0.00', '0.00', '', '', 'Enabled', '0.00', 0, '0001-01-01', NULL, NULL, 0, 1, 0, NULL, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0000', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'NutraBean-Daily-Multi-Vitamin', '', '', '', '', '', '', '', 0, 0, NULL, NULL, 0, NULL, NULL, '', '', 0, '', '', '', '', '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '2014-05-21 10:26:08', '2014-10-25 12:18:36'),
(2, 1, 1, '', '', '', '', 4, 'In Stock', 'Nutrabean Plus +', '<p>Take once daily with a multivitamin for additional support. See comparison between Nutrabean &amp; Nutrabean Plus+</p>', 0, 'Get your 60 Day- Risk Free Trail ', NULL, 'nutrabean_plus.png', '34.99', '17.49', '0.00', '0.00', '', '', 'Enabled', '0.00', 0, '0001-01-01', NULL, NULL, 0, 1, 0, NULL, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '0.0000', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 'Nutrabean-Plus', '', '', '', '', '', '', '', 0, 0, NULL, NULL, 0, NULL, NULL, '', '', 0, '', '', '', '', '', '', 0, 0, '', 0, '', 0, '', 0, '', 0, '2014-05-21 10:27:35', '2014-10-24 15:45:52');

-- --------------------------------------------------------

--
-- Table structure for table `products_description`
--

CREATE TABLE IF NOT EXISTS `products_description` (
  `products_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_name` varchar(64) NOT NULL DEFAULT '',
  `products_description` text,
  `products_url` varchar(255) DEFAULT NULL,
  `products_viewed` int(5) DEFAULT '0',
  PRIMARY KEY (`products_id`,`language_id`),
  KEY `idx_products_name_zen` (`products_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products_options_types`
--

CREATE TABLE IF NOT EXISTS `products_options_types` (
  `products_options_types_id` int(11) NOT NULL DEFAULT '0',
  `products_options_types_name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`products_options_types_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Track products_options_types';

-- --------------------------------------------------------

--
-- Table structure for table `products_options_values`
--

CREATE TABLE IF NOT EXISTS `products_options_values` (
  `products_options_values_id` int(11) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL DEFAULT '1',
  `products_options_values_name` varchar(64) NOT NULL DEFAULT '',
  `products_options_values_sort_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`products_options_values_id`,`language_id`),
  KEY `idx_products_options_values_name_zen` (`products_options_values_name`),
  KEY `idx_products_options_values_sort_order_zen` (`products_options_values_sort_order`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_family`
--

CREATE TABLE IF NOT EXISTS `product_family` (
  `product_family_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_type_id` int(11) NOT NULL,
  `product_family_name` varchar(100) NOT NULL,
  `product_family_order` varchar(11) NOT NULL,
  `product_family_description` text NOT NULL,
  `product_family_image` varchar(250) NOT NULL,
  `product_family_url` varchar(100) NOT NULL,
  `master_cat_id` int(11) NOT NULL,
  `master_cat_url` varchar(100) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `brand_url` varchar(100) NOT NULL,
  `prod_type_url` varchar(100) NOT NULL,
  PRIMARY KEY (`product_family_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=210 ;

--
-- Dumping data for table `product_family`
--

INSERT INTO `product_family` (`product_family_id`, `product_type_id`, `product_family_name`, `product_family_order`, `product_family_description`, `product_family_image`, `product_family_url`, `master_cat_id`, `master_cat_url`, `brand_id`, `brand_url`, `prod_type_url`) VALUES
(1, 0, 'HL Series', '1', 'HL Series', '', 'hl-series', 8, 'brother', 15, 'laser-and-fax-toners', ''),
(2, 0, 'MFC Series', '2', 'MFC Series', '', 'mfc-series', 8, 'brother', 15, 'laser-and-fax-toners', ''),
(3, 0, 'DCP Series', '3', 'DCP Series', '', 'dcp-series', 8, 'brother', 15, 'laser-and-fax-toners', ''),
(4, 0, 'Intellifax Series', '4', 'Intellifax Series', '', 'intellifax-series', 8, 'brother', 15, 'laser-and-fax-toners', ''),
(5, 0, 'Jumbo Series', '5', 'Jumbo Series', '', 'jumbo-series', 8, 'brother', 15, 'laser-and-fax-toners', ''),
(6, 0, 'Fax Series', '6', 'Fax Series', '', 'fax-series', 8, 'brother', 15, 'laser-and-fax-toners', ''),
(7, 0, 'FC Series', '7', 'FC Series', '', 'fc-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(8, 0, 'PC Series', '8', 'PC Series', '', 'pc-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(9, 0, 'Fax Series', '9', 'Fax Series', '', 'fax-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(10, 0, 'Laser Class Series', '10', 'Laser Class Series', '', 'laser-class-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(11, 0, 'Laser CFX Series', '11', 'Laser CFX Series', '', 'laser-cfx-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(12, 0, 'ImageClass Series', '12', 'ImageClass Series', '', 'imageclass-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(13, 0, 'MultiPass Series', '13', 'MultiPass Series', '', 'multipass-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(14, 0, 'CFX Series', '14', 'CFX Series', '', 'cfx-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(15, 0, 'i-Sensys Series', '15', 'i-Sensys Series', '', 'i-sensys-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(16, 0, 'Satera Series', '16', 'Satera Series', '', 'satera-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(17, 0, 'LaserBase Series', '17', 'LaserBase Series', '', 'laserbase-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(18, 0, 'Imagerunner Series', '18', 'Imagerunner Series', '', 'imagerunner-series', 1, 'canon', 2, 'laser-and-fax-toners', ''),
(22, 0, 'AcuLaser', '22', 'AcuLaser', '', 'aculaser', 11, 'epson', 19, 'laser-and-fax-toners', ''),
(31, 0, 'InfoPrint Series', '31', 'InfoPrint Series', '', 'infoprint-series', 14, 'ibm', 23, 'laser-and-fax-toners', ''),
(32, 0, 'InfoPrint Color Series', '32', 'InfoPrint Color Series', '', 'infoprint-color-series', 14, 'ibm', 23, 'laser-and-fax-toners', ''),
(33, 0, 'Network Series', '33', 'Network Series', '', 'network-series', 14, 'ibm', 23, 'laser-and-fax-toners', ''),
(34, 0, 'FS Series', '34', 'FS Series', '', 'fs-series', 3, 'kyocera-mita', 7, 'laser-and-fax-toners', ''),
(35, 0, 'KM Series', '35', 'KM Series', '', 'km-series', 3, 'kyocera-mita', 7, 'laser-and-fax-toners', ''),
(36, 0, 'C Series', '36', 'C Series', '', 'c-series', 15, 'lexmark', 24, 'laser-and-fax-toners', ''),
(37, 0, 'X Series', '37', 'X Series', '', 'x-series', 15, 'lexmark', 24, 'laser-and-fax-toners', ''),
(38, 0, 'E Series', '38', 'E Series', '', 'e-series', 15, 'lexmark', 24, 'laser-and-fax-toners', ''),
(39, 0, 'Optra Series', '39', 'Optra Series', '', 'optra-series', 15, 'lexmark', 24, 'laser-and-fax-toners', ''),
(40, 0, 'T Series', '40', 'T Series', '', 't-series', 15, 'lexmark', 24, 'laser-and-fax-toners', ''),
(41, 0, 'Black Toner Special Label Application', '41', 'Black Toner Special Label Application', '', 'black-toner-special-label-application', 15, 'lexmark', 24, 'laser-and-fax-toners', ''),
(42, 0, 'W Series', '42', 'W Series', '', 'w-series', 15, 'lexmark', 24, 'laser-and-fax-toners', ''),
(43, 0, 'Bizhub Series', '43', 'Bizhub Series', '', 'bizhub-series', 2, 'konica-minolta', 5, 'laser-and-fax-toners', ''),
(44, 0, 'MagiColor Series', '44', 'MagiColor Series', '', 'magicolor-series', 2, 'konica-minolta', 5, 'laser-and-fax-toners', ''),
(45, 0, 'PagePro Series', '45', 'PagePro Series', '', 'pagepro-series', 2, 'konica-minolta', 5, 'laser-and-fax-toners', ''),
(46, 0, 'C Series', '46', 'C Series', '', 'c-series', 16, 'oki-okidata', 26, 'laser-and-fax-toners', ''),
(47, 0, 'MC Series', '47', 'MC Series', '', 'mc-series', 16, 'oki-okidata', 26, 'laser-and-fax-toners', ''),
(48, 0, 'OkiPage Series', '48', 'OkiPage Series', '', 'okipage-series', 16, 'oki-okidata', 26, 'laser-and-fax-toners', ''),
(49, 0, 'OkiLaser Series', '49', 'OkiLaser Series', '', 'okilaser-series', 16, 'oki-okidata', 26, 'laser-and-fax-toners', ''),
(50, 0, 'B Series', '50', 'B Series', '', 'b-series', 16, 'oki-okidata', 26, 'laser-and-fax-toners', ''),
(51, 0, 'MB Series', '51', 'MB Series', '', 'mb-series', 16, 'oki-okidata', 26, 'laser-and-fax-toners', ''),
(52, 0, 'KX Series', '52', 'KX Series', '', 'kx-series', 4, 'panasonic', 9, 'laser-and-fax-toners', ''),
(53, 0, 'PanaFax UF Series ', '53', 'PanaFax UF Series ', '', 'panafax-uf-series-', 4, 'panasonic', 9, 'laser-and-fax-toners', ''),
(54, 0, 'PanaFax DF Series ', '54', 'PanaFax DF Series ', '', 'panafax-df-series-', 4, 'panasonic', 9, 'laser-and-fax-toners', ''),
(55, 0, 'PanaFax DX Series ', '55', 'PanaFax DX Series ', '', 'panafax-dx-series-', 4, 'panasonic', 9, 'laser-and-fax-toners', ''),
(56, 0, 'Aficio Series', '56', 'Aficio Series', '', 'aficio-series', 5, 'ricoh', 11, 'laser-and-fax-toners', ''),
(57, 0, 'AC Series', '57', 'AC Series', '', 'ac-series', 5, 'ricoh', 11, 'laser-and-fax-toners', ''),
(58, 0, 'AP Series', '58', 'AP Series', '', 'ap-series', 5, 'ricoh', 11, 'laser-and-fax-toners', ''),
(59, 0, 'Fax Series', '59', 'Fax Series', '', 'fax-series', 5, 'ricoh', 11, 'laser-and-fax-toners', ''),
(60, 0, 'Sp Series', '60', 'Sp Series', '', 'sp-series', 5, 'ricoh', 11, 'laser-and-fax-toners', ''),
(61, 0, 'Other Series', '61', 'Other Series', '', 'other-series', 5, 'ricoh', 11, 'laser-and-fax-toners', ''),
(62, 0, 'CLP Series', '62', 'CLP Series', '', 'clp-series', 17, 'samsung', 27, 'laser-and-fax-toners', ''),
(63, 0, 'CLX Series', '63', 'CLX Series', '', 'clx-series', 17, 'samsung', 27, 'laser-and-fax-toners', ''),
(64, 0, 'ML Printers series', '64', 'ML Printers series', '', 'ml-printers-series', 17, 'samsung', 27, 'laser-and-fax-toners', ''),
(65, 0, 'SCX Printers series', '65', 'SCX Printers series', '', 'scx-printers-series', 17, 'samsung', 27, 'laser-and-fax-toners', ''),
(66, 0, 'SF Printers series', '66', 'SF Printers series', '', 'sf-printers-series', 17, 'samsung', 27, 'laser-and-fax-toners', ''),
(67, 0, 'QL Series', '67', 'QL Series', '', 'ql-series', 17, 'samsung', 27, 'laser-and-fax-toners', ''),
(68, 0, 'MSYS Series', '68', 'MSYS Series', '', 'msys-series', 17, 'samsung', 27, 'laser-and-fax-toners', ''),
(69, 0, 'SF Series', '69', 'SF Series', '', 'sf-series', 17, 'samsung', 27, 'laser-and-fax-toners', ''),
(70, 0, 'AL Series', '70', 'AL Series', '', 'al-series', 18, 'sharp', 28, 'laser-and-fax-toners', ''),
(71, 0, 'AR Series', '71', 'AR Series', '', 'ar-series', 18, 'sharp', 28, 'laser-and-fax-toners', ''),
(72, 0, 'Workcentre Pro series', '72', 'Workcentre Pro series', '', 'workcentre-pro-series', 18, 'sharp', 28, 'laser-and-fax-toners', ''),
(73, 0, 'FO Series', '73', 'FO Series', '', 'fo-series', 18, 'sharp', 28, 'laser-and-fax-toners', ''),
(74, 0, 'DC Series', '74', 'DC Series', '', 'dc-series', 18, 'sharp', 28, 'laser-and-fax-toners', ''),
(75, 0, 'ColorQube Series', '75', 'ColorQube Series', '', 'colorqube-series', 7, 'xerox', 14, 'laser-and-fax-toners', ''),
(76, 0, 'Phaser Series', '76', 'Phaser Series', '', 'phaser-series', 7, 'xerox', 14, 'laser-and-fax-toners', ''),
(77, 0, 'WorkCentre Series', '77', 'WorkCentre Series', '', 'workcentre-series', 7, 'xerox', 14, 'laser-and-fax-toners', ''),
(78, 0, 'Other Xerox Printers', '78', 'Other Xerox Printers\r\n\r\n', '', 'Other-Xerox-Printers', 7, 'xerox', 14, '', 'laser-and-fax-toners'),
(79, 0, 'Xerox Laser Printers', '79', 'Xerox Laser Printers\r\n', '', 'Xerox-Laser-Printers', 7, 'xerox', 14, '', 'laser-and-fax-toners'),
(80, 0, 'Fax Series', '80', 'Fax Series', '', 'fax-series', 7, 'xerox', 14, 'laser-and-fax-toners', ''),
(81, 0, 'DocuPrint Series', '81', 'DocuPrint Series', '', 'docuprint-series', 7, 'xerox', 14, 'laser-and-fax-toners', ''),
(82, 0, 'CopyCentre Series', '82', 'CopyCentre Series', '', 'copycentre-series', 7, 'xerox', 14, 'laser-and-fax-toners', ''),
(83, 0, 'GP Series', '83', 'GP Series', '', 'gp-series', 1, 'canon', 1, 'copier-toner', ''),
(84, 0, 'imageRUNNER Series', '84', 'imageRUNNER Series', '', 'imagerunner-series', 1, 'canon', 1, 'copier-toner', ''),
(85, 0, 'NP Series', '85', 'NP Series', '', 'np-series', 1, 'canon', 1, 'copier-toner', ''),
(86, 0, 'C Series', '86', 'C Series', '', 'c-series', 1, 'canon', 1, 'copier-toner', ''),
(87, 0, 'Other Series', '87', 'Other Series', '', 'other-series', 2, 'konica-minolta', 4, 'copier-toner', ''),
(88, 0, 'Dialta Series', '88', 'Dialta Series', '', 'dialta-series', 2, 'konica-minolta', 4, 'copier-toner', ''),
(89, 0, 'BizHub Series', '89', 'BizHub Series', '', 'bizhub-series', 2, 'konica-minolta', 4, 'copier-toner', ''),
(90, 0, 'EP Series', '90', 'EP Series', '', 'ep-series', 2, 'konica-minolta', 4, 'copier-toner', ''),
(91, 0, 'AI Series', '91', 'AI Series', '', 'ai-series', 3, 'kyocera-mita', 6, 'copier-toner', ''),
(92, 0, 'DC Series', '92', 'DC Series', '', 'dc-series', 3, 'kyocera-mita', 6, 'copier-toner', ''),
(93, 0, 'FS Series', '93', 'FS Series', '', 'fs-series', 3, 'kyocera-mita', 6, 'copier-toner', ''),
(94, 0, 'KM Series', '94', 'KM Series', '', 'km-series', 3, 'kyocera-mita', 6, 'copier-toner', ''),
(95, 0, 'CS Series', '95', 'CS Series', '', 'cs-series', 3, 'kyocera-mita', 6, 'copier-toner', ''),
(96, 0, 'Workio', '96', 'Workio', '', 'workio', 4, 'panasonic', 8, 'copier-toner', ''),
(97, 0, 'Aficio Series', '97', 'Aficio Series', '', 'aficio-series', 5, 'ricoh', 10, 'copier-toner', ''),
(98, 0, 'Gestetner Series', '98', 'Gestetner Series', '', 'gestetner-series', 5, 'ricoh', 10, 'copier-toner', ''),
(99, 0, 'Lanier Series', '99', 'Lanier Series', '', 'lanier-series', 5, 'ricoh', 10, 'copier-toner', ''),
(100, 0, 'Savin Series', '100', 'Savin Series', '', 'savin-series', 5, 'ricoh', 10, 'copier-toner', ''),
(101, 0, 'FT Series', '101', 'FT Series', '', 'ft-series', 5, 'ricoh', 10, 'copier-toner', ''),
(102, 0, 'AL Series', '102', 'AL Series', '', 'al-series', 5, 'ricoh', 10, 'copier-toner', ''),
(103, 0, 'AR Series', '103', 'AR Series', '', 'ar-series', 5, 'ricoh', 10, 'copier-toner', ''),
(104, 0, 'MX Series', '104', 'MX Series', '', 'mx-series', 5, 'ricoh', 10, 'copier-toner', ''),
(105, 0, 'SF Series', '105', 'SF Series', '', 'sf-series', 5, 'ricoh', 10, 'copier-toner', ''),
(106, 0, 'BD Series', '106', 'BD Series', '', 'bd-series', 6, 'toshiba', 12, 'copier-toner', ''),
(107, 0, 'DP Series', '107', 'DP Series', '', 'dp-series', 6, 'toshiba', 12, 'copier-toner', ''),
(108, 0, 'E-Studio Series', '108', 'E-Studio Series', '', 'e-studio-series', 6, 'toshiba', 12, 'copier-toner', ''),
(109, 0, 'Black and White Series', '109', 'Black and White Series', '', 'black-and-white-series', 7, 'xerox', 13, 'copier-toner', ''),
(110, 0, 'Vivace Series', '110', 'Vivace Series', '', 'vivace-series', 7, 'xerox', 13, 'copier-toner', ''),
(111, 0, 'XD Series', '111', 'XD Series', '', 'xd-series', 7, 'xerox', 13, 'copier-toner', ''),
(112, 0, 'XL Series', '112', 'XL Series', '', 'xl-series', 7, 'xerox', 13, 'copier-toner', ''),
(113, 0, 'Multi-Function Center', '113', 'Multi-Function Center', '', 'multi-function-center', 8, 'brother', 16, 'inkjet-cartridges', ''),
(114, 0, 'Color Inkjet Fax & Copier', '114', 'Color Inkjet Fax & Copier', '', 'color-inkjet-fax-copier', 8, 'brother', 16, 'inkjet-cartridges', ''),
(115, 0, 'Inkjet Plain Paper Fax, Copier & Phone', '115', 'Inkjet Plain Paper Fax, Copier & Phone', '', 'inkjet-plain-paper-fax-copier-phone', 8, 'brother', 16, '', 'inkjet-cartridges'),
(116, 0, 'Color Inkjet Flatbed Fax', '116', 'Color Inkjet Flatbed Fax', '', 'color-inkjet-flatbed-fax', 8, 'brother', 16, 'inkjet-cartridges', ''),
(117, 0, 'Inkjet Multi-Function Center', '117', 'Inkjet Multi-Function Center', '', 'inkjet-multi-function-center', 8, 'brother', 16, 'inkjet-cartridges', ''),
(118, 0, 'Color Inkjet All-in-One', '118', 'Color Inkjet All-in-One', '', 'color-inkjet-all-in-one', 8, 'brother', 16, 'inkjet-cartridges', ''),
(119, 0, 'Photo Color All-in-One', '119', 'Photo Color All-in-One', '', 'photo-color-all-in-one', 8, 'brother', 16, 'inkjet-cartridges', ''),
(120, 0, 'Inkjet All-in-One Printer', '120', 'Inkjet All-in-One Printer', '', 'inkjet-all-in-one-printer', 8, 'brother', 16, 'inkjet-cartridges', ''),
(121, 0, 'Compact Inkjet All-in-One', '121', 'Compact Inkjet All-in-One', '', 'compact-inkjet-all-in-one', 8, 'brother', 16, 'inkjet-cartridges', ''),
(122, 0, 'Printers and Multifunction-BJ Series', '122', 'Printers and Multifunction-BJ Series', '', 'printers-and-multifunction-bj-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(123, 0, 'Printer 3', '123', 'Printer 3', '', 'printer-3', 1, 'canon', 3, 'inkjet-cartridges', ''),
(124, 0, 'Printers and Multifunction-BJC Series', '124', 'Printers and Multifunction-BJC Series', '', 'printers-and-multifunction-bjc-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(125, 0, 'Printers and Multifunction-PIXMA iP Series', '125', 'Printers and Multifunction-PIXMA iP Series', '', 'printers-and-multifunction-pixma-ip-series', 1, 'canon', 3, '', 'inkjet-cartridges'),
(126, 0, 'Printers and Multifunction-PIXMA MP Series', '126', 'Printers and Multifunction-PIXMA MP Series', '', 'printers-and-multifunction-pixma-mp-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(127, 0, 'Printers and Multifunction-S Series', '127', 'Printers and Multifunction-S Series', '', 'printers-and-multifunction-s-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(128, 0, 'Printers and Multifunction-I Series', '128', 'Printers and Multifunction-I Series', '', 'printers-and-multifunction-i-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(129, 0, 'Printers and Multifunction-Professional Photo Inkjet Printers', '129', 'Printers and Multifunction-Professional Photo Inkjet Printers', '', 'printers-and-multifunction-professional-photo-inkjet-printers', 1, 'canon', 3, 'inkjet-cartridges', ''),
(130, 0, 'Printers and Multifunction-PIXMA MX Series', '130', 'Printers and Multifunction-PIXMA MX Series', '', 'printers-and-multifunction-pixma-mx-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(131, 0, 'Printers and Multifunction-Corporate & Graphic Arts Printers', '131', 'Printers and Multifunction-Corporate & Graphic Arts Printers', '', 'printers-and-multifunction-corporate-graphic-arts-printers', 1, 'canon', 3, 'inkjet-cartridges', ''),
(132, 0, 'Printers and Multifunction-PIXMA Series', '132', 'Printers and Multifunction-PIXMA Series', '', 'printers-and-multifunction-pixma-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(133, 0, 'Printers and Multifunction-Photo Inkjet Printers', '133', 'Printers and Multifunction-Photo Inkjet Printers', '', 'printers-and-multifunction-photo-inkjet-printers', 1, 'canon', 3, 'inkjet-cartridges', ''),
(134, 0, 'Printers and Multifunction-PIXMA Compact Photo Series', '134', 'Printers and Multifunction-PIXMA Compact Photo Series', '', 'printers-and-multifunction-pixma-compact-photo-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(135, 0, 'imagePROGRAF Series', '135', 'imagePROGRAF Series', '', 'imageprograf-series', 1, 'canon', 3, 'inkjet-cartridges', ''),
(136, 0, 'Graphic Arts Printers', '136', 'Graphic Arts Printers', '', 'graphic-arts-printers', 1, 'canon', 3, 'inkjet-cartridges', ''),
(137, 0, 'Large Format Inkjet Printers', '137', 'Large Format Inkjet Printers', '', 'large-format-inkjet-printers', 1, 'canon', 3, '', 'inkjet-cartridges'),
(138, 0, 'All In One Photo Printer', '138', 'All In One Photo Printer', '', 'all-in-one-photo-printer', 19, 'dell', 29, 'inkjet-cartridges', ''),
(139, 0, 'Photo all-in-one', '139', 'Photo all-in-one', '', 'photo-all-in-one', 19, 'dell', 29, 'inkjet-cartridges', ''),
(140, 0, 'All-In-One Inkjet Printer', '140', 'All-In-One Inkjet Printer', '', 'all-in-one-inkjet-printer', 19, 'dell', 29, 'inkjet-cartridges', ''),
(141, 0, 'Color Printer', '141', 'Color Printer', '', 'color-printer', 19, 'dell', 29, 'inkjet-cartridges', ''),
(142, 0, 'All-in-One Wireless Inkjet Printer', '142', 'All-in-One Wireless Inkjet Printer', '', 'all-in-one-wireless-inkjet-printer', 19, 'dell', 29, 'inkjet-cartridges', ''),
(143, 0, 'All-in-One', '143', 'All-in-One', '', 'all-in-one', 19, 'dell', 29, 'inkjet-cartridges', ''),
(144, 0, 'Wireless Laser Printer', '144', 'Wireless Laser Printer', '', 'wireless-laser-printer', 19, 'dell', 29, 'inkjet-cartridges', ''),
(145, 0, 'Photo All-In-One Printer', '145', 'Photo All-In-One Printer', '', 'photo-all-in-one-printer', 19, 'dell', 29, 'inkjet-cartridges', ''),
(146, 0, 'All In One Wireless Inkjet Printer', '146', 'All In One Wireless Inkjet Printer', '', 'all-in-one-wireless-inkjet-printer', 19, 'dell', 29, 'inkjet-cartridges', ''),
(147, 0, 'Standard Inkjet Printer', '147', 'Standard Inkjet Printer', '', 'standard-inkjet-printer', 11, 'epson', 20, 'inkjet-cartridges', ''),
(148, 0, 'Digital Photo Inkjet Printer', '148', 'Digital Photo Inkjet Printer', '', 'digital-photo-inkjet-printer', 11, 'epson', 20, 'inkjet-cartridges', ''),
(149, 0, 'All-In-One Inkjet Printer', '149', 'All-In-One Inkjet Printer', '', 'all-in-one-inkjet-printer', 11, 'epson', 20, 'inkjet-cartridges', ''),
(150, 0, 'Color Ink-jet printer', '150', 'Color Ink-jet printer', '', 'color-ink-jet-printer', 11, 'epson', 20, 'inkjet-cartridges', ''),
(151, 0, 'compatible Printer', '151', 'compatible Printer', '', 'compatible-printer', 11, 'epson', 20, 'inkjet-cartridges', ''),
(152, 0, 'Small-in-One Inkjet Printer', '152', 'Small-in-One Inkjet Printer', '', 'small-in-one-inkjet-printer', 11, 'epson', 20, 'inkjet-cartridges', ''),
(153, 0, 'Small-in-One - All-in-One Printer', '153', 'Small-in-One - All-in-One Printer', '', 'small-in-one--all-in-one-printer', 11, 'epson', 20, 'inkjet-cartridges', ''),
(154, 0, 'Wireless All-in-One Color Inkjet Printer, Copier, Scanner', '154', 'Wireless All-in-One Color Inkjet Printer, Copier, Scanner', '', 'wireless-all-in-one-color-inkjet-printer-copier-scanner', 11, 'epson', 20, '', 'inkjet-cartridges'),
(155, 0, 'Color Inkjet Wireless All-in-One Printer with Fax', '155', 'Color Inkjet Wireless All-in-One Printer with Fax', '', 'color-inkjet-wireless-all-in-one-printer-with-fax', 11, 'epson', 20, 'inkjet-cartridges', ''),
(156, 0, 'Color Ink Jet All-in-One', '156', 'Color Ink Jet All-in-One', '', 'color-ink-jet-all-in-one', 11, 'epson', 20, 'inkjet-cartridges', ''),
(157, 0, 'Wireless All-in-One Color Inkjet Printer, Copier, Scanner, Smartphone-Compatible', '157', 'Wireless All-in-One Color Inkjet Printer, Copier, Scanner, Smartphone-Compatible', '', 'wireless-all-in-one-color-inkjet-printer-copier-scanner-smartphone-compatible', 11, 'epson', 20, '', 'inkjet-cartridges'),
(158, 0, 'Wireless All-in-One Color Inkjet Printer, Copier, Scanner, Fax', '158', 'Wireless All-in-One Color Inkjet Printer, Copier, Scanner, Fax', '', 'wireless-all-in-one-color-inkjet-printer-copier-scanner-fax', 11, 'epson', 20, '', 'inkjet-cartridges'),
(159, 0, 'Large Format Inkjet Printer', '159', 'Large Format Inkjet Printer', '', 'large-format-inkjet-printer', 11, 'epson', 20, 'inkjet-cartridges', ''),
(160, 0, 'DeskJet Series ', '160', 'DeskJet Series ', '', 'deskjet-series', 20, 'hp', 30, 'inkjet-cartridges', ''),
(161, 0, 'Fax Series', '161', 'Fax Series', '', 'fax-series', 20, 'hp', 30, 'inkjet-cartridges', ''),
(162, 0, 'OfficeJet Series', '162', 'OfficeJet Series', '', 'officejet-series', 20, 'hp', 30, 'inkjet-cartridges', ''),
(163, 0, 'PhotoSmart Series', '163', 'PhotoSmart Series', '', 'photosmart-series', 20, 'hp', 30, 'inkjet-cartridges', ''),
(164, 0, 'QuietJet Series', '164', 'QuietJet Series', '', 'quietjet-series', 20, 'hp', 30, 'inkjet-cartridges', ''),
(165, 0, 'ThinkJet Series', '165', 'ThinkJet Series', '', 'thinkjet-series', 20, 'hp', 30, 'inkjet-cartridges', ''),
(166, 0, 'OfficeJet Pro Series', '166', 'OfficeJet Pro Series', '', 'officejet-pro-series', 20, 'hp', 30, 'inkjet-cartridges', ''),
(167, 0, 'Digital Copier Printer', '167', 'Digital Copier Printer', '', 'digital-copier-printer', 20, 'hp', 30, 'inkjet-cartridges', ''),
(168, 0, 'Compatible Remanufactured Black', '168', 'Compatible Remanufactured Black', '', 'compatible-remanufactured-black', 20, 'hp', 30, 'inkjet-cartridges', ''),
(169, 0, 'Pitney Bowes', '169', 'Pitney Bowes', '', 'pitney-bowes', 20, 'hp', 30, 'inkjet-cartridges', ''),
(170, 0, 'DesignJet Series', '170', 'DesignJet Series', '', 'designjet-series', 20, 'hp', 30, 'inkjet-cartridges', ''),
(171, 0, 'All-in-One printer ', '171', 'All-in-One printer ', '', 'all-in-one-printer-', 21, 'kodak', 31, 'inkjet-cartridges', ''),
(172, 0, 'Wireless Color Printer', '172', 'Wireless Color Printer', '', 'wireless-color-printer', 21, 'kodak', 31, 'inkjet-cartridges', ''),
(173, 0, 'Wireless Multi-function Inkjet Printer', '173', 'Wireless Multi-function Inkjet Printer', '', 'wireless-multi-function-inkjet-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(174, 0, 'Wireless N Multifunction Inkjet Printer', '174', 'Wireless N Multifunction Inkjet Printer', '', 'wireless-n-multifunction-inkjet-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(175, 0, 'Small Office Wireless Multifunction Inkjet Printer', '175', 'Small Office Wireless Multifunction Inkjet Printer', '', 'small-office-wireless-multifunction-inkjet-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(176, 0, 'All-in-One Printer', '176', 'All-in-One Printer', '', 'all-in-one-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(177, 0, 'All-In-One Inkjet Printer', '177', 'All-In-One Inkjet Printer', '', 'all-in-one-inkjet-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(178, 0, 'Multifunction Machines', '178', 'Multifunction Machines', '', 'multifunction-machines', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(179, 0, 'Inkjet Printer', '179', 'Inkjet Printer', '', 'inkjet-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(180, 0, 'Z Series', '180', 'Z Series', '', 'z-series', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(181, 0, 'Wireless All-In-One Dual Cartridge Inkjet Printer', '181', 'Wireless All-In-One Dual Cartridge Inkjet Printer', '', 'wireless-all-in-one-dual-cartridge-inkjet-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(182, 0, 'Wireless All-In-One Inkjet Printer', '182', 'Wireless All-In-One Inkjet Printer', '', 'wireless-all-in-one-inkjet-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(183, 0, 'All-in-One', '183', 'All-in-One', '', 'all-in-one', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(184, 0, 'Color Inkjet Printer', '184', 'Color Inkjet Printer', '', 'color-inkjet-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(185, 0, 'Multifunction Printer', '185', 'Multifunction Printer', '', 'multifunction-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(186, 0, 'Wireless Color Printer', '186', 'Wireless Color Printer', '', 'wireless-color-printer', 15, 'lexmark', 25, 'inkjet-cartridges', ''),
(187, 0, 'Digital Postage Meter ', '187', 'Digital Postage Meter ', '', 'digital-postage-meter', 22, 'neopost-hasler', 32, 'inkjet-cartridges', ''),
(188, 0, 'Mailing Solutions', '188', 'Mailing Solutions', '', 'mailing-solutions', 22, 'neopost-hasler', 32, 'inkjet-cartridges', ''),
(189, 0, 'Digital Franking Machines ', '189', 'Digital Franking Machines ', '', 'digital-franking-machines', 22, 'neopost-hasler', 32, 'inkjet-cartridges', ''),
(190, 0, 'High-End Mailing System', '190', 'High-End Mailing System', '', 'high-end-mailing-system', 22, 'neopost-hasler', 32, 'inkjet-cartridges', ''),
(191, 0, 'Postage Meters and Mailing Machines ', '191', 'Postage Meters and Mailing Machines ', '', 'postage-meters-and-mailing-machines', 23, 'pitney-bowes', 33, 'inkjet-cartridges', ''),
(192, 0, 'Inkjet Printers', '192', 'Inkjet Printers', '', 'inkjet-printers', 23, 'pitney-bowes', 33, 'inkjet-cartridges', ''),
(193, 0, 'Secap Series', '193', 'Secap Series', '', 'secap-series', 23, 'pitney-bowes', 33, 'inkjet-cartridges', ''),
(194, 0, 'Personal Post Meters', '194', 'Personal Post Meters', '', 'personal-post-meters', 23, 'pitney-bowes', 33, 'inkjet-cartridges', ''),
(195, 0, 'Postage Meter', '195', 'Postage Meter', '', 'postage-meter', 23, 'pitney-bowes', 33, 'inkjet-cartridges', ''),
(196, 0, 'Versatile Black Ink', '196', 'Versatile Black Ink', '', 'versatile-black-ink', 23, 'pitney-bowes', 33, 'inkjet-cartridges', ''),
(197, 0, 'Fast Drying Black', '197', 'Fast Drying Black', '', 'fast-drying-black', 23, 'pitney-bowes', 33, 'inkjet-cartridges', ''),
(198, 0, 'Picture Paper', '198', 'Picture Paper', '', 'picture-paper', 24, 'universal-photo-paper-refill-kits', 34, 'inkjet-cartridges', ''),
(199, 4, 'Force Series', '5', 'Force Series\r\n', '', 'Force-Series', 2, 'konica-minolta', 4, 'copier-toner', ''),
(200, 35, 'Color Laser series', '1', 'Color Laser series\r\n', '', 'color-laser-series', 19, 'dell', 35, 'laser-and-fax-toners', ''),
(201, 35, 'Laser series', '2', 'Laser series\r\n', '', 'laser-series', 19, 'dell', 35, 'laser-and-fax-toners', ''),
(202, 35, 'Multi Function series', '3', 'Multi Function series\r\n', '', 'multi-function-series', 19, 'dell', 35, 'laser-and-fax-toners', ''),
(203, 36, 'Color LaserJet Enterprise Series', '1', 'Color LaserJet Enterprise Series\r\n', '', 'color-laserjet-enterprise-series', 20, 'hp', 36, 'laser-and-fax-toners', ''),
(204, 36, 'Color LaserJet Pro Series', '2', 'Color LaserJet Pro Series\r\n', '', 'color-laserjet-pro-series', 20, 'hp', 36, 'laser-and-fax-toners', ''),
(205, 36, 'Color LaserJet Professional Series', '3', 'Color LaserJet Professional Series\r\n', '', 'color-laserjet-professional-series', 20, 'hp', 36, 'laser-and-fax-toners', ''),
(206, 36, 'Color LaserJet Series', '4', 'Color LaserJet Series\r\n', '', 'color-laserjet-series', 20, 'hp', 36, 'laser-and-fax-toners', ''),
(207, 36, 'HP LaserJet Pro Color Series', '5', 'HP LaserJet Pro Color Series\r\n', '', 'hp-laserjet-pro-color-series', 20, 'hp', 36, 'laser-and-fax-toners', 'laser-and-fax-toners'),
(208, 36, 'LaserJet Enterprise series', '6', 'LaserJet Enterprise series\r\n', '', 'laserjet-enterprise-series', 20, 'hp', 36, 'laser-and-fax-toners', 'laser-and-fax-toners'),
(209, 36, 'LaserJet Series', '7', 'LaserJet Series\r\n', '', 'laserjet-series', 20, 'hp', 36, 'laser-and-fax-toners', 'laser-and-fax-toners');

-- --------------------------------------------------------

--
-- Table structure for table `product_new`
--

CREATE TABLE IF NOT EXISTS `product_new` (
  `Productcode` varchar(50) NOT NULL,
  `Description` varchar(150) NOT NULL,
  `Description2` varchar(150) NOT NULL,
  `ProdType` varchar(100) NOT NULL,
  `Weight` double(10,2) NOT NULL,
  `NormalDealerCost` double(10,2) NOT NULL,
  `Stock` int(10) NOT NULL,
  `DealerLevelCost` double(10,2) NOT NULL,
  `AlsoFits` varchar(200) NOT NULL,
  `OEMNumbers` varchar(200) NOT NULL,
  `BatTypePageYields` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_percentage`
--

CREATE TABLE IF NOT EXISTS `product_percentage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `percentage` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_german2_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product_percentage`
--

INSERT INTO `product_percentage` (`id`, `percentage`, `created_date`) VALUES
(1, 0, '2012-05-09 12:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE IF NOT EXISTS `product_tbl` (
  `productcode` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Description2` varchar(100) NOT NULL,
  `ProdType` varchar(100) NOT NULL,
  `Weight` int(11) NOT NULL,
  `NormalDealerCost` int(11) NOT NULL,
  `Stock` int(11) NOT NULL,
  `DealerLevelCost` int(11) NOT NULL,
  `AlsoFits` varchar(100) NOT NULL,
  `OEMNumbers` varchar(100) NOT NULL,
  `BatTypePageYields` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_type_values`
--

CREATE TABLE IF NOT EXISTS `product_type_values` (
  `product_type_id` int(50) NOT NULL AUTO_INCREMENT,
  `product_type_name` varchar(100) NOT NULL,
  `produt_type_value` int(50) NOT NULL,
  PRIMARY KEY (`product_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `promo_quote`
--

CREATE TABLE IF NOT EXISTS `promo_quote` (
  `promo_quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `promo_quote_name` varchar(100) NOT NULL,
  `promo_quote_desc` text NOT NULL,
  `promo_quote_status` varchar(100) NOT NULL,
  `promo_quote_groups` varchar(100) NOT NULL,
  `promo_coupon_code` varchar(100) NOT NULL,
  `promo_quote_usescoupon` varchar(100) NOT NULL,
  `promo_quote_percustomer` varchar(100) NOT NULL,
  `promo_quote_from_date` date NOT NULL,
  `promo_quote_to_date` date NOT NULL,
  `promo_quote_priority` varchar(100) NOT NULL,
  `promo_quote_rssfeed` varchar(100) NOT NULL,
  `promo_quote_apply` varchar(100) NOT NULL,
  `promo_quote_discount_amount` decimal(10,2) NOT NULL,
  `promo_quote_maximum_amount` decimal(10,2) NOT NULL,
  `promo_quote_discount_qty` varchar(100) NOT NULL,
  `promo_quote_apply_shipping` varchar(100) NOT NULL,
  `promo_quote_free_shipping` varchar(100) NOT NULL,
  `promo_quote_processing` varchar(100) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`promo_quote_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `promo_quote`
--

INSERT INTO `promo_quote` (`promo_quote_id`, `promo_quote_name`, `promo_quote_desc`, `promo_quote_status`, `promo_quote_groups`, `promo_coupon_code`, `promo_quote_usescoupon`, `promo_quote_percustomer`, `promo_quote_from_date`, `promo_quote_to_date`, `promo_quote_priority`, `promo_quote_rssfeed`, `promo_quote_apply`, `promo_quote_discount_amount`, `promo_quote_maximum_amount`, `promo_quote_discount_qty`, `promo_quote_apply_shipping`, `promo_quote_free_shipping`, `promo_quote_processing`, `create_date`) VALUES
(3, 'test', '<p>test</p>', 'Active', 'General', 'test123', '2', '2', '2014-06-01', '2014-11-30', '', 'Yes', 'Percent of product price discount', '6.00', '6.00', '', '', '', '', '2014-09-19 12:43:11'),
(8, 'Pongal Offer', '<p>Pongal Offer</p>', 'Active', 'General', 'PG94857', '6', '1', '2014-06-01', '2014-08-30', '', 'Yes', 'Percent of product price discount', '4.00', '3.00', '', '', '', '', '2014-08-06 08:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `rec_footer`
--

CREATE TABLE IF NOT EXISTS `rec_footer` (
  `inventory_footer_id` int(8) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(8) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `quanity` varchar(10) NOT NULL,
  `purchase_price` varchar(10) NOT NULL,
  `type` varchar(5) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`inventory_footer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=14 ;

--
-- Dumping data for table `rec_footer`
--

INSERT INTO `rec_footer` (`inventory_footer_id`, `receipt_id`, `prod_id`, `uom`, `quanity`, `purchase_price`, `type`, `updated_by`, `created_date`) VALUES
(6, 1, 28, '333', '333', '333', '', 1, '2012-09-22 05:19:59'),
(5, 1, 12, '222', '222', '222', '', 1, '2012-09-22 05:19:59'),
(4, 1, 19, '111', '111', '111', '', 1, '2012-09-22 05:19:59'),
(7, 1, 55, '444', '444', '444', '', 1, '2012-09-22 05:19:59'),
(11, 2, 16, '222', '222', '222', 'R', 1, '2012-09-22 05:30:02'),
(10, 2, 32, '111', '111', '111', 'R', 1, '2012-09-22 05:30:02'),
(13, 3, 19, '7', '7', '7', '', 1, '2012-09-25 00:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `rec_header`
--

CREATE TABLE IF NOT EXISTS `rec_header` (
  `receipt_id` int(10) NOT NULL AUTO_INCREMENT,
  `vendor_id` varchar(10) NOT NULL,
  `inv_no` varchar(10) NOT NULL,
  `inv_date` date NOT NULL,
  `receipt_date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`receipt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rec_header`
--

INSERT INTO `rec_header` (`receipt_id`, `vendor_id`, `inv_no`, `inv_date`, `receipt_date`, `type`, `updated_by`, `created_date`) VALUES
(1, '1', '1233123', '2012-09-01', '2012-09-29', '', 1, '2012-09-22 05:19:59'),
(2, '20', '768876', '2012-09-04', '2012-09-27', 'R', 1, '2012-09-22 05:30:02'),
(3, '4', '55555', '2012-09-24', '2012-09-24', '', 1, '2012-09-25 00:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `request_quote`
--

CREATE TABLE IF NOT EXISTS `request_quote` (
  `quote_id` int(8) NOT NULL AUTO_INCREMENT,
  `quote_name` varchar(40) NOT NULL,
  `quote_lastname` varchar(25) NOT NULL,
  `quote_industry` varchar(60) NOT NULL,
  `quote_company` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `quote_phone` varchar(20) NOT NULL,
  `quote_fax` varchar(25) NOT NULL,
  `quote_email` varchar(50) NOT NULL,
  `quote_address` text NOT NULL,
  `quote_city` varchar(30) NOT NULL,
  `quote_state` varchar(30) NOT NULL,
  `quote_zipcode` int(10) NOT NULL,
  `quote_country` varchar(25) NOT NULL,
  `quote_qustcomments` text NOT NULL,
  `cust_type` int(5) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`quote_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=867 ;

--
-- Dumping data for table `request_quote`
--

INSERT INTO `request_quote` (`quote_id`, `quote_name`, `quote_lastname`, `quote_industry`, `quote_company`, `file_name`, `quote_phone`, `quote_fax`, `quote_email`, `quote_address`, `quote_city`, `quote_state`, `quote_zipcode`, `quote_country`, `quote_qustcomments`, `cust_type`, `date_time`) VALUES
(833, 'dfgdfg', '', '', '', 'aboutus.html', '345-345-3453', '', 'dfgdfg@fdgdfg.com', '', '', '', 0, '', 'sdfsdfsdfsdf', 0, '2014-02-18 09:46:02'),
(834, 'Bryant Holt', '', '', '', 'web-applications/web-design-houston.html', '832-253-6559', '', 'Bholt.houston@gmail.com', '', '', '', 0, '', 'Hello, my name is Bryant and I&#039;m interested in your services, to build a website for me and perhaps additional services as well.', 0, '2014-02-23 09:15:54'),
(835, 'Masood Qazi', '', '', '', 'solutions/microsoft-sharepoint-development-company', '832-859-4142', '', 'mqazi820@gmail.com', '', '', '', 0, '', 'Pls call me at your earliest', 0, '2014-02-25 14:48:39'),
(836, 'Kristi Curbow ', '', '', '', 'cms/wordpress-website-design-development-houston.h', '832-579-4294', '', 'Aninsomniacsdreams@gmail.com', '', '', '', 0, '', 'I would like a quote for adjustments to my wordpress site, aninsomniacsdreams.com and I already have the domain and hosting, but would also like a app created. ', 0, '2014-03-12 21:17:59'),
(837, 'Joe Mastriano', '', '', '', 'Joe Mastriano', '773-774-4467', '', 'support@taxproblem.rg', '', '', '', 0, '', 'www.taxproblem.org  My clients do not fear IRS audits, or any collection action on their bank account or paycheck. As a CPA with over 30 yrs and thousands of IRS tax cases, I can show you how to protect yourself better than any accountant or attorney I&#039;ve ever met. The IRS follows their own rules not found in tax guides or on their website.\r\n I know what these unwritten rules are and how to use them to your advantage. All legitamate, and approved. A+ BBB rated, excellent reputation. Fox news radio tax expert. Free download on how to represent yourself before the IRS. Must visit www.taxproblem.org and see why you have wasted time and money not using our knowledge and experience to your advantage!  ', 0, '2014-03-15 22:20:59'),
(838, 'Jeffrey Smith', '', '', '', 'it-consulting/visual-foxpro-consulting-houston.htm', '608-873-6631', '', 'jdsmith@nauga.com', '', '', '', 0, '', 'We are in need of doing a FoxPro to SQL conversion, and creating some reports and outputs from the SQL database. We are envisioning using SQL Server Reporting Services for the reports and outputs. The data base is very small and has only 5 or 6 small tables. Total master records about 2500. Please advise your thoughts on approach, effort, and billing rates.', 0, '2014-03-22 13:04:53'),
(839, 'Adnan Baqui', '', '', '', 'it-services/iphone-game-development-houston.html', '713-306-4383', '', 'AdnanBaqui17@yahoo.com', '', '', '', 0, '', 'In need of a developer for an iOS Action game', 0, '2014-04-06 10:22:40'),
(840, 'Adnan Baqui', '', '', '', 'it-services/iphone-game-development-houston.html', '713-306-4383', '', 'AdnanBaqui17@yahoo.com', '', '', '', 0, '', 'In need of a developer for an iOS Action game', 0, '2014-04-06 10:22:49'),
(842, 'Chandler', 'Dev', '', '', 'index.php', '713-557-8001', '', 'dev@desss.com', '75.148.178.13', '', '', 0, '', '', 0, '2014-05-23 07:13:45'),
(843, 'anbu', 'anbu', '', '', 'index.php', '123-123-1234', '', 'testcase254@gmail.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-23 18:11:18'),
(844, 'anbu', 'anbu', '', '', 'index.php', '123-123-1234', '', 'testcase254@gmail.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-23 18:13:48'),
(845, 'adfdsf', 'sadffdf', '', '', 'index.php', '123-123-1234', '', 'testcase254@gmail.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-23 18:56:28'),
(846, 'anbu', 'anbu', '', '', 'index.php', '123-123-1234', '', 'testcase254@gmail.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-23 20:10:27'),
(847, 'Sabari', 'Vaassan', '', '', 'index.php', '782-323-6287', '', 'svaassan56@gmail.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-23 23:14:48'),
(848, 'Sabari', 'Vaassan', '', '', 'index.php', '048-304-8304', '', 'svaassan56@gmail.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-23 23:19:33'),
(849, 'Sabari', 'Vaassan', '', '', 'index.php', '232-323-2323', '', 'sabarivaassan@gmail.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-23 23:19:49'),
(850, 'SAbari', 'Vaasa', '', '', 'index.php', '232-323-2030', '', 'svaassab56@gmail.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-23 23:46:45'),
(851, 'karuna', 'karan', '', '', 'index.php', '454-545-4545', '', 'karunakaran@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 01:48:53'),
(649, 'chandler Dev', '', '', '', 'it-services/virtualization-services-houston.html', '713-589-6496', '', 'chandler.dev@gmail.com', '', '', '', 0, '', 'test by chandler Dev', 0, '2013-05-31 06:41:11'),
(698, 'thom gilligan', '', '', '', 'it-services/android-app-development-houston.html', '970-310-0750', '', 'thomgilligan@xyinc.com', '', '', '', 0, '', 'Our company is near Houston.\r\n\r\nWe will need an App developer who can help us implement a proprietary app running on Android.\r\n\r\nA cell phone will be modified with special lens and housing allowing certain proprietary end users to scan a very small 2D datamatrix or QR code.\r\n\r\nThe cell phone may be activated by the user to have a 4G type connection, or may simple use WiFi (owner dependent). \r\n\r\nThe barcode will contain a series of code segments, each segment addressing to a specific list, such l', 0, '2013-06-07 16:46:36'),
(699, 'thom gilligan', '', '', '', 'it-services/android-app-development-houston.html', '970-310-0750', '', 'thomgilligan@xyinc.com', '', '', '', 0, '', 'Our company is near Houston.\r\n\r\nWe will need an App developer who can help us implement a proprietary app running on Android.\r\n\r\nA cell phone will be modified with special lens and housing allowing certain proprietary end users to scan a very small 2D datamatrix or QR code.\r\n\r\nThe cell phone may be activated by the user to have a 4G type connection, or may simple use WiFi (owner dependent). \r\n\r\nThe barcode will contain a series of code segments, each segment addressing to a specific list, such l', 0, '2013-06-07 16:47:26'),
(700, 'Snehraj Bekwadkar', '', '', '', 'media/animation-design-houston.html', '919-886-2867', '', 'rajbekwadkar27@gmail.com', '', '', '', 0, '', 'Respected Sir, Madam\r\nI am Snehraj Bekwadkar\r\nI have a total of 9 years of experience out of which 7 years is in graphic\r\ndesigning and2 year in animation (a few executed projects and samples for\r\nreference are mentioned in the links given below).\r\n\r\n*Sample Work:*\r\n \r\n\r\nhttp://www.youtube.com/watch?v=JDWlmzDirS8&amp;feature=mfu_in_order&amp;list=UL\r\n\r\n http://www.youtube.com/watch?v=rz9VjqsFeUo\r\n\r\n \r\nhttp://www.youtube.com/watch?v=O4UG1DrqnMY\r\n\r\n http://www.youtube.com/watch?v=_2LdE1Yt_VY&amp;videos=mDGSKp', 0, '2013-06-08 05:38:07'),
(701, 'Snehraj Bekwadkar', '', '', '', 'media/animation-design-houston.html', '919-886-2867', '', 'rajbekwadkar27@gmail.com', '', '', '', 0, '', 'Respected Sir, Madam\r\nI am Snehraj Bekwadkar\r\nI have a total of 9 years of experience out of which 7 years is in graphic\r\ndesigning and2 year in animation (a few executed projects and samples for\r\nreference are mentioned in the links given below).\r\n\r\n*Sample Work:*\r\n \r\n\r\nhttp://www.youtube.com/watch?v=JDWlmzDirS8&amp;feature=mfu_in_order&amp;list=UL\r\n\r\n http://www.youtube.com/watch?v=rz9VjqsFeUo\r\n\r\n \r\nhttp://www.youtube.com/watch?v=O4UG1DrqnMY\r\n\r\n http://www.youtube.com/watch?v=_2LdE1Yt_VY&amp;videos=mDGSKp', 0, '2013-06-08 05:38:28'),
(759, 'test', '', '', '', 'it-services/application-development-houston.html', '978-717-7829', '', 'test@desss.com', '', '', '', 0, '', 'test', 0, '2013-07-06 04:38:40'),
(758, 'sreevatsan seshadri', '', '', '', 'it-services/mobile-application-development-houston', '098-406-7990', '', 'sreevatsan@benchsoft.in', '', '', '', 0, '', 'Dear Sir,\r\n   We are a team of Mobile app developers who have developed lot of Iphone/Andoid app for clients in Australia and US.\r\n\r\n   We have a team of 20 resources with a Chief Technical Officer who has 20+ years of experience in System, Mobile and Web Development.\r\n\r\n\r\nBelow are the list of Iphone/Android app which we develop for our clients for US.\r\n\r\niPhone\r\n---------\r\nPrint Link-https://itunes.apple.com/in/app/printlink/id568354723?mt=8\r\n\r\nMy\r\nchamber-https://itunes.apple.com/in/app/chamb', 0, '2013-07-05 00:41:10'),
(703, 'swati', '', '', '', 'web-applications/web-design-houston.html', '958-213-6521', '', 'swati.xx15@gmail.com', '', '', '', 0, '', 'job opportunities for engineer fresher 2013', 0, '2013-06-19 04:08:13'),
(753, 'Bracken Christian', '', '', '', 'it-services/mobile-application-development-houston', '806-759-0288', '', 'bracken.christian@patenergy.com', '', '', '', 0, '', 'Looking for application developer to create an app for our learning &amp; development needs within our company.', 0, '2013-06-27 11:11:50'),
(754, 'Ryan Faircloth', '', '', '', 'it-services/mobile-application-development-houston', '210-744-5953', '', 'ryanfaircloth1114@gmail.com', '', '', '', 0, '', 'I am just opening up a restaurant and was wondering how much an iPhone and Android app would cost? I need food ordering capabilities as well as social media links, menus, reservations, etc.', 0, '2013-06-27 20:05:28'),
(508, 'eimear cox', '', '', '', 'solutions/microsoft-sharepoint-design-houston.html', '713-400-5965', '', 'ecox@quantlab.com', '', '', '', 0, '', 'I am interested to hear more about your ShrePoint consultancy and development services', 0, '2012-12-15 08:05:03'),
(509, 'Anand', '', '', '', 'about-us-houston.html', '978-902-2597', '', 'anandjob008@gmail.com', '', '', '', 0, '', 'Hi\r\nregarding part time job kindly provide the details\r\nregards\r\nAnand - 9789022597	\r\nmail - anandjob008@gmail.com', 0, '2012-12-21 01:01:13'),
(510, 'puviarasu', '', '', '', 'career.php', '984-136-3433', '', 'puviarasu.sg@gmail.com', '', '', '', 0, '', 'Wanted Data entry/conversion projects.Please provide details to my email.', 0, '2012-12-21 01:27:41'),
(511, 'Christopher Shafik', '', '', '', 'it-services/application-development-houston.html', '281-647-0505', '', 'cshafik@yahoo.com', '', '', '', 0, '', 'I want to design a finance application, do you guys have any experience doing that? ', 0, '2012-12-29 15:30:15'),
(512, 'Christopher Shafik', '', '', '', 'it-services/application-development-houston.html', '281-647-0505', '', 'cshafik@yahoo.com', '', '', '', 0, '', 'I want to design a finance application, do you guys have any experience doing that? ', 0, '2012-12-29 15:30:20'),
(516, 'Tom Hall', '', '', '', 'about-us-houston.html', '832-206-6110', '', 'tom@thricebox.com', '', '', '', 0, '', 'I need to scale my development team with local Django / Python experts.  We need input in taking our design and app to the next level.', 0, '2013-01-15 16:37:39'),
(517, 'Kim Jones', '', '', '', 'outsourcing-services/healthcare-outsourcing-housto', '999-999-9999', '', 'kim.jones@nexuslead.com', '', '', '', 0, '', 'Hi,\r\n  Are you looking to increase your customer base across US to improve your sales?\r\n\r\nWe are an online marketing solution providers, we hold expertise in any targeted industry vertical you may have in mind.\r\n\r\nWe have over 50 million verified contacts which are updated on a regular basis.\r\n\r\nJust let me know your exact target audience (Geographic Location / Business Vertical / Job Titles) so that I could send you a few samples for your review at no cost. All emails go specifically to the contact; there are no general emails such as info@xyz.com.\r\n\r\nRegards,\r\nKim Jones\r\nMarketing Consultant\r\nE-mail: kim.jones@nexuslead.com \r\n', 0, '2013-01-16 06:34:10'),
(518, 'Tomasz', '', '', '', 'ecommerce-services/ecommerce-web-development-houst', '111-111-1111', '', 'tomasz.jasinski@gmail.com', '', '', '', 0, '', 'Do you have in-house BigCommerce development/design expertise? I have an urgent project for our website.  It is not a standard template redesign.  We need a truly professional BigCommerce developer who can push the boundries of BigCommerce without upsetting it\\''s balance.', 0, '2013-01-17 09:03:14'),
(519, 'Kira Beltran', '', '', '', 'cms/wordpress-customization-houston.html', '713-610-4730', '', 'kbeltran@spray-on.com', '', '', '', 0, '', 'I need some help with a few things for a wordpress site I\\''m doing. I have more experience with front end design and I am having trouble with moving a database and making it pretty. I\\''m interested in consultation services or else, maybe hiring out a couple of pages. Thanks!', 0, '2013-01-17 12:07:05'),
(521, 'Ramesh', '', '', '', 'staffing-services/contract-staffing-houston.html', '981-128-8999', '', 'ramesh@seogurudelhi.com', '', '', '', 0, '', 'Hello Webmaster\r\n\r\nThis is Ramesh Sharma Form Web Media Makers. We are looking for relevant link partners with 3 Way Link Building. As you know recently Google Algorithm updates on 17th January 2013 have affected many websites. So having quality links with good PR will be very beneficial for both of us.\r\n\r\nPlease add our all these relevant websites and details of them are as follows. You can either Exchange links with any of these websites or with all websites or can do three way link exchange as well.\r\nIf you founds this interesting then please add our following link on your website. \r\n\r\n \r\n\r\nURL - http://www.webmediamakers.com/\r\n\r\nAnchor Text - Website Designing\r\n\r\nAnchor Title - Website Designing\r\n\r\nDescription Ã¢â‚¬â€œ Web Media Makers is the leading Website Designing company in Delhi India with a great list of cost effective services including Web Design, Search Engine Optimization and Graphic Designing services in Delhi India.\r\n\r\n After adding link, please send me your link info, SO that I can add your link at:\r\n\r\nhttp://www.mindcrackers.com/web-design-seo-partners-1.html\r\n \r\n\r\nWaiting for your earliest reply.\r\nWarm Regards,\r\nRamesh Sharma\r\n \r\n\r\nNOTE: We have been manually researching links and contacting those who are interested in Link exchange. If we have offended you by sending this to you by mistake, we apologize. If we do not get any positive response, we shall not send a mail to you again.\r\n', 0, '2013-01-25 04:02:55'),
(528, 'Srinath', '', '', '', 'data-conversion/e-books-publishing-houston.html', '979-143-1030', '', 'rohinisrinath14@gmail.com', '', '', '', 0, '', 'Hi,\r\n\r\n   We need a E-Publishing process. If you have any process plz send me the details to my mail ID : rohinisrinath14@gmail.com', 0, '2013-01-25 23:11:39'),
(529, 'Andrew Smith', '', '', '', 'about-us-houston.html', '141-411-2134', '', 'info@weblinkbuildingservices.co.uk', '', '', '', 0, '', 'Hi, \r\nWe are working as vendor firm for some SEO companies based on UK, USA, Canada, Australia based client, and have personal 4000+ website .Our team do only thematic link building  as we have huge inventory of links, we can deliver you best quality links with guaranteed result.\r\nWe have a successful track record of Link Building and SEO Service. We always adopt the ethical White hat technique. All work is done without using any software. We use only manually link building technique and follow all guidelines of search engine in our Link Building and SEO process.\r\nOur strategy is:-\r\n*         We provide permanent link\r\n*         We deliver niche related link\r\n*         Only relevant links\r\n*         We give all indexed link\r\n*         Do-follow links\r\n*         Links with relevant \\''Keywords\\'' in the Anchor Text\r\n*         We build all links manually without use any software\r\n*         We always use white hat technique to build all links	\r\nSo give us a chance to work for your organization to build our healthy and long term business relationship. I am looking forward hearing from you.\r\nRegards	\r\nAndrew Smith\r\n', 0, '2013-01-29 07:34:24'),
(530, 'Ramil Maximos', '', '', '', 'about-us-houston.html', '832-444-5116', '', 'ramil@myfitfoods.com', '', '', '', 0, '', 'Hi I am in search for a mobile app development company that can assist in the development of our mobile app project.  I would like to have someone contact me so that I can send the outline of what we are looking for.  I am currently gathering information, time frames and quotes.\r\n\r\nThanks\r\nRamil\r\nIT Project Manager\r\nMy Fit Foods', 0, '2013-01-31 13:32:18'),
(531, 'saravana kumar', '', '', '', 'bpo-services/data-entry-houston.html', '045-452-4417', '', 'dsarankumar19@gmail.com', '', '', '', 0, '', 'Dear Sir,\r\nI am having 10 seats with net is there any online or offline jobs kindly give me details,  i am ready to do your jobs \r\n\r\nThank you', 0, '2013-02-01 23:41:22'),
(532, 'Brian McNeil-Smith', '', '', '', 'Brian McNeil-Smith', '866-557-3023', '', 'brian@easypromosapp.com', '', '', '', 0, '', 'I was on your website and wanted to call but know you are busy and want to respect your time. This is what I\\''d like to engage you about:\r\n\r\nYour clients need your expertise to create and run engaging campaigns on their Facebook pages.\r\n\r\nWe all know Facebook is where their clients hangout and you who cracks the code to engaging them will have a path beaten to your door by brands and other businesses.\r\n\r\nSo, Easypromos is designed with you in mind so you can get the best results for your clients and make a ton of profit doing what you do best.\r\n\r\nOnce you see us you will understand why you don\\''t have to spend your time making your own apps nor tons of money on apps that are frustrating to work with.\r\n\r\nMake life easy and profitable.\r\n\r\nCheck it all out here - http://www.bit.ly/agency-partners\r\n\r\n\r\nHave a look at this Quiz example - http://apps.facebook.com/easypromos-premium/promotions/11993\r\n\r\nAlso, I will be happy to show you how the app can be used for your business and clients.\r\n\r\nSend me an email and lets connect.\r\n\r\nBrian\r\nhttp://www.easypromosapp.com\r\n', 0, '2013-02-09 14:47:45'),
(547, 'dan martinez', '', '', '', 'about-us-houston.html', '281-494-7394', '', 'dmartinez@danmartinez.com', '', '', '', 0, '', 'i need a joomla web company', 0, '2013-03-02 03:04:17'),
(536, 'Toby Dagenhart', '', '', '', 'it-services/iphone-app-development-houston.html', '713-515-2658', '', 'tdagenhart@chapelwood.org', '', '', '', 0, '', 'I would like to learn to develop mobile applications. I have been developing websites for about 15 years and MySQL/ColdFusion applications for about 6 or 7 years. I know that is not the same at Objective-C, but it is a start. I have been doing some study on my own of Objective-C and X-Code, but I would like to get some one-on-one, in-person training. Of course, we would expect to pay for this service. Thank you', 0, '2013-02-15 22:15:17'),
(537, 'amala', '', '', '', 'career.php', '994-431-6060', '', 'amalaloganathan@yahoo.in', '', '', '', 0, '', 'I am a joomla developer with 3.5 years exp and interested to work in your company', 0, '2013-02-19 11:33:52'),
(552, 'Lilly Daneva', '', '', '', 'about-us-houston.html', '389-224-6150', '', 'contact@32seconds-media.com', '', '', '', 0, '', 'Hello,\r\n\r\nABOUT US: We are small web design/development company based in\r\nMacedonia. As a team, we try to keep every client happy and to deliver\r\nmaximum quality.\r\n\r\nMy name is Lilly Daneva and I am project manager of 32 Seconds Media. My\r\nrole is to make sure all of the work goes smoothly and perfectly. I put\r\nmaximum effort in this work and I believe in mutual success.\r\n\r\nOur Website Portfolio: www.32seconds-media.com\r\n\r\nLATEST WORK:\r\n\r\n1. http://www.diseaseinfosearch.org/ (Custom PHP, Large scale project)\r\n2. http://www.thegrocerygirls.com/ (Magento)\r\n3. http://www.aqility.com/ (Design + WP)\r\n4. http://universalmasterproducts.com/ (WP)\r\n5. http://racehorse-exchange.com/ (WP)\r\n6. http://fenwaytriangletrilogy.com/ (Joomla)\r\n7. http://www.carz123.com/ (Design + WP)\r\n\r\n\r\nWE TAKE PROJECTS IN: Web Design + PHP (Frameworks) + CMS (WP, Magento,\r\nJoomla, Big Commerce, Etc) + Mobile Apps + Front End development / JQuery,\r\netc.\r\n\r\nOur main goal is to establish a long term collaboration as your outsource\r\npartner. We believe we will get a chance to show you our skills because:\r\n\r\nWe are fair, honest, passionate, detail oriented, not greedy, fast and we\r\nunderstand the relation end client > you > our team.\r\n\r\nI would appreciate your reply. I honestly hope that we will have the\r\nchance to collaborate with you.\r\n\r\nThanks,\r\nLilly Daneva\r\nSkype: iko3vc', 0, '2013-03-02 11:08:47'),
(542, 'Sarah Van Winkle', '', '', '', 'it-services/mobile-application-development-houston', '936-672-9724', '', 'sarahsandlinvan@gmail.com', '', '', '', 0, '', 'Looking for someone to develop an app', 0, '2013-02-23 09:44:33'),
(543, 'dan martinez', '', '', '', 'cms/joomla-customization-houston.html', '281-494-7394', '', 'dmartinez@danmartinez.com', '', '', '', 0, '', 'i need a joomla web company', 0, '2013-02-27 18:45:55'),
(551, 'Sarah Van Winkle', '', '', '', 'web-applications/web-design-houston.html', '936-672-9724', '', 'sarahsandlinvan@gmail.com', '', '', '', 0, '', 'Looking for someone to develop an app', 0, '2013-03-02 03:24:16'),
(566, 'Kostiantyn Iakovchuk', '', '', '', 'about-us-houston.html', '809-797-9309', '', 'kyakovchuk@wintrade.com.ua', '', '', '', 0, '', 'I represent a BPO company from Ukraine.\r\n\r\nWe have skilled multi-language (CEE, European, English) staff and small cost - so we could cover the client service: peaks, night work etc. We also provide IT outsourcing services.\r\n\r\nI would like to discuss cooperation with You', 0, '2013-03-06 08:50:36'),
(567, 'June McAlister', '', '', '', 'staffing/staffing-services-houston.html', '832-661-4113', '', 'junegrayer@hotmail.com', '', '', '', 0, '', 'I am looking for employemnt with your agency, either temp to hire or direct hitr, I look forward to hraing fo', 0, '2013-03-06 22:07:48'),
(568, 'Sam Howard', '', '', '', 'application-development/database-administration-ho', '281-301-5481', '', 'Slhoward25@yahoo.com', '', '', '', 0, '', 'I would like to forward my resume to you. I\\''m aware that you provide staffing services to businesses but this is an opportunity to help streamline the process. Please let me know what email address I should send it to. Thank you for your time.', 0, '2013-03-08 22:16:34'),
(569, 'Narender KUmar', '', '', '', 'staffing-services/contract-staffing-houston.html', '923-654-6467', '', 'info@ranksindia.com', '', '', '', 0, '', 'HI Sir/Madam\r\n\r\nCan you outsource some SEO business to us? We will work according to you and your clients and for a long term relationship we can start our SEO services in only $300 per month per website.\r\nLooking forward for your positive reply\r\n\r\nThanks\r\nNarendra\r\nRank India Private Limited\r\n', 0, '2013-03-09 06:23:06'),
(570, 'Narender KUmar', '', '', '', 'staffing-services/contract-staffing-houston.html', '923-654-6467', '', 'info@ranksindia.com', '', '', '', 0, '', 'HI Sir/Madam\r\n\r\nCan you outsource some SEO business to us? We will work according to you and your clients and for a long term relationship we can start our SEO services in only $300 per month per website.\r\nLooking forward for your positive reply\r\n\r\nThanks\r\nNarendra\r\nRank India Private Limited\r\n', 0, '2013-03-09 06:24:07'),
(571, 'narender kuamr', '', '', '', 'staffing-services/contract-staffing-houston.html', '923-654-6467', '', 'info@ranksindia.com', '', '', '', 0, '', 'HI Sir/Madam\r\n\r\nCan you outsource some SEO business to us? We will work according to you and your clients and for a long term relationship we can start our SEO services in only $300 per month per website.\r\nLooking forward for your positive reply\r\n\r\nThanks\r\nNarendra\r\nRank India Private Limited', 0, '2013-03-12 07:36:05'),
(575, 'Casey Whalen', '', '', '', 'it-services/android-app-development-houston.html', '281-999-7100', '', 'cwhalen@piperepair.net', '', '', '', 0, '', 'My company needs to develop a \\"calculator\\" app relatively quickly (~1 week). It needs to take several drop down inputs and then generate several outputs. Nothing to fancy, I already have the math and some loops figured out. Needs to be able to save and store or print-to-file within android tablet for file transfer later. I developed (rather slowly) something that works for windows via visual studio and I can give screen shots. It needs to function smoothly and look somewhat polished. Work may expand after \\"prototype\\" is approved by our client.\r\n\r\nPlease e-mail back or give me a call @ 281 999 7100 and ask for Casey if you are able to develop a rather simple, functional app for an android tablet relatively quickly. Will need an estimate of price before commitment. \r\n\r\nTime is of the essence. Nothing fancy is needed, only static graphics required.', 0, '2013-03-28 07:51:15'),
(576, 'Casey Whalen', '', '', '', 'it-services/android-app-development-houston.html', '281-999-7100', '', 'cwhalen@piperepair.net', '', '', '', 0, '', 'My company needs to develop a \\"calculator\\" app relatively quickly (~1 week). It needs to take several drop down inputs and then generate several outputs. Nothing to fancy, I already have the math and some loops figured out. Needs to be able to save and store or print-to-file within android tablet for file transfer later. I developed (rather slowly) something that works for windows via visual studio and I can give screen shots. It needs to function smoothly and look somewhat polished. Work may expand after \\"prototype\\" is approved by our client.\r\n\r\nPlease e-mail back or give me a call @ 281 999 7100 and ask for Casey if you are able to develop a rather simple, functional app for an android tablet relatively quickly. Will need an estimate of price before commitment. \r\n\r\nTime is of the essence. Nothing fancy is needed, only static graphics required.', 0, '2013-03-28 07:51:36'),
(577, 'LAURA FITZGERALD', '', '', '', '', '713-858-2378', '', 'LASHFITZ@ME.COM', '', '', '', 0, '', 'Highly skilled team in Houston, TX area (currently serving NASA) wishing to expand clientele to non-government work.', 0, '2013-03-29 07:14:34'),
(578, 'stephen crowder', '', '', '', 'it-services/mobile-application-development-houston', '832-372-1226', '', 'crowuser1221@aol.com', '', '', '', 0, '', 'I am looking to create a website along with a mobile app and game to go with the site. The website would consist of a database and several photo galleries. ', 0, '2013-03-29 17:55:16'),
(580, 'Chaitra', '', '', '', 'application-development/php-houston.html', '843-897-8582', '', 'chaitra.rayanandana@gmail.com', '', '', '', 0, '', 'Hello Sir/Madam,\r\n My name is Chaitra and passionate to work as a PHP Developer.My Skills are,\r\n1.PHP\r\n2.Javascript\r\n3. CSS\r\n4. HTML\r\n5. Ajax\r\n6. Codeigniter\r\nPlease let me know any openings in BESSS as a PHP Developer.\r\n\r\nThanks & Regards,\r\nchaitra.R\r\nchaitra.rayanandana@gmail.com\r\n8438978582', 0, '2013-04-05 03:02:08'),
(581, 'Chaitra', '', '', '', 'application-development/php-houston.html', '843-897-8582', '', 'chaitra.rayanandana@gmail.com', '', '', '', 0, '', 'Hello Sir/Madam,\r\n My name is Chaitra and passionate to work as a PHP Developer.My Skills are,\r\n1.PHP\r\n2.Javascript\r\n3. CSS\r\n4. HTML\r\n5. Ajax\r\n6. Codeigniter\r\nPlease let me know any openings in BESSS as a PHP Developer.\r\n\r\nThanks & Regards,\r\nchaitra.R\r\nchaitra.rayanandana@gmail.com\r\n8438978582', 0, '2013-04-05 03:02:19'),
(582, 'TC Karpinski', '', '', '', 'staffing-services/full-time-employment-houston.htm', '281-235-0224', '', 'prosoccer22@hotmail.com', '', '', '', 0, '', 'I was wondering where I send my resume for the Sales Position.  Thanks!', 0, '2013-04-05 11:49:18'),
(585, 'Price Neal', '', '', '', 'it-services/iphone-game-development-houston.html', '281-881-5966', '', 'willneal66@yahoo.com', '', '', '', 0, '', 'I am in the process of having a game developed and am considering switching companies depending on quality and cost. Can you please email me with your rates, or average cost for a 2d game? ', 0, '2013-04-23 18:36:48'),
(587, 'Kelly J Gale', '', '', '', 'it-consulting/aspdotnet-consulting-houston.html', '302-536-5650', '', 'kgale@freedomridesauto.com', '', '', '', 0, '', 'I\\''m looking for a consultant that can help on an hour by hour basis to help me past some stumbling block while I\\''m building a substantial web  application at my employers.  What are your rates?\r\n\r\nThanks,\r\nKelly G', 0, '2013-04-24 10:07:55'),
(588, 'Mike Nolen', '', '', '', 'it-consulting/java-consulting-houston.html', '832-444-1778', '', 'mike@iwowwesupport.com', '', '', '', 0, '', 'Need Sr. Java Development team and possibly an IOs/Android team as well.\r\n', 0, '2013-04-26 09:17:16'),
(589, 'mason', '', '', '', 'web-applications/web-design-houston.html', '713-320-7500', '', 'zmag1919@gmail.com', '', '', '', 0, '', 'need a quote for new website design', 0, '2013-04-28 19:11:18'),
(590, 'Doug Baysal', '', '', '', 'it-services/mobile-application-development-houston', '713-498-9772', '', 'dogabaysal@hotmail.com', '', '', '', 0, '', 'looking into building a small app for a local music band. woudl like to get a pricing.', 0, '2013-05-01 18:11:58'),
(593, 'aaron jackson', '', '', '', 'outsourcing-services/translation-services-houston.', '713-280-9071', '', 'aaronisintexas@gmail.com', '', '', '', 0, '', 'can I make an appointment for  your document translation services', 0, '2013-05-14 08:26:00'),
(594, 'Joshua Syna', '', '', '', 'ecommerce-services/ecommerce-web-development-houst', '713-471-5408', '', 'joshua@tejastubes.com', '', '', '', 0, '', 'I need an emmerce solution for my website.  Please call.', 0, '2013-05-15 19:44:11'),
(595, 'DHINAGARAN S', '', '', '', 'bpo-services/data-entry-houston.html', '979-111-8277', '', 'sdhina83@gmail.com', '', '', '', 0, '', 'I want jobs in your company. i have completed M.com. I am experienced in data entry last 8 years in BPO.', 0, '2013-05-24 05:24:58'),
(596, 'DHINAGARAN S', '', '', '', 'healthcare-outsourcing/medical-billing-houston.htm', '979-111-8277', '', 'sdhina83@gmail.com', '', '', '', 0, '', 'I want a jobs. I am experianced in Medical Billing USA last 8 years.', 0, '2013-05-24 05:29:47'),
(760, 'Uwe Meyer', '', '', '', 'career.php', '979-318-0467', '', 'meyeruwe@live.com', '', '', '', 0, '', 'Dear Madam, dear Sir.\r\nDo you offer internship positions?\r\nI am currently pursuing an AAS in computer programming and I would like to get some hands on experience in a real life situation.\r\nBest regards\r\nUwe Meyer\r\n', 0, '2013-07-13 05:36:45'),
(761, 'Jennifer Miller', '', '', '', 'our-team.html', '281-334-6970', '', 'jmiller@prodagio.com', '', '', '', 0, '', 'Hi, we are looking to redesign our joomla site www.prodagio.com', 0, '2013-07-15 09:42:59'),
(762, 'cnandler Dev', '', '', '', 'products/highway-bidding-houston.html', '713-557-8001', '', 'dev@desss.com', '', '', '', 0, '', 'test at 9.47 pm', 0, '2013-07-15 18:17:55'),
(763, 'vijay', '', '', '', 'solutions/microsoft-dynamics-crm-solutions-consult', '987-456-3210', '', 'vijay@desss.com', '', '', '', 0, '', 'test desss QC', 0, '2013-07-15 22:55:20'),
(764, 'vijay', '', '', '', 'solutions/microsoft-dynamics-crm-solutions-consult', '987-456-3210', '', 'vijay@desss.com', '', '', '', 0, '', 'test desss QC', 0, '2013-07-15 22:57:00'),
(765, 'vijay', '', '', '', 'solutions/microsoft-dynamics-crm-solutions-consult', '987-456-3210', '', 'vijay@desss.com', '', '', '', 0, '', 'test desss QC', 0, '2013-07-15 22:57:36'),
(766, 'vijay', '', '', '', 'it-services/web-applications-houston.html', '987-456-3210', '', 'vijay@desss.com', '', '', '', 0, '', 'test', 0, '2013-07-16 05:03:38'),
(767, 'testqc', '', '', '', 'products/products-houston.html', '123-123-1231', '', 'test@desss.com', '', '', '', 0, '', 'test comments\r\n', 0, '2013-07-17 06:13:46'),
(768, 'testqcfirst', '', '', '', 'outsourcing-services/outsourcing-services-houston.', '123-123-1231', '', 'test@desss.com', '', '', '', 0, '', 'test content', 0, '2013-07-17 06:15:59'),
(769, 'Testin', '', '', '', 'solutions/microsoft-dynamics-crm-solutions-consult', '985-214-7012', '', 'vijay@desss.com', '', '', '', 0, '', 'test desss qc', 0, '2013-07-17 07:07:26'),
(770, 'Mitchell Syma', '', '', '', 'industry/small-business-website-design-houston.htm', '713-855-8503', '', 'mitch@revolution-studio.com', '', '', '', 0, '', 'Hi,\r\n\r\nI own Revolution Studio a premier indoor cycling studio in Sugar Land (www.revolution-studio.com). We are currently expanding to Studio #2 and looking for a new web design team to manage our website and help facilitate our rapid growth. Please call me if you have any questions. I look forward to hearing from you soon. \r\n-- \r\nMitch Syma\r\nOwner, Revolution StudioÃ‚Â®\r\n2125 Lone Star Drive\r\nSugar Land, TX 77479\r\nwww.revolution-studio.com\r\nwww.facebook.com/RevolutionStudioCycling\r\n713.855.8503', 0, '2013-07-17 13:00:55'),
(771, 'Sneha Sri', '', '', '', 'career.php', '917-110-3456', '', 'roshnisneha@gmail.com', '', '', '', 0, '', 'I have completed my engineering this year and am looking for a bpo day time job.', 0, '2013-07-18 05:02:18'),
(772, 'Sneha Sri', '', '', '', 'career.php', '917-110-3456', '', 'roshnisneha@gmail.com', '', '', '', 0, '', 'I have completed my engineering this year and am looking for a bpo day time job.', 0, '2013-07-18 05:02:24'),
(773, 'Sneha Sri', '', '', '', 'career.php', '917-110-3456', '', 'roshnisneha@gmail.com', '', '', '', 0, '', 'I have completed my engineering this year and am looking for a bpo day time job.', 0, '2013-07-18 05:02:29'),
(774, 'TestQC', '', '', '', 'outsourcing-services/bpo-services-houston.html', '998-888-8888', '', 'test@test.com', '', '', '', 0, '', 'test desss qc', 0, '2013-07-20 01:07:11'),
(775, 'TestQC', '', '', '', 'outsourcing-services/bpo-services-houston.html', '998-888-8888', '', 'test@test.com', '', '', '', 0, '', 'test desss qc', 0, '2013-07-20 01:08:09'),
(776, 'test', '', '', '', 'bpo-services/data-processing-houston.html', '111-111-1111', '', 'test@desss.com', '', '', '', 0, '', 'desss comments\r\n', 0, '2013-07-20 02:32:23'),
(777, 'balaji HTMl', '', '', '', 'aboutus.html', '832-369-8277', '', 'balajiseo@desss.com', '', '', '', 0, '', 'testing in html form', 0, '2013-07-24 23:00:20'),
(778, 'test', '', '', '', 'it-industry-houston.html', '878-978-7898', '', 'test@gmail.com', '', '', '', 0, '', 'test', 0, '2013-07-25 01:17:05'),
(779, 'test', '', '', '', 'outsourcing-services/outsourcing-services-houston.', '222-222-2222', '', 'test@desss.com', '', '', '', 0, '', '.\r\n\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 0, '2013-07-26 07:09:48'),
(780, 'TestQC', '', '', '', 'staffing/staffing-services-houston.html', '777-777-7777', '', 'vijay@desss.com', '', '', '', 0, '', 'Test', 0, '2013-07-26 07:09:56'),
(781, 'Samrat', '', '', '', 'translation-services/birth-certificate-translation', '984-048-0883', '', 'Bipin_samrat@rediff.com', '', '', '', 0, '', 'I stay in India .. I need to translate my birth certificate in French ', 0, '2013-07-28 03:36:41'),
(782, 'James O&#039;Kelley', '', '', '', '', '314-677-1003', '', 'drjamesokelleyshd@gmail.com', '', '', '', 0, '', '', 0, '2013-07-28 16:57:40'),
(783, 'James O&#039;Kelley', '', '', '', '', '314-677-1003', '', 'drjamesokelleyshd@gmail.com', '', '', '', 0, '', '', 0, '2013-07-28 16:57:49'),
(784, 'vijay', '', '', '', 'industry/accounting-website-design-houston.html', '242-343-2423', '', 'vijay@desss.com', '', '', '', 0, '', 'At DESSS we create functionality rich websites for accountants of all categories. We can create a new website for you, add contents to your existing site, and send tax newsletters to your clients at a very reasonable price.', 0, '2013-07-29 22:53:46'),
(785, 'sabari', '', '', '', 'success.html', '231-231-2312', '', 'sabari@desss.com', '', '', '', 0, '', 'We have received your request. One of our representatives will call you within 24-48 hours and send you an email. Please check your junk mail if you don&#039;t receive an email in your inbox.', 0, '2013-07-29 22:54:28'),
(786, 'kalisha', '', '', '', 'bpo-services/data-entry-houston.html', '999-478-1091', '', 'kalishavalli@gmail.com', '', '', '', 0, '', 'Hai Sir/Mam,\r\nAm kalisha (B.com) graduate with 9+ years of work experience in ITES. So kindly provide me any kind of work like data entry or data convertion or etc., Having online data entry experience also so please provide me project.', 0, '2013-07-31 05:34:06'),
(787, 'vijay', '', '', '', 'industry/accounting-website-design-houston.html', '123-123-1231', '', 'vijay@desss.com', '', '', '', 0, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tristique dictum nunc, euismod dapibus neque pulvinar id. Praesent sed consectetur risus. Curabitur posuere, turpis ac rutrum fringilla, tellus diam bibendum ipsum, eu tincidunt nibh leo nec orci. Maecenas dignissim nisi ac blandit ultrices. Nulla non placerat mauris, eget dignissim diam.\r\n', 0, '2013-08-01 02:46:20'),
(788, 'vijay', '', '', '', 'success.html', '123-123-1231', '', 'vijay@desss.com', '', '', '', 0, '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras interdum est eget gravida accumsan. Nulla viverra cursus nisl sed ultrices. Nullam ac lacus sit amet erat ultricies dictum. Integer ut nulla tellus. Curabitur interdum ultrices eros quis adipiscing. Morbi mattis justo et ipsum consequat, eget sollicitudin tellus ornare? Nulla lacinia.\r\n', 0, '2013-08-01 02:51:12'),
(789, 'Silver Fox', '', '', '', '', '602-845-9433', '', 'freeleadsforlife1@yahoo.com', '', '', '', 0, '', '', 0, '2013-08-02 00:47:47'),
(790, 'Silver Fox', '', '', '', '', '602-845-9433', '', 'freeleadsforlife1@yahoo.com', '', '', '', 0, '', '', 0, '2013-08-02 00:48:03'),
(791, 'test', '', '', '', 'it-consulting/infragistics-consulting-houston.html', '023-292-3293', '', 'test@desss.com', '', '', '', 0, '', 'Test Comments\r\n', 0, '2013-08-03 02:05:47'),
(792, 'Shannon Silessi', '', '', '', 'it-services/iphone-app-development-houston.html', '713-934-2115', '', 'ssilessi@grovesindustrial.com', '', '', '', 0, '', 'I would like to get some pricing &amp; time frame information to have an Apple mobile app developed for us.', 0, '2013-08-03 03:22:31'),
(793, 'Sabari vaassan', '', '', '', 'bpo-services/data-entry-houston.html', '978-434-3434', '', 'sabari@desss.com', '', '', '', 0, '', 'Test  by sabari in chrome', 0, '2013-08-03 05:28:43'),
(794, 'H.W. A. Capable', '', '', '', '', '704-706-9198', '', 'empowertodayforyou@gmail.com', '', '', '', 0, '', '', 0, '2013-08-05 07:27:35'),
(795, 'Test', '', '', '', 'it-services/application-development-houston.html', '898-798-7487', '', 'test@desss.com', '', '', '', 0, '', 'test', 0, '2013-08-13 05:10:58'),
(796, 'siddique', '', '', '', 'career.php', '984-023-8089', '', 'sddks16@gmail.com', '', '', '', 0, '', 'I am looking for a data entry job in Chennai. Please let me know if you have any openings in this concern. ', 0, '2013-08-14 04:18:57'),
(797, 'Mark McComb', '', '', '', 'it-services/android-app-development-houston.html', '713-482-2906', '', 'mark.mccomb@tech3.com', '', '', '', 0, '', 'I am interviewing companies to develop demo applications for iPhone, Android, Blackberry and iPads.   Following the demo applications, we would like to continue and complete the application development. \r\n\r\nPlease contact me at your earliest convenience. \r\n\r\nRegards, Mark  \r\n', 0, '2013-08-23 12:44:29'),
(798, 'sabari', '', '', '', 'consulting/it-consulting-houston.html', '121-212-1212', '', 'sabari@desss.com', '', '', '', 0, '', 'Welcome to DESSS consulting services! If you are a businessman who thinks ahead, who wants to equip yourself to face the challenges of the ever changing information technology, you should meet us for all the consulting services. We provide the world class IT solutions to take your business to the future world. We provide the business analysis, help you implement them and emerge as a clean winner in this ever growing world of technology.', 0, '2013-08-25 01:24:11'),
(799, 'TestDesss', '', '', '', 'it-services/it-services-houston.html', '987-654-1230', '', 'test@test.com', '', '', '', 0, '', 'Test', 0, '2013-08-25 01:24:11'),
(800, 'test', '', '', '', 'success.html', '213-231-2312', '', 'vj@desss.com', '', '', '', 0, '', 'test', 0, '2013-08-25 01:27:11'),
(801, 'vijay', '', '', '', 'success.html', '121-212-1212', '', 'vj@desss.com', '', '', '', 0, '', 'test', 0, '2013-08-25 01:30:38'),
(802, 'sabari', '', '', '', 'success.html', '424-234-2342', '', 'vj@desss.com', '', '', '', 0, '', 'test', 0, '2013-08-25 01:31:25'),
(803, 'Test', '', '', '', 'success.html', '974-101-2021', '', 'vijay@desss.com', '', '', '', 0, '', 'We have received your request. One of our representatives will call you within 24-48 hours and send you an email. Please check your junk mail if you don&#039;t receive an email in your inbox.We have received your request. One of our representatives will call you within 24-48 hours and send you an email. Please check your junk mail if you don&#039;t receive an email in your inbox.We have received your request. One of our representatives will call you within 24-48 hours and send you an email. Please check your junk mail if you don&#039;t receive an email in your inbox.We have received your request. One of our representatives will call you within 24-48 hours and send you an email. Please check your junk mail if you don&#039;t receive an email in your inbox.We have received your request. One of our representatives will call you within 24-48 hours and send you an email. Please check your junk mail if you don&#039;t receive an email in your inbox.We have received your request. One of our representatives will call yo', 0, '2013-08-25 01:31:25'),
(804, 'Test', '', '', '', 'success.html', '123-456-7894', '', 'test@test.com', '', '', '', 0, '', 'test', 0, '2013-08-25 01:34:54'),
(805, 'Keith Barker', '', '', '', 'ecommerce-services/zen-cart-website-design-develop', '866-937-7429', '', 'keith.barker@quikdrawers.com', '', '', '', 0, '', 'I am looking for a redeveloped website.\r\n\r\nWe sell cabinet doors and drawers and have several different pricing models for our products.\r\n\r\nKeith Barker', 0, '2013-09-18 10:40:13'),
(806, 'Paulos Edlu', '', '', '', 'it-services/content-management-system-cms-houston.', '480-593-0408', '', 'pedlu@yahoo.com', '', '', '', 0, '', 'Do you develop directory sites using PhpMyDirectory.com CMS software ?', 0, '2013-09-20 10:19:51'),
(807, 'Sabari', '', '', '', 'outsourcing-services/marine-services-houston.html', '934-333-4444', '', 'sabari@desss.com', '', '', '', 0, '', 'Test Desss Quote\r\n', 0, '2013-09-24 00:22:23'),
(808, 'test', '', '', '', 'thanks.html', '222-222-2222', '', 'test@gmail.com', '', '', '', 0, '', 'test\r\n', 0, '2013-09-26 04:49:22'),
(809, 'Sharon Standifird', '', '', '', 'client.php', '111-111-1111', '', 'mountainllc@yahoo.com', '', '', '', 0, '', 'My firm is looking for a reliable local partner to develop mobile applications for iOS and Android. I am looking for a very interactive development partner who can bring my ideas to market efficiently.', 0, '2013-10-09 15:34:32'),
(810, 'Jain Raj Kumar', '', '', '', 'bpo-services/data-entry-houston.html', '995-899-1602', '', 'jainrk2007@yahoo.com', '', '', '', 0, '', 'Hey! i am from INDIA &amp; willing to work data entry job with you. Kindly assist', 0, '2013-10-16 09:15:13'),
(811, 'Jain Raj Kumar', '', '', '', 'bpo-services/data-entry-houston.html', '995-899-1602', '', 'jainrk2007@yahoo.com', '', '', '', 0, '', 'Hey! i am from INDIA &amp; willing to work data entry job with you. Kindly assist', 0, '2013-10-16 09:15:18'),
(812, 'Jain Raj Kumar', '', '', '', 'bpo-services/data-entry-houston.html', '995-899-1602', '', 'jainrk2007@yahoo.com', '', '', '', 0, '', 'Hey! i am from INDIA &amp; willing to work data entry job with you. Kindly assist', 0, '2013-10-16 09:15:21'),
(813, 'Jain Raj Kumar', '', '', '', 'bpo-services/data-entry-houston.html', '995-899-1602', '', 'jainrk2007@yahoo.com', '', '', '', 0, '', 'Hey! i am from INDIA &amp; willing to work data entry job with you. Kindly assist', 0, '2013-10-16 09:15:25'),
(814, 'Jain Raj Kumar', '', '', '', 'bpo-services/data-entry-houston.html', '995-899-1602', '', 'jainrk2007@yahoo.com', '', '', '', 0, '', 'Hey! i am from INDIA &amp; willing to work data entry job with you. Kindly assist', 0, '2013-10-16 09:15:26'),
(815, 'Rodgers ', '', '', '', 'translation-services/website-translation-houston.h', '150-065-2691', '', '15006526918@126.com', '', '', '', 0, '', 'Hi there,\r\nCould you please give me quote on translating webpages from Chinese to English? Thanks.\r\n\r\nRodger', 0, '2013-10-18 21:35:46'),
(816, 'simmi', '', '', '', 'it-services/mobile-application-development-houston', '998-888-1231', '', 'simmi@swiftsoftsolutions.com', '', '', '', 0, '', 'Hello\r\n\r\nWe are india based mobile based team and can provide you high quality and cost effective  services .\r\n\r\nPlease conatct us for further discussion\r\nRegards\r\nsimmi\r\nSkype: swiftsoftsolutions', 0, '2013-10-24 22:27:20'),
(817, 'Roger Hsieh', '', '', '', 'solutions/microsoft-sharepoint-consulting-houston.', '281-683-2162', '', 'rhsieh@victory-healthcare.com', '', '', '', 0, '', 'Looking to get a quite on a analysis and deployment of a SharePoint environment. ', 0, '2013-11-05 22:24:43'),
(818, 'test', '', '', '', 'technology/microsoft-technologies-houston.html', '156-456-4564', '', 'test2@gmail.com', '', '', '', 0, '', 'test', 0, '2013-11-07 11:04:45'),
(819, 'Rahul Kumar Tiwari', '', '', '', 'enterprise-software-solutions-houston.html', '917-499-8881', '', 'rcoolsam7@gmail.com', '', '', '', 0, '', 'Hi..', 0, '2013-11-11 07:46:10'),
(820, 'Bhavesh kumar', '', '', '', 'aboutus.html', '921-146-9086', '', 'info@ranksindia.com', '', '', '', 0, '', 'HI Sir/Madam\r\n\r\nCan you outsource some SEO business to us? We will work according to \r\n\r\nyou and your clients and for a long term relationship we can start our \r\n\r\nSEO services in only $99 per month per website.\r\n\r\nLooking forward for your positive reply\r\n\r\nBest\r\nBHAVESH	KUMAR\r\nPhone:+91 921.146.9086 | Skype: ranksindia', 0, '2013-11-16 21:08:58'),
(821, 'spm instruments', '', '', '', 'it-services/business-intelligence-houston.html', '541-687-6869', '', 'info@spminstrument.com', '', '', '', 0, '', 'send a detailed analysis to the client', 0, '2013-11-21 11:17:25'),
(822, 'Social', '', '', '', 'AN-FM-PCM08-Ports-houston.html', '888-233-0877', '', 'no-email-support@searchlland.com', '', '', '', 0, '', 'Hello, \r\n \r\nI am a professional social media manager, obviously  . Thousands of Facebook LIKES can visit and endorse your Brand/website. \r\nHow do you think Justin Bieber(singer) get his first 1,000,000 followers before his first album? His producers bought the followers for him? \r\n \r\nI have something to offer that might interest you.  http://searchlland.com/buy-facebook-likes.php \r\n \r\nBy placing more than 10,000 endorsements using Facebook LIKES. This tell Google that your website is relative and authentic to what you do. \r\nIT WILL BE POSTED RIGHT ON YOUR WEBSITE FOR ALL VISITORS TO SEE HOW MANY -(people) Facebook LIKES you have, via Facebook,by real FB counter button. \r\n \r\n \r\nIn today&#039;s world, interaction between companies and their potential and existing customers is carried out through social media. \r\nThe high rating will help increase the credibility of your website and of the services which you offer. \r\nThese indicators (Facebook LIKES) will be visible on your website. If you have', 0, '2013-11-28 10:50:05'),
(823, 'balaji', '', '', '', 'it-services/application-development-houston.html', '832-369-8277', '', 'balaji@desss.com', '', '', '', 0, '', 'testing in quick contact', 0, '2013-12-10 00:50:56'),
(824, 'Karen', '', '', '', 'outsourcing-services/legal-outsourcing-houston.htm', '888-233-0877', '', 'donoghue.karen1976@yahoo.com', '', '', '', 0, '', 'Hello, I am a professional social media business manager, obviously. \r\n \r\nBy building more than 10,000 real people profile endorsements using Facebook LIKES to your business page. This tell Google that your website is relative and authentic to what you do. \r\nIT WILL BE POSTED RIGHT ON YOUR PAGE FOR ALL VISITORS TO SEE HOW MANY -(people) Facebook LIKES !you have, via Facebook, by real FB counter button. Click on to see how you can do this in you free time or no time  http://www.searchlland.com/buy-facebook-likes.php \r\n \r\nWe can help you also with build 10,000 Twitter Followers in 7 days, or 100,000 YouTube visits, to your YouTube video or channel, build 20,000 Google +1, from your peers about your business. Best offer G+1 building in 7 days \r\n \r\n \r\nYou can get help building 100,000 Facebook LIKES in 7 days. Likes Mean visitors endorse your Fan Page or website. \r\n \r\nHow do you think Justin Bieber(singer) get his first 1,000,000 followers before his first album? His producers bought the f', 0, '2013-12-22 04:36:15'),
(825, 'test', '', '', '', 'it-consulting/infrastructure-consulting-houston.ht', '456-456-4654', '', 'test@gmail.com', '', '', '', 0, '', 'Test', 0, '2013-12-29 03:23:46');
INSERT INTO `request_quote` (`quote_id`, `quote_name`, `quote_lastname`, `quote_industry`, `quote_company`, `file_name`, `quote_phone`, `quote_fax`, `quote_email`, `quote_address`, `quote_city`, `quote_state`, `quote_zipcode`, `quote_country`, `quote_qustcomments`, `cust_type`, `date_time`) VALUES
(826, 'Karen', '', '', '', 'outsourcing-services/outsourcing-services-houston.', '888-233-0877', '', 'no-email-support@yahoo.com', '', '', '', 0, '', 'Hello, I am a professional social media business manager, obviously. \r\n \r\nBy building more than 10,000 real people profile endorsements using Facebook LIKES to your business page. This tell Google that your website is relative and authentic to what you do. \r\nIT WILL BE POSTED RIGHT ON YOUR PAGE FOR ALL VISITORS TO SEE HOW MANY -(people) Facebook LIKES !you have, via Facebook, by real FB counter button. Click on to see how you can do this in you free time or no time  http://www.searchlland.com/buy-facebook-likes.php \r\n \r\nWe can help you also with build 10,000 Twitter Followers in 7 days, or 100,000 YouTube visits, to your YouTube video or channel, build 20,000 Google +1, from your peers about your business. Best offer G+1 building in 7 days \r\n \r\n \r\nYou can get help building 100,000 Facebook LIKES in 7 days. Likes Mean visitors endorse your Fan Page or website. \r\n \r\nHow do you think Justin Bieber(singer) get his first 1,000,000 followers before his first album? His producers bought the f', 0, '2014-01-02 08:45:12'),
(827, 'Tyler Reynolds', '', '', '', 'AN-FM-PCM08-Ports-houston.html', '360-619-6236', '', 'tlreynolds@bpa.gov', '', '', '', 0, '', 'IÃ¢â‚¬â"¢m interested in extending analog phones and/or faxes over fiber.  The fiber is usually multimode less than 2km.  It would great if it also has an Ethernet port, because I would like to connect a Cisco switch to it for VoIP phones.  The AN-FM-PCM08 looks like a good fit, but I donÃ¢â‚¬â"¢t have any need for E1 or T1.\r\n\r\nI would appreciate if you could send me a data sheet or manual along with some pricing information.  Thank you.\r\n', 0, '2014-01-04 07:57:43'),
(828, 'Balaji Rayampettai', '', '', '', 'it-services/mobile-application-development-houston', '281-716-4803', '', 'balaji.rayampettai@interconex.com', '', '', '', 0, '', 'Require to build Tracking App on iphone&amp;ipad, androids for our customers.', 0, '2014-01-15 09:57:10'),
(829, 'Nauman ahmad', '', '', '', 'it-services/application-development-houston.html', '255-665-6566', '', 'naumanahmad360@gmail.com', '', '', '', 0, '', 'Hey,\r\nI came across some interesting pages on your site. This is an example.\r\nhttp://www.desss.com/blog.php\r\nI want to see a link at the same page. In my opinion, blog comment is the ideal way to get this link. Can you tell how long do you take to approve comments with backlink to the other sites?\r\nAnd, is it possible that you add a small 2-3 lines paragraph in the same article to give a backlink to my site?  How much would you charge for such link that is created by adding 2-3 lines to the main article?\r\nAnd, tell your price if I want to publish a set of 3-4 links from 3-4 different articles on your site.\r\nI am ready to pay for the backlinks created by commenting, but I want a guarantee that comments will be live forever. If you are interested in my proposal, reply with your PayPal details, so I can record your message.\r\nI am thinking about opening a link broker business, so if you give me a good price, I can buy a lot of links from you. Please quote your rates separately for comments', 0, '2014-01-24 02:25:29'),
(830, 'Jennifer Asplund', '', '', '', 'Jennifer Asplund', '888-842-3648', '', 'jennifer@MarketingVideos4sale.info', '', '', '', 0, '', 'Hi,\r\n\r\nMy name is Jennifer Asplund. I&#039;m wondering if you are interested in getting a video done for your website or for YouTube?\r\n\r\nI&#039;d be happy to give you access to some of my best examples:\r\nhttp://MarketingVideos4sale.info/21examples\r\n\r\nI&#039;m looking to pickup some extra work, so can get you a pretty good deal right now.\r\n\r\nIf you would like to discuss what I can do for your company, do not hesitate to contact me!\r\n\r\nCheers,\r\nJennifer\r\n\r\n&gt;&gt;http://MarketingVideos4sale.info/21examples\r\n\r\n', 0, '2014-01-28 14:20:24'),
(831, 'chandler', '', '', '', 'it-services/it-services-houston.html', '713-557-8001', '', 'dev@desss.com', '', '', '', 0, '', 'Test from galaxy', 0, '2014-02-05 17:08:23'),
(832, 'Yunlong Jia', '', '', '', 'sap-consulting/sap-financial-accounting-controllin', '989-750-6045', '', 'mikejia315@Hotmail.com', '', '', '', 0, '', '1 life cycle implementation experience fico consultant is looking for a job', 0, '2014-02-11 10:36:36'),
(852, 'Sabari', 'vassan', '', '', 'index.php', '234-234-2343', '', 'sabari@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 01:58:50'),
(853, 'test', 'test', '', '', 'index.php', '454-545-4545', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:11:02'),
(854, 'test', 'test', '', '', 'index.php', '565-656-5656', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:13:22'),
(855, 'test', 'test', '', '', 'index.php', '454-545-4545', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:16:25'),
(856, 'sabari', 'vassan', '', '', 'index.php', '999-999-9999', '', 'sabari@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:19:52'),
(857, 'test', 'test', '', '', 'index.php', '343-434-3434', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:25:21'),
(858, 'test', 'test', '', '', 'index.php', '454-545-4545', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:28:17'),
(859, 'test', 'test', '', '', 'index.php', '454-545-4545', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:29:57'),
(860, 'test', 'test', '', '', 'index.php', '454-545-4545', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:31:51'),
(861, 'test', 'test', '', '', 'index.php', '454-545-4545', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 02:33:16'),
(862, 'Sabari', 'Vassan', '', '', 'index.php', '131-231-2312', '', 'jayaraj@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-24 03:35:30'),
(863, 'test', 'test', '', '', 'index.php', '454-545-4545', '', 'test@desss.com', '182.72.202.41', '', '', 0, '', '', 0, '2014-05-26 21:13:12'),
(864, 'karuna', 'karuna', '', '', 'index.php', '232-323-2323', '', 'karunakaran@desss.com', '192.168.1.101', '', '', 0, '', '', 0, '2014-05-30 23:49:19'),
(865, 'ramprasad', 'ramamurthy', '', '', 'index.php', '781-287-6167', '', 'ramprasad@desss.com', '192.168.1.101', '', '', 0, '', '', 0, '2014-05-30 23:52:36'),
(866, 'Sabari', 'Vaassan', '', '', 'index.php', '232-323-2323', '', 'svaassan56@gmail.com', '192.168.1.233', '', '', 0, '', '', 0, '2014-06-03 20:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method_flatrate`
--

CREATE TABLE IF NOT EXISTS `shipping_method_flatrate` (
  `shipping_flat_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_flat_title` varchar(100) NOT NULL,
  `shipping_flat_method` varchar(100) NOT NULL,
  `shipping_flat_type` varchar(100) NOT NULL,
  `shipping_flat_price` decimal(10,2) NOT NULL,
  `shipping_flat_calhand` varchar(100) NOT NULL,
  PRIMARY KEY (`shipping_flat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method_type_name`
--

CREATE TABLE IF NOT EXISTS `shipping_method_type_name` (
  `shipping_mt_name_id` int(11) NOT NULL AUTO_INCREMENT,
  `shipping_mt_name` varchar(100) NOT NULL,
  `shipping_mt_status` varchar(100) NOT NULL,
  `shipping_mt_sortorder` varchar(100) NOT NULL,
  PRIMARY KEY (`shipping_mt_name_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shipping_method_type_name`
--

INSERT INTO `shipping_method_type_name` (`shipping_mt_name_id`, `shipping_mt_name`, `shipping_mt_status`, `shipping_mt_sortorder`) VALUES
(1, 'Flat Rate', '', '1'),
(2, 'Free Shipping', '', '2'),
(3, 'Table Rate', '', '3'),
(4, 'UPS', '', '4');

-- --------------------------------------------------------

--
-- Table structure for table `signup_tbl`
--

CREATE TABLE IF NOT EXISTS `signup_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(11) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `signup_tbl`
--

INSERT INTO `signup_tbl` (`id`, `firstname`, `lastname`, `email`, `password`, `phonenumber`, `address`, `country`, `city`, `state`, `zipcode`) VALUES
(2, 'ghg', 'hgh', 'ghghg@gmil.com', 'fgfgfg', '4545454', 'fgfgf', 'gfgf', 'gfgf', 'gfg', 54545);

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE IF NOT EXISTS `slider_images` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `images` varchar(100) NOT NULL,
  `slide_left_content` varchar(300) NOT NULL,
  `slide_right_content` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `images`, `slide_left_content`, `slide_right_content`) VALUES
(37, '5.jpg', '', ''),
(36, '4.jpg', 'You can also get the same effect as the caption with:', ''),
(35, '3.jpg', ' You can also get the same effect as the caption with:', 'and you can decide the transition time of any slide'),
(34, '2.jpg', 'The first are loaded immediately before than the second one', 'Here you can see two captions.'),
(33, '1.jpg', 'This is a simple sliding image with caption. You can have more than one caption and decide the layout of the caption via css', ''),
(45, 'Chrysanthemum.jpg', 'test', 'test'),
(44, '300px-Hopetoun_falls.jpg', 'hjinjnmj', 'karan123'),
(46, 'Hydrangeas.jpg', 'beauty', 'nice'),
(48, 'Lighthouse.jpg', 'Tower1', 'Beauty1'),
(49, 'Desert.jpg', 'vfdgh', 'gjnfj');

-- --------------------------------------------------------

--
-- Table structure for table `slider_tbl`
--

CREATE TABLE IF NOT EXISTS `slider_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_image` longtext NOT NULL,
  `slider_thumb_image` longtext NOT NULL,
  `slider_caption` longtext NOT NULL,
  `slider_amount` int(11) NOT NULL,
  `slider_order` int(11) NOT NULL,
  `slider_url` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `slider_tbl`
--

INSERT INTO `slider_tbl` (`id`, `slider_image`, `slider_thumb_image`, `slider_caption`, `slider_amount`, `slider_order`, `slider_url`) VALUES
(23, 'CHC8550A.jpg', 'CHC8550A.jpg', 'HP C8550A Compatible Black Toner Cartridge', 119, 2, 'http://www.buytoneronline.com/laser_fax_toners-hp_color-toner-CHC8550A'),
(24, 'CK1600K.jpg', 'CK1600K.jpg', 'Konica Minolta 1600, 1650, AOV306F Compatible Yellow Toner Cartridge', 65, 3, 'http://www.buytoneronline.com/laser_fax_toners-konica_minolta-toner-CK1600K'),
(25, 'CK1600M.jpg', 'CK1600M.jpg', 'Konica Minolta 1600, 1650, AOV30CF Compatible Magenta Toner Cartridge', 79, 4, 'http://www.buytoneronline.com/laser_fax_toners-konica_minolta-toner-CK1600M'),
(26, 'CK1600C.jpg', 'CK1600C.jpg', 'Konica Minolta 1600, 1650, AOV30HF Compatible Cyan Toner Cartridge', 79, 5, 'http://www.buytoneronline.com/laser_fax_toners-konica_minolta-toner-CK1600C'),
(22, 'CBTN04C.jpg', 'CBTN04C.jpg', 'Brother TN04C Compatible Cyan Toner Cartridge, For HL-2700, MFC-9420 Series', 110, 1, 'http://www.buytoneronline.com/laser_fax_toners-brother-toner-CBTN04C');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_name` varchar(32) NOT NULL,
  `social_description` text NOT NULL,
  `social_image` longtext NOT NULL,
  `social_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_categories_name_zen` (`social_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=8 ;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `social_name`, `social_description`, `social_image`, `social_order`) VALUES
(2, 'Facebook', '#', 'fb.png', 1),
(3, 'Twitter', '#', 'tw.png', 2),
(4, 'Googleplus', '#', 'g+.png', 3),
(5, 'linkedIn', '#', 'in.png', 4),
(6, 'You Tube', '#', 'u.png', 5),
(7, 'Stumbleupon', '#', 'su.png', 6);

-- --------------------------------------------------------

--
-- Table structure for table `social_media_tbl`
--

CREATE TABLE IF NOT EXISTS `social_media_tbl` (
  `social_id` int(5) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) NOT NULL,
  `media_name` varchar(150) NOT NULL,
  `media_image` varchar(150) NOT NULL,
  `media_link` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image_order` int(4) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`social_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `social_media_tbl`
--

INSERT INTO `social_media_tbl` (`social_id`, `company_name`, `media_name`, `media_image`, `media_link`, `active`, `image_order`, `created_date`) VALUES
(2, 'Facebook', 'Facebook', 'face.png', 'https://www.facebook.com/', 1, 1, '2014-06-05 13:42:24'),
(17, 'Twitter', 'Twitter', 'rss.png', '#', 1, 3, '2014-05-23 07:10:20'),
(16, 'Twitter', 'Twitter', 'twitter.png', '#', 1, 2, '2014-05-23 07:09:37'),
(18, 'google', 'google', 'google.png', '#', 1, 4, '2014-05-23 07:10:45');

-- --------------------------------------------------------

--
-- Table structure for table `state_tbl`
--

CREATE TABLE IF NOT EXISTS `state_tbl` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(35) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `state_tbl`
--

INSERT INTO `state_tbl` (`state_id`, `state_name`, `date_time`) VALUES
(1, 'Alaska', '2011-06-25 11:29:44'),
(2, 'Alabama', '2011-06-25 11:29:52'),
(3, 'Arkansas', '0000-00-00 00:00:00'),
(4, 'American Samoa', '0000-00-00 00:00:00'),
(5, 'Arizona', '0000-00-00 00:00:00'),
(6, 'California', '0000-00-00 00:00:00'),
(7, 'Colorado', '0000-00-00 00:00:00'),
(8, 'Connecticut', '0000-00-00 00:00:00'),
(9, 'District of Columbia', '0000-00-00 00:00:00'),
(10, 'Delaware', '0000-00-00 00:00:00'),
(11, 'Florida', '0000-00-00 00:00:00'),
(12, 'Georgia', '0000-00-00 00:00:00'),
(13, 'Guam', '0000-00-00 00:00:00'),
(14, 'Hawaii', '0000-00-00 00:00:00'),
(15, 'Iowa', '0000-00-00 00:00:00'),
(16, 'Idaho', '0000-00-00 00:00:00'),
(17, 'Illinois', '0000-00-00 00:00:00'),
(18, 'Indiana', '0000-00-00 00:00:00'),
(19, 'Kansas', '0000-00-00 00:00:00'),
(20, 'Kentucky', '0000-00-00 00:00:00'),
(21, 'Louisiana', '0000-00-00 00:00:00'),
(22, 'Massachusetts', '0000-00-00 00:00:00'),
(23, 'Maryland', '0000-00-00 00:00:00'),
(24, 'Maine', '0000-00-00 00:00:00'),
(25, 'Marshall Islands', '0000-00-00 00:00:00'),
(26, 'Michigan', '0000-00-00 00:00:00'),
(27, 'Minnesota', '0000-00-00 00:00:00'),
(28, 'Missouri', '0000-00-00 00:00:00'),
(29, 'Northern Mariana Islands', '0000-00-00 00:00:00'),
(30, 'Mississippi', '0000-00-00 00:00:00'),
(31, 'Montana', '0000-00-00 00:00:00'),
(32, 'North Carolina', '0000-00-00 00:00:00'),
(33, 'North Dakota', '0000-00-00 00:00:00'),
(34, 'Nebraska', '0000-00-00 00:00:00'),
(35, 'New Hampshire', '0000-00-00 00:00:00'),
(36, 'New Jersey', '0000-00-00 00:00:00'),
(37, 'New Mexico', '0000-00-00 00:00:00'),
(38, 'Nevada', '0000-00-00 00:00:00'),
(39, 'New York', '0000-00-00 00:00:00'),
(40, 'Ohio', '0000-00-00 00:00:00'),
(41, 'Oklahoma', '0000-00-00 00:00:00'),
(42, 'Oregon', '0000-00-00 00:00:00'),
(43, 'Pennsylvania', '0000-00-00 00:00:00'),
(44, 'Puerto Rico', '0000-00-00 00:00:00'),
(45, 'Palau', '0000-00-00 00:00:00'),
(46, 'Rhode Island', '0000-00-00 00:00:00'),
(47, 'South Carolina', '0000-00-00 00:00:00'),
(48, 'South Dakota', '0000-00-00 00:00:00'),
(49, 'Tennessee', '0000-00-00 00:00:00'),
(50, 'Texas', '0000-00-00 00:00:00'),
(51, 'Utah', '0000-00-00 00:00:00'),
(52, 'Virginia', '0000-00-00 00:00:00'),
(53, 'Virgin Islands', '0000-00-00 00:00:00'),
(54, 'Vermont', '0000-00-00 00:00:00'),
(55, 'Washington', '0000-00-00 00:00:00'),
(56, 'Wisconsin', '0000-00-00 00:00:00'),
(57, 'West Virginia', '0000-00-00 00:00:00'),
(58, 'Wyoming', '0000-00-00 00:00:00'),
(59, 'Other', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `sub_categories_id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL DEFAULT '1',
  `subcategories_image` varchar(64) DEFAULT NULL,
  `subcategory_image_thump` varchar(500) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `subcategories_name` varchar(50) NOT NULL,
  `subcategories_description` text NOT NULL,
  `brand_url` varchar(100) NOT NULL,
  `master_cat_id` int(11) NOT NULL,
  `master_cat_url` varchar(100) NOT NULL,
  `date_added` datetime DEFAULT NULL,
  `last_modified` datetime DEFAULT NULL,
  `subcategories_status` tinyint(1) NOT NULL DEFAULT '1',
  `url_name` text NOT NULL,
  `cat_order` int(11) NOT NULL DEFAULT '0',
  `meta_title` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_key` text NOT NULL,
  `h1` longtext NOT NULL,
  `h2` longtext NOT NULL,
  `show_left_panel` enum('Yes','No') NOT NULL DEFAULT 'No',
  `navigation_status` varchar(100) NOT NULL,
  `url_key` varchar(500) NOT NULL,
  `subcategories_active` varchar(100) NOT NULL,
  PRIMARY KEY (`sub_categories_id`),
  KEY `idx_parent_id_cat_id_zen` (`parent_id`,`sub_categories_id`),
  KEY `idx_status_zen` (`subcategories_status`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE IF NOT EXISTS `tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `products_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `customer_tax_class` varchar(100) NOT NULL,
  `product_tax_id` int(11) NOT NULL,
  `tax_rate` decimal(10,2) NOT NULL,
  `priority` int(11) NOT NULL,
  `subtotal_only` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `products_id`, `name`, `customer_tax_class`, `product_tax_id`, `tax_rate`, `priority`, `subtotal_only`, `sort_order`) VALUES
(1, 0, 'test', '', 1, '22.00', 1, 0, 1),
(2, 0, 'tax', '', 2, '22.00', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_tbl`
--

CREATE TABLE IF NOT EXISTS `testimonial_tbl` (
  `testimonial_id` int(5) NOT NULL AUTO_INCREMENT,
  `testimonial_name` varchar(200) NOT NULL,
  `testimonial_company` varchar(200) NOT NULL,
  `testimonial_position` varchar(200) NOT NULL,
  `testimonial_image` text NOT NULL,
  `testimonial_date` date NOT NULL,
  `testimonial_comment` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`testimonial_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `testimonial_tbl`
--

INSERT INTO `testimonial_tbl` (`testimonial_id`, `testimonial_name`, `testimonial_company`, `testimonial_position`, `testimonial_image`, `testimonial_date`, `testimonial_comment`, `created_date`) VALUES
(84, 'Deborah, TX', 'Nutrabean', 'TX', 'deborah.jpg', '0000-00-00', '"I am very impressed with Nutrabean, it gave me amazing energy throughout the day, and I also feel calm and focused!"', '2014-10-01 11:26:06'),
(82, 'Trevor, HI', 'Nutrabean', 'Nutrabean', 'trevor.jpg', '0000-00-00', '"I live in Hawaii and eat nutrient rich foods daily. The coffee here is amazing! I learned how coffee can affect nutrient absorption and was introduced to Nutrabean. I love how balanced and calm I feel after taking this multivitamin. I would definitely recommend it"', '2014-10-01 11:26:17'),
(83, 'Wendy, TX', 'Nutrabean', 'TX', 'mom.jpg', '0000-00-00', '\\"At my age I am glad I can count on Nutrabean to keep me going. I feel energized all day... And no longer get a caffeine crash. Truly Amazing!!!\\"', '2014-09-29 01:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `topfooter_tbl`
--

CREATE TABLE IF NOT EXISTS `topfooter_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topmenu_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `topfooter_tbl`
--

INSERT INTO `topfooter_tbl` (`id`, `topmenu_name`) VALUES
(2, 'Home'),
(3, 'Our Stores'),
(4, 'Corporate Responsibility'),
(5, 'About Us'),
(6, 'Contact Us');

-- --------------------------------------------------------

--
-- Table structure for table `top_selling_products`
--

CREATE TABLE IF NOT EXISTS `top_selling_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_of_products` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `top_selling_products`
--

INSERT INTO `top_selling_products` (`id`, `num_of_products`, `created_date`) VALUES
(1, 0, '2012-05-09 10:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(8) NOT NULL AUTO_INCREMENT,
  `transaction_date` date NOT NULL,
  `doc_type` varchar(10) NOT NULL,
  `doc_no` varchar(50) NOT NULL,
  `doc_date` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `ven_cust_code` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `uom` varchar(10) NOT NULL,
  `quantity` float(10,2) NOT NULL,
  `rate` float(10,2) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `ref_no` varchar(10) NOT NULL,
  `ref_date` date NOT NULL,
  `updated_by` int(5) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`trans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `transaction_date`, `doc_type`, `doc_no`, `doc_date`, `type`, `ven_cust_code`, `product_id`, `uom`, `quantity`, `rate`, `amount`, `ref_no`, `ref_date`, `updated_by`, `created_date`) VALUES
(6, '2012-09-21', 'GRN', '1', '2012-09-01', '', 1, 28, '333', 333.00, 333.00, 110889.00, '1233123', '2012-09-29', 1, '2012-09-22 05:19:59'),
(5, '2012-09-21', 'GRN', '1', '2012-09-01', '', 1, 12, '222', 222.00, 222.00, 49284.00, '1233123', '2012-09-29', 1, '2012-09-22 05:19:59'),
(4, '2012-09-21', 'GRN', '1', '2012-09-01', '', 1, 19, '111', 111.00, 111.00, 12321.00, '1233123', '2012-09-29', 1, '2012-09-22 05:19:59'),
(7, '2012-09-21', 'GRN', '1', '2012-09-01', '', 1, 55, '444', 444.00, 444.00, 197136.00, '1233123', '2012-09-29', 1, '2012-09-22 05:19:59'),
(11, '2012-09-21', 'GRN', '2', '2012-09-04', 'R', 20, 16, '222', 222.00, 222.00, 49284.00, '768876', '2012-09-27', 1, '2012-09-22 05:30:02'),
(10, '2012-09-21', 'GRN', '2', '2012-09-04', 'R', 20, 32, '111', 111.00, 111.00, 12321.00, '768876', '2012-09-27', 1, '2012-09-22 05:30:02'),
(13, '2012-09-24', 'GRN', '3', '2012-09-24', '', 4, 19, '7', 7.00, 7.00, 49.00, '55555', '2012-09-24', 1, '2012-09-25 00:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `urlrewrite_tbl`
--

CREATE TABLE IF NOT EXISTS `urlrewrite_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_path` text NOT NULL,
  `target_path` text NOT NULL,
  `description` text NOT NULL,
  `time_created` datetime NOT NULL,
  `time_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `urlrewrite_tbl`
--

INSERT INTO `urlrewrite_tbl` (`id`, `request_path`, `target_path`, `description`, `time_created`, `time_modified`) VALUES
(9, 'http://stickyjs.com/', 'http://stickyjs.com/', 'http://stickyjs.com/', '2014-06-03 11:13:02', '2014-06-03 20:43:02'),
(12, 'https://www.google.co.in/', 'https://www.google.com', '', '2014-05-20 10:29:56', '2014-05-20 21:59:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `user_permission` int(11) NOT NULL,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`rec_id`, `user_name`, `password`, `user_permission`) VALUES
(1, 'chandrasekar@yahoo.com', 'devarajalu', 1),
(2, 'chandrasekar@desss.com', 'madras', 2),
(3, 'emidio@housepro.net', 'housepro', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_cmsmenu_link_tbl`
--

CREATE TABLE IF NOT EXISTS `user_cmsmenu_link_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=212 ;

--
-- Dumping data for table `user_cmsmenu_link_tbl`
--

INSERT INTO `user_cmsmenu_link_tbl` (`id`, `user_id`, `menu_id`, `order_id`) VALUES
(193, 1, 1, 0),
(194, 1, 2, 0),
(195, 1, 3, 0),
(196, 1, 4, 0),
(197, 1, 5, 0),
(198, 1, 6, 0),
(199, 1, 7, 0),
(200, 1, 8, 0),
(201, 1, 9, 0),
(202, 1, 10, 0),
(203, 1, 11, 0),
(204, 1, 12, 0),
(205, 1, 13, 0),
(206, 1, 14, 0),
(207, 1, 15, 0),
(208, 1, 16, 0),
(209, 1, 17, 0),
(210, 1, 18, 0),
(211, 1, 19, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefix` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `prim_tele_phone` varchar(100) NOT NULL,
  `e_mail` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL,
  `last_updated` datetime NOT NULL,
  `zip` varchar(100) NOT NULL,
  `type` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `prefix`, `first_name`, `last_name`, `address`, `city`, `state`, `country`, `prim_tele_phone`, `e_mail`, `user_id`, `password`, `active`, `created_date`, `last_updated`, `zip`, `type`) VALUES
(1, '', 'Jayaraj', 'Ruby', '', '', '', '', '141-231-2312', 'jayaraj@desss.com', '2', 'guestJayarajRubyjayaraj@desss.com', 1, '2014-06-10 13:47:16', '2014-06-10 13:47:16', '', '1'),
(2, '', 'Sabari', 'Vassan', '', '', '', '', '787-878-7878', 'sabari@desss.com', '2', 'guestSabariVassansabari@desss.com', 1, '2014-06-11 13:08:33', '2014-06-11 13:08:33', '', '1'),
(3, '', 'Sabari', 'Vassan', '', '', '', '', '787-878-7878', 'jayaraj@desss.com', '2', 'guestSabariVassanjayaraj@desss.com', 1, '2014-06-11 15:09:38', '2014-06-11 15:09:38', '', '1'),
(4, '', 'Jayaraj', 'Vassan', '', '', '', '', '787-878-7878', 'jayaraj@desss.com', '2', 'guestJayarajVassanjayaraj@desss.com', 1, '2014-06-11 15:17:35', '2014-06-11 15:17:35', '', '1'),
(5, '', 'kumar', 'vel', 'vpm', 'chennai', '12', 'US', '454-545-4545', 'karunakaran@desss.com', 'karunakaran@desss.com', '123456789', 1, '2014-06-12 14:43:38', '2014-06-12 14:43:38', '56565', '2'),
(6, '', 'kumar', 'vel', '', '', '', '', '454-545-4545', 'karunakaran@desss.com', '2', 'guestkumarvelkarunakaran@desss.com', 1, '2014-06-12 18:36:58', '2014-06-12 18:36:58', '', '1'),
(7, '', 'fshdgh', 'dfghdh', '', '', '', '', '654-656-4564', 'test@desss.com', '2', 'guestfshdghdfghdhtest@desss.com', 1, '2014-08-12 15:45:09', '2014-08-12 15:45:09', '', '1'),
(8, '', 'Sabari', 'Vaassan', '', '', '', '', '384-394-3049', 'sabari@desss.com', '2', 'guestSabariVaassansabari@desss.com', 1, '2014-08-12 18:48:10', '2014-08-12 18:48:10', '', '1'),
(9, '', 'chandelr', 'Dev', '', '', '', '', '713-589-6496', 'dev@desss.com', '2', 'guestchandelrDevdev@desss.com', 1, '2014-08-13 06:56:19', '2014-08-13 06:56:19', '', '1'),
(10, '', 'test', 'test', '', '', '', '', '444-545-4545', 'test@desss.com', '2', 'guesttesttesttest@desss.com', 1, '2014-08-14 05:01:50', '2014-08-14 05:01:50', '', '1'),
(11, '', 'test', 'test', '', '', '', '', '121-212-1212', 'test@desss.com', '2', 'guesttesttesttest@desss.com', 1, '2014-09-19 06:01:36', '2014-09-19 06:01:36', '', '1'),
(12, '', 'chandler', 'Dev', '', '', '', '', '713-557-8001', 'dev@desss.com', '2', 'guestchandlerDevdev@desss.com', 1, '2014-09-30 09:51:02', '2014-09-30 09:51:02', '', '1'),
(13, '', 'chandrasekar', 'Dev', '', '', '', '', '713-557-8001', 'dev@desss.com', '2', 'guestchandrasekarDevdev@desss.com', 1, '2014-10-13 08:57:40', '2014-10-13 08:57:40', '', '1'),
(14, '', 'Hatem', 'Gouti', '', '', '', '', '2816502677', 'hatem.gouti@gmail.com', '2', 'guestHatemGoutihatem.gouti@gmail.com', 1, '2014-10-23 14:57:15', '2014-10-23 14:57:15', '', '1'),
(15, '', 'rajan', 'rajan', '', '', '', '', '978-717-7829', 's.rajan@desss.com', '2', 'guestrajanrajans.rajan@desss.com', 1, '2014-10-27 01:12:01', '2014-10-27 01:12:01', '', '1'),
(16, '', 'test', 'test', '', '', '', '', '232-323-2323', 'test@test.com', '2', 'guesttesttesttest@test.com', 1, '2014-10-27 02:31:26', '2014-10-27 02:31:26', '', '1'),
(17, '', 'test', 'test', '', '', '', '', '111-111-1111', 'seleniumtest.dess@gmail.com', '2', 'guesttesttestseleniumtest.dess@gmail.com', 1, '2014-10-28 00:42:54', '2014-10-28 00:42:54', '', '1'),
(18, '', 'parthi', 'ban', '', '', '', '', '656-564-1651', 'sr.parthiban@gmail.com', '2', 'guestparthibansr.parthiban@gmail.com', 1, '2014-10-29 00:44:05', '2014-10-29 00:44:05', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `us_states`
--

CREATE TABLE IF NOT EXISTS `us_states` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(25) DEFAULT NULL,
  `state_sf` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `us_states`
--

INSERT INTO `us_states` (`state_id`, `state_name`, `state_sf`) VALUES
(1, 'AK', 'AK'),
(2, 'AL', 'AL'),
(3, 'AR', 'AR'),
(4, 'AZ', 'AZ'),
(5, 'CA', 'CA'),
(6, 'CO', 'CO'),
(7, 'CT', 'CT'),
(8, 'DC', 'DC'),
(9, 'DE', 'DE'),
(10, 'FL', 'FL'),
(11, 'GA', 'GA'),
(12, 'HI', 'HI'),
(13, 'IA', 'IA'),
(14, 'ID', 'ID'),
(15, 'IL', 'IL'),
(16, 'IN', 'IN'),
(17, 'KS', 'KS'),
(18, 'KY', 'KY'),
(19, 'LA', 'LA'),
(20, 'MA', 'MA'),
(21, 'MD', 'MD'),
(22, 'ME', 'ME'),
(23, 'MI', 'MI'),
(24, 'MN', 'MN'),
(25, 'MO', 'MO'),
(26, 'MS', 'MS'),
(27, 'MT', 'MT'),
(28, 'NC', 'NC'),
(29, 'ND', 'ND'),
(30, 'NE', 'NE'),
(31, 'NH', 'NH'),
(32, 'NJ', 'NJ'),
(33, 'NM', 'NM'),
(34, 'NV', 'NV'),
(35, 'NY', 'NY'),
(36, 'OH', 'OH'),
(37, 'OK', 'OK'),
(38, 'OR', 'OR'),
(39, 'PA', 'PA'),
(40, 'RI', 'RI'),
(41, 'SC', 'SC'),
(42, 'SD', 'SD'),
(43, 'TN', 'TN'),
(44, 'TX', 'TX'),
(45, 'UT', 'UT'),
(46, 'VA', 'VA'),
(47, 'VT', 'VT'),
(48, 'WA', 'WA'),
(49, 'WI', 'WI'),
(50, 'WV', 'WV'),
(51, 'WY', 'WY'),
(52, 'AA', 'AA'),
(53, 'AE', 'AE'),
(54, 'AP', 'AP'),
(55, 'AS', 'AS'),
(56, 'FM', 'FM'),
(57, 'GU', 'GU'),
(58, 'MH', 'MH'),
(59, 'MP', 'MP'),
(60, 'PR', 'PR'),
(61, 'PW', 'PW'),
(62, 'VI', 'VI');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_tbl`
--

CREATE TABLE IF NOT EXISTS `wishlist_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1554 ;

--
-- Dumping data for table `wishlist_tbl`
--

INSERT INTO `wishlist_tbl` (`id`, `user_id`, `product_id`, `date`, `ip`) VALUES
(152, 'chithrangan.rajendran@gmail.com', 1, '2013-03-07', 'ev0h9q2ms5eh7d2isgi950ggt1'),
(129, '', 47, '2013-03-06', 'mm0ltvl1lutra6dg0v21c802i7'),
(342, '', 10, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(341, '', 9, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(340, '', 8, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(339, '', 7, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(338, '', 6, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(337, '', 5, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(336, '', 4, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(335, '', 3, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(334, '', 2, '2013-03-09', 'fkep7tjui1kr585278k1703av2'),
(333, '', 1, '2013-03-09', 'fkep7tjui1kr585278k1703av2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
