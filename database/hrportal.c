/* Processed by ecpg (14.3) */
/* These include files are added by the preprocessor */
#include <ecpglib.h>
#include <ecpgerrno.h>
#include <sqlca.h>
/* End of automatic include section */

#line 1 "D:\\HR-Portal1\\database\\hrportal.sql"


CREATE TABLE CHOICES (
  ID NUMERIC,
  SURVEY_ID NUMERIC,
  CHOICE varchar(255),
  CREATED_AT DATETIME ,
  UPDATED_AT DATETIME,
  PRIMARY KEY (ID)
);


CREATE TABLE CONTENT_TYPE (
  ID NUMERIC,
  TYPE varchar(255),
  CREATED_AT DATETIME,
  UPDATED_AT DATETIME,
  IS_DELETED NUMERIC,
  PRIMARY KEY (ID)
);


CREATE TABLE GENERAL_ANNOUNCEMENT (
  ID NUMERIC,
  TITLE varchar(255),
  CONTENT LONGTEXT,
  IMAGE varchar(100),
  CONTENT_TYPE_ID,
  CREATED_AT DATETIME,
  UPDATED_AT DATETIME,
  IS_DELETED NUMERIC,
  PRIMARY KEY (ID)
);


CREATE TABLE HMO_ANNOUNCEMENT (
  ID NUMERIC,
  TITLE varchar(255),
  CONTENT LONGTEXT,
  IMAGE varchar(100),
  CONTENT_TYPE_ID,
  CREATED_AT DATETIME,
  UPDATED_AT DATETIME,
  IS_DELETED NUMERIC,
  PRIMARY KEY (ID)
);


CREATE TABLE MEGANEWS (
  ID NUMERIC,
  TITLE varchar(255),
  CONTENT LONGTEXT,
  CONTENT2 LONGTEXT,
  QUOTE varchar(999),
  QUOTE2 varchar(999),
  IMAGE varchar(100),
  IMAGE_TITLE varchar(255),
  CONTENT_TYPE_ID,
  CREATED_AT DATETIME,
  UPDATED_AT DATETIME,
  IS_DELETED NUMERIC,
  PRIMARY KEY (ID)
);


CREATE TABLE MEGANEWS_IMAGE (
  ID NUMERIC,
  MEGANEWS_ID NUMERIC,
  IMAGE varchar(255),
  CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  UPDATED_AT DATETIME,
  IS_DELETED NUMERIC,
  PRIMARY KEY (ID)
);


CREATE TABLE MEMORANDUM (
  ID NUMERIC,
  TITLE varchar(255),
  CONTENT LONGTEXT,
  IMAGE varchar(100),
  CONTENT_TYPE_ID,
  CREATED_AT DATETIME,
  UPDATED_AT DATETIME,
  IS_DELETED NUMERIC,
  PRIMARY KEY (ID)
);


CREATE TABLE POST_TYPE (
  ID NUMERIC,
  NAME varchar(255),
  CREATED_AT DATETIME,
  UPDATED_AT DATETIME,
  PRIMARY KEY (ID)
);


CREATE TABLE SURVEY (
  ID NUMERIC,
  NAME varchar(255),
  QUESTION varchar(255),
  END_DATE DATE,
  ACTIVE NUMERIC,
  CREATED_BY varchar(255),
  CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  UPDATED_AT DATETIME,
  IS_DELETED NUMERIC,
  PRIMARY KEY (ID)
);


CREATE TABLE SURVEY_ANSWER (
  ID NUMERIC,
  SURVEY_ID NUMERIC,
  CHOICES_ID NUMERIC,
  CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP(),
  UPDATED_AT DATETIME,
  PRIMARY KEY (ID)
);


CREATE TABLE TIMELINE (
  ID NUMERIC,
  TITLE varchar(100),
  NAME varchar(255),
  IMAGE varchar(255),
  POST varchar(999),
  POST_TYPE_ID NUMERIC,
  CREATED_AT DATETIME,
  UPDATED_AT DATETIME,
  DELETED_AT TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (ID)
);


CREATE TABLE TIMELINE_COMMENTS (
  ID NUMERIC,
  TIMELINE_ID NUMERIC,
  NAME varchar(255),
  IMAGE varchar(255),
  POST varchar(999),
  POST_TYPE_ID NUMERICD_AT DATETIME,
  UPDATED_AT DATETIME,
  DELETED_AT TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (ID)
);