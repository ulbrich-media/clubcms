#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content
(
    layout varchar(255) DEFAULT '' NOT NULL,
    clubcms_attached_content int(11) DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'pages'
#
CREATE TABLE pages
(
    teaser text,
    clubcms_logo int(11) DEFAULT '0' NOT NULL,
    clubcms_icon varchar(255) DEFAULT '' NOT NULL,

    clubcms_event_fullday tinyint(1) unsigned DEFAULT '0' NOT NULL,
	clubcms_event_start int(11) unsigned DEFAULT '0',
	clubcms_event_end int(11) unsigned DEFAULT '0',
    clubcms_event_location varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_clubcms_attached_content'
#
CREATE TABLE tx_clubcms_attached_content
(
    title varchar(255) DEFAULT '' NOT NULL,
    body text,
    icon varchar(255) DEFAULT '' NOT NULL,
    media int(11) DEFAULT '0' NOT NULL,
    target varchar(255) DEFAULT '' NOT NULL,

    tt_content int(11) DEFAULT '0' NOT NULL,
);