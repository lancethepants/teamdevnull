
USE 3750-09devnull;


DROP TABLE if exists USER;

CREATE TABLE USER
(
	UserID						smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	UserCategoryID				smallint					NOT NULL				,
	UserLogin					varchar(20)					NOT NULL				,
	UserPassword				varchar(20)					NOT NULL				,
	UserChallengeQuestion		varchar(50)					NOT NULL				,
	UserChallengeQuestionAnswer	varchar(50)					NOT NULL
);

DROP TABLE if exists USERCATEGORY;

CREATE TABLE USERCATEGORY
(
	UserCategoryID				smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	UserCategoryDesc			varchar(10)					NOT NULL
);

DROP TABLE if exists USERDETAIL;

CREATE TABLE USERDETAIL
(
	UserDetailID				smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	UserID						smallint					NOT NULL				,
	UserDetailFirst				varchar(20)					NOT NULL				,
	UserDetailLast				varchar(20)					NOT NULL				,
	UserDetailCity				varchar(20)					NOT NULL				,
	UserDetailHomePhone			varchar(20)					NOT NULL				,
	UserDetailEmail				varchar(30)											,
	UserDetailMobilePhone		varchar(20)											,
	UserDetailMobileSMS			bit(1)												,
	DegreeCategoryID			smallint											,
	MobileProviderCategoryID	smallint											,
	CampusCategoryID			smallint											,
	ReferralCategoryID			smallint
);

DROP TABLE if exists DEGREECATEGORY;

CREATE TABLE DEGREECATEGORY
(
	DegreeCategoryID			smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	DegreeCategoryDesc			varchar(30)					NOT NULL
);

DROP TABLE if exists MOBILEPROVIDERCATEGORY;

CREATE TABLE MOBILEPROVIDERCATEGORY
(
	MobileProviderCategoryID	smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	MobileProviderCategoryDesc	varchar(30)					NOT NULL
);

DROP TABLE if exists CAMPUSCATEGORY;

CREATE TABLE CAMPUSCATEGORY
(
	CampusCategoryID			smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	CampusCategoryDesc			varchar(30)					NOT NULL
);

DROP TABLE if exists REFERRALCATEGORY;

CREATE TABLE REFERRALCATEGORY
(
	ReferralCategoryID			smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	ReferralCategoryDesc		varchar(30)					NOT NULL
);

DROP TABLE if exists TEXTBOOKLIST;

CREATE TABLE TEXTBOOKLIST
(
	TextBookListID				smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	TextBookListStatus			bit(1)						NOT NULL				,
	TextBookListTitle			varchar(20)					NOT NULL				,
	TextBookListAuthor			varchar(20)					NOT NULL				,
	TextBookListISBN			varchar(20)					NOT NULL				,
	TextBookListSemester		varchar(20)					NOT NULL				,
	TextBookListCourse			varchar(20)					NOT NULL				,
	TextBookListNotes			varchar(100)
);

DROP TABLE if exists ADVISORAPPOINTMENT;

CREATE TABLE ADVISORAPPOINTMENT
(
	AdvisorAppointmentID		smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	AdvisorAppointmentName		varchar(50)					NOT NULL				,
	AdvisorAppointmentEmail		varchar(30)					NOT NULL				,
	AdvisorAppointmentDate1		datetime					NOT NULL				,
	AdvisorAppointmentDate2		datetime					NOT NULL				,
	AdvisorAppointmentDate3		datetime					NOT NULL				,
	AdvisorAppointmentDesc		varchar(200)				NOT NULL				,
	AdvisorAppointmentAdvisor	varchar(50)											,
	AdvisorAppointmentAccepted	bit(1)
);

DROP TABLE if exists HELPFULLINK;

CREATE TABLE HELPFULLINK
(
	HelpfullLinkID				smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	HelpfullLinkDesc			varchar(100)				NOT NULL				,
	HelpfullLinkURL				varchar(50)					NOT NULL				,
	HelpfullLinkLinkActive		bit(1)						NOT NULL
);

DROP TABLE if exists TESTIMONIAL;

CREATE TABLE TESTIMONIAL
(
	TestimonialID				smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	TestimonialStatus			bit(1)						NOT NULL				,
	TestimonialAuthor			varchar(20)					NOT NULL				,
	TestimonialMessage			varchar(200)
);

DROP TABLE if exists JOBPOSTING;

CREATE TABLE JOBPOSTING
(
	JobPostingID				smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	JobPostingStatus			bit(1)						NOT NULL				,
	JobPostingJob				varchar(50)					NOT NULL				,
	JobPostingURL				varchar(50)					NOT NULL				,
	JobPostingDesc				varchar(100)
);

DROP TABLE if exists FAQS;

CREATE TABLE FAQS
(
	FaqsID						smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	FaqsQuestion				varchar(100)				NOT NULL				,
	FaqsAnswer					varchar(200)				NOT NULL
);

DROP TABLE if exists ANNOUNCEMENT;

CREATE TABLE ANNOUNCEMENT
(
	AnnouncementID				smallint	AUTO_INCREMENT	NOT NULL	PRIMARY KEY	,
	AnnouncementStatus			bit(1)						NOT NULL				,
	AnnouncementPriority		smallint					NOT NULL				,
	AnnouncementExpiresDate		datetime					NOT NULL				,
	AnnouncementMessage			varchar(200)
);