<?php

/* == Legal Query ============================================ */

include_once("database.php");

$legal = <<<SQL
    CREATE TABLE IF NOT EXISTS `legalSections` (
        `legalSectionID` int(11) NOT NULL AUTO_INCREMENT,
        `title` VARCHAR(140) NOT NULL,
        `blurb` text NOT NULL,
        `orderNum` int(11) NOT NULL,
        PRIMARY KEY (`legalSectionID`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;
SQL;

$legalDump = <<<SQL
    INSERT INTO `legalSections` (`legalSectionID`, `title`, `blurb`, `orderNum`) VALUES
        (1, 'Privacy Policy', '<h3>Third-party Advertisers</h3>\r\n<p>We may use third-party advertising to serve ads when you visit other websites. These companies may use information about your visits to this and other websites in order to provide advertisements that are customized to your interests and preferences. These advertisements may appear on other websites. Please note that some of the advertisers on our website and our ad service providers (including advertising network providers and third party ad servers) may deploy cookies or related technologies through their advertising banners, links or other ads. While we use cookies on parts of our site (as discussed above), information received from cookies and other technologies deployed through third party ads and links may be collected directly by those advertisers and ad service providers. The advertiser''s privacy policy and/or that of its service provider will govern the use of this information and we are not responsible for the privacy practices of such companies. Additionally, some of these companies (like the ad networks) are members of the industry group, the Network Advertising Initiative, which offers a single location to opt out of their cookies.</p>\r\n\r\n<h3>Security</h3>\r\n<p>While we strive to protect the security and integrity of the information provided to us, due to the inherent nature of the Internet as an open global communications vehicle, we cannot guarantee that information, during transmission through the Internet or while stored on our system or otherwise in our care, will be absolutely safe from intrusion by others, such as hackers.</p>\r\n<p>In the unlikely event that we believe that the security of your information in our possession or control may have been compromised, we may seek to notify you of that development. If a notification is appropriate, we would endeavor to do so as promptly as possible under the circumstances, and, to the extent we have your e-mail address, we may notify you by e-mail. Unless you provide us with another method to notify you in this situation, you consent to our use of e-mail as a means of such notification.</p>\r\n\r\n<h3>Third-party ''Linked-to'' Websites</h3>\r\n<p>Our website may contain links, banners, or widgets that lead to other sites. We are not responsible for these other sites, and so their posted privacy policies will govern the collection and use of your information on them. We encourage you to read the privacy statements of sites you visit after leaving our website to learn about how your information is treated.</p>', 1),
        (2, 'Terms & Conditions', '<p>This document describes our policy regarding information received about you during visits to our web site. The amount and type of information received depends on how you use our site.</p>\r\n            \r\n<h3>Normal Web Site Usage</h3>\r\n<p>You can visit the our web site to read product and company information without telling us who you are and without revealing any personal information. We do collect some general information during normal web site usage, like the name of your Internet service provider, the web site that referred you to us, the pages you request and the date and time of those requests. We use this information to generate statistics and measure site activity to improve the usefulness of customer visits. During normal web site usage we do not collect or store personally identifiable information such as name, mailing address, email address, phone number or social security number.</p>\r\n            \r\n<h3>Collection of Personally Identifiable Information</h3>\r\n<p>There are instances where we request personally identifiable information to provide you with a service or correspondence (promotions and mailed brochures). This information is collected and stored in a manner appropriate to the nature of the data. If you tell us that the information should not be used as a basis for further contact, we will respect your request. The information you provide is used to improve the services we provide you. It is never provided to any other company for that company&#8217;s independent use.</p>', 2);
SQL;

if(!$results = $db->query($legal)) {
    if($_SITE['ERRORS']) {
        die($db->error);
    }
}
if(!$results = $db->query($legalDump)) {
    if($_SITE['ERRORS']) {
        die($db->error);
    }
}

?>
<?php $pagename = "Legal"; ?>
<?php include("meta.php"); ?>
<?php include("header.php"); ?>
<?php 
    $query = "SELECT * FROM legalSections ORDER BY orderNum ASC";

    if(!$subnav = $db->query($query)) {
        if($_SITE['ERRORS']) {
            echo $db->error;
        }
    }

    if(!$content = $db->query($query)) {
        if($_SITE['ERRORS']) {
            echo $db->error;
        }
    }
?>
    <h1>Legal Information</h1>

	<div class="clearfix">
        <!-- Submenu -->
        <?php if($subnav->num_rows > 1) : ?>
            <ul>
                <?php while($row = $subnav->fetch_assoc()) : ?>
                    <li><a href="legal#<?php echo urlencode($row['title']; ?>"><?php echo $row['title']; ?></a></li>
                <?php endwhile ; ?>
            </ul>
        <?php endif ; ?>

        <!-- Content -->
        <div class="legal-section">
            <?php 
                while($row = $content->fetch_assoc()) {
                    echo "<h2 id='".urlencode($row['title'])."'>$row[title]</h2>";
                    echo $row['blurb'];
                }
            ?>
        </div>
    </div> <!-- /.clearfix -->

<?php include("footer.php"); ?>