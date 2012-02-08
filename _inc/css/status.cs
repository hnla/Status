/*--------------------------------------------------------------
Hello, this is the Status theme stylesheet.
A large amount of these styles are adapted from the default 
BuddyPress theme. 
----------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
1.0 - Normalise - from HTML5 Boilerplate h5bp.com/css
2.0 - Structural
-2.1 - Content
-2.2 - Header
-2.3 - Footer
-2.4 - Sidebar
3.0 - Non-structural
-3.1 - Text
-3.2 - Headers
-3.3 - Lists
4.0 - Navigation
-4.1 - Pagination
5.0 - WordPress
-5.1 - Alignments
-5.2 - Comments
-5.3 - Gallery
-5.4 - Images
-5.5 - Posts
6.0 - BuddyPress
-6.1 - Activity
--6.1.1 - Activity Listing
--6.1.2 - Activity Comments
-6.2 - Admin Bar
-6.3 - Directories - Members, Groups, Blogs, Forums
-6.4 - Error / Success Messages
-6.5 - Forms
-6.6 - Ajax Loading
-6.7 - Topics and Tables - Forums and General
-6.8 - Headers, Lists and Tabs - Activity, Groups, Blogs, Forums
-6.9 - Private Messaging Threads
7.0 - Browser specific
8.0 - Media queries
--------------------------------------------------------------*/

/*--------------------------------------------------------------
1.0 - Normalise - from HTML5 Boilerplate h5bp.com/css
* What follows is the result of much research on cross-browser styling. 
* Credit left inline and big thanks to Nicolas Gallagher, Jonathan Neal,
* Kroc Camen, and the H5BP dev community and team.
*
* Detailed information about this CSS: h5bp.com/css
--------------------------------------------------------------*/
article, aside, details, figcaption, figure, footer, header, hgroup, nav, section { display: block; }
audio, canvas, video { display: inline-block; *display: inline; *zoom: 1; }
audio:not([controls]) { display: none; }
[hidden] { display: none; }
/*
 * 1. Correct text resizing oddly in IE6/7 when body font-size is set using em units
 * 2. Force vertical scrollbar in non-IE
 * 3. Prevent iOS text size adjust on device orientation change, without disabling user zoom: h5bp.com/g
 */
html { font-size: 100%; overflow-y: scroll; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
body { margin: 0; font-size: 13px; line-height: 1.231; }
body, button, input, select, textarea { font-family: sans-serif; color: #222; }
/* 
 * Remove text-shadow in selection highlight: h5bp.com/i
 * These selection declarations have to be separate
 */
 ::-moz-selection {background: #fff400;  text-shadow: none; }
::selection { background: #fff400;text-shadow: none; }
a { color: #00e; }
a:visited { color: #551a8b; }
a:hover { color: #06e; }
a:focus { outline: thin dotted; }
/* Improve readability when focused and hovered in all browsers: h5bp.com/h */
a:hover, a:active { outline: 0; }
abbr[title] { border-bottom: 1px dotted; }
b, strong { font-weight: bold; }
blockquote { margin: 1em 40px; }
dfn { font-style: italic; }
hr { display: block; height: 1px; border: 0; border-top: 1px solid #ccc; margin: 1em 0; padding: 0; }
ins { background: #ff9; color: #000; text-decoration: none; }
mark { background: #ff0; color: #000; font-style: italic; font-weight: bold; }
/* Redeclare monospace font family: h5bp.com/j */
pre, code, kbd, samp { font-family: monospace, monospace; _font-family: 'courier new', monospace; font-size: 1em; }
/* Improve readability of pre-formatted text in all browsers */
pre { white-space: pre; white-space: pre-wrap; word-wrap: break-word; }
q { quotes: none; }
q:before, q:after { content: ""; content: none; }
small { font-size: 85%; }
/* Position subscript and superscript content without affecting line-height: h5bp.com/k */
sub, sup { font-size: 75%; line-height: 0; position: relative; vertical-align: baseline; }
sup { top: -0.5em; }
sub { bottom: -0.25em; }
ul, ol { margin: 1em 0; padding: 0 0 0 40px; }
dd { margin: 0 0 0 40px; }
nav ul, nav ol { list-style: none; list-style-image: none; margin: 0; padding: 0; }
/*
 * 1. Improve image quality when scaled in IE7: h5bp.com/d
 * 2. Remove the gap between images and borders on image containers: h5bp.com/e 
 */
img { border: 0; -ms-interpolation-mode: bicubic; vertical-align: middle; }
svg:not(:root) { overflow: hidden; }
figure { margin: 0; }
form { margin: 0; }
fieldset { border: 0; margin: 0; padding: 0; }
/* Indicate that 'label' will shift focus to the associated form element */
label { cursor: pointer; }
/* 
 * 1. Correct color not inheriting in IE6/7/8/9 
 * 2. Correct alignment displayed oddly in IE6/7 
 */
legend { border: 0; *margin-left: -7px; padding: 0; }
/*
 * 1. Correct font-size not inheriting in all browsers
 * 2. Remove margins in FF3/4 S5 Chrome
 * 3. Define consistent vertical alignment display in all browsers
 */
button, input, select, textarea { font-size: 100%; margin: 0; vertical-align: baseline; *vertical-align: middle; }
/*
 * 1. Define line-height as normal to match FF3/4 (set using !important in the UA stylesheet)
 * 2. Correct inner spacing displayed oddly in IE6/7
 */
button, input { line-height: normal; *overflow: visible; }
/*
 * Reintroduce inner spacing in 'table' to avoid overlap and whitespace issues in IE6/7
 */
table button, table input { *overflow: auto; }
/*
 * 1. Display hand cursor for clickable form elements
 * 2. Allow styling of clickable form elements in iOS
 */
button, input[type="button"], input[type="reset"], input[type="submit"] { cursor: pointer; -webkit-appearance: button; }
/*
 * Consistent box sizing and appearance
 */
input[type="checkbox"], input[type="radio"] { box-sizing: border-box; }
input[type="search"] { -webkit-appearance: textfield; -moz-box-sizing: content-box; -webkit-box-sizing: content-box; box-sizing: content-box; }
input[type="search"]::-webkit-search-decoration { -webkit-appearance: none; }
/* 
 * Remove inner padding and border in FF3/4: h5bp.com/l 
 */
button::-moz-focus-inner, input::-moz-focus-inner { border: 0; padding: 0; }
textarea { overflow: auto; vertical-align: top; resize: vertical; }
/* Colors for form validity */
input:valid, textarea:valid {  }
input:invalid, textarea:invalid { background-color: #f0dddd; }
table { border-collapse: collapse; border-spacing: 0; }
td { vertical-align: top; }
/* For image replacement */
.ir { display: block; border: 0; text-indent: -999em; overflow: hidden; background-color: transparent; background-repeat: no-repeat; text-align: left; direction: ltr; }
.ir br { display: none; }
/* Hide from both screenreaders and browsers: h5bp.com/u */
.hidden { display: none !important; visibility: hidden; }
/* Hide only visually, but have it available for screenreaders: h5bp.com/v */
.visuallyhidden { border: 0; clip: rect(0 0 0 0); height: 1px; margin: -1px; overflow: hidden; padding: 0; position: absolute; width: 1px; }
/* Extends the .visuallyhidden class to allow the element to be focusable when navigated to via the keyboard: h5bp.com/p */
.visuallyhidden.focusable:active, .visuallyhidden.focusable:focus { clip: auto; height: auto; margin: 0; overflow: visible; position: static; width: auto; }
/* Hide visually and from screenreaders, but maintain layout */
.invisible { visibility: hidden; }
/* Contain floats: h5bp.com/q */ 
.clearfix:before, .clearfix:after { content: ""; display: table; }
.clearfix:after { clear: both; }
.clearfix { zoom: 1; }
/* ==|== print styles =======================================================
   Print styles.
   Inlined to avoid required HTTP connection: h5bp.com/r
   ========================================================================== */
 
@media print {
  * { background: transparent !important; color: black !important; text-shadow: none !important; filter:none !important; -ms-filter: none !important; } /* Black prints faster: h5bp.com/s */
  a, a:visited { text-decoration: underline; }
  a[href]:after { content: " (" attr(href) ")"; }
  abbr[title]:after { content: " (" attr(title) ")"; }
  .ir a:after, a[href^="javascript:"]:after, a[href^="#"]:after { content: ""; }  /* Don't show links for images, or javascript/internal links */
  pre, blockquote { border: 1px solid #999; page-break-inside: avoid; }
  thead { display: table-header-group; } /* h5bp.com/t */
  tr, img { page-break-inside: avoid; }
  img { max-width: 100% !important; }
  @page { margin: 0.5cm; }
  p, h2, h3 { orphans: 3; widows: 3; }
  h2, h3 { page-break-after: avoid; }
}

/*--------------------------------------------------------------
2.0 - Structural
--------------------------------------------------------------*/
#site-wrapper{
	padding: 0 20px;
}
#content-wrapper {
margin: 0 auto;
max-width: 1240px;
overflow: hidden;
}
.home #content-wrapper {
max-width: 550px;
padding: 0;
}
.home.logged-in #content-wrapper {
margin: 0 auto;
max-width: 1240px;
overflow: hidden;
padding: 20px 0px;
}
#content-wrapper, #header-wrapper, #friends-wrapper,
#widgets-wrapper, #footer-wrapper {
overflow: hidden;
}

/*--------------------------------------------------------------
2.1 - Content
--------------------------------------------------------------*/
#content-register {
max-width: 550px;
}
#content-register, #content, #content-404,  #content-profile, .home .status-signup {
background: #fff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
overflow: hidden;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 1em;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
margin: 0 1px 0 1px;
}
#content {
background: #fff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 0 1em 1em 1em;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
margin: 0 1px 0 1px;
}

.status-signup {
}
#content, #content-404 {
float: none;
padding: 0 1em 1em 1em;
}
#content-profile {
margin: 0;
padding: 0;
}
#content-profile #item-body{
	padding:0 1em 1em 1em;
}
.activity #content-profile #item-body{
	padding:0 0 1em 0;
}
.home .status-signup {
padding: 1em;
}
.activity #content-profile, .activity #content, .home-page #content {
margin: 0 0 1em 0;
float: none;
background: none;
border: none;
padding: 0;
box-shadow: none;
-webkit-box-shadow: none;
-moz-box-shadow: none;
}
.activity #content-profile {
margin-left: 0;
}
#profile-left {
float: none;
border-right: none;
padding: 0 1em 0 0;
}
#content-profile, #content-stream, #profile-right {
float: none;
}
#profile-right {
line-height: 28px;
}
#content-home {
margin: 1em 1em 3em 1em;
}

/*--------------------------------------------------------------
2.2 - Header
--------------------------------------------------------------*/

/*--------------------------------------------------------------
2.3 - Footer
--------------------------------------------------------------*/
footer {
clear: both;
}
#site-generator p {
margin: 0;
}
#footer {
margin: 20px 0;
}
#footer-widget {
font-size: 0.9em;
}
#site-generator {
color: #aaa;
text-shadow: -1px -1px 0px #111;
font-size: 0.9em;
}
#footer-wrapper {
width: 100%;
}
.bottom {
padding: 5px 10px;
font-size: 0.9em;
background-color: #464646;
background-image: -ms-linear-gradient(bottom,#373737,#464646 5px);
background-image: -moz-linear-gradient(bottom,#373737,#464646 5px);
background-image: -o-linear-gradient(bottom,#373737,#464646 5px);
background-image: -webkit-gradient(linear,left bottom,left top,from(#373737),to(#464646));
background-image: -webkit-linear-gradient(bottom,#373737,#464646 5px);
background-image: linear-gradient(bottom,#373737,#464646 5px);
}
#footer-wrapper a, #footer-wrapper a:link {
color: #ccc;
text-decoration: none;
}
#footer-wrapper a:visited {
color: #bbb;
}
#footer-wrapper a:focus, #footer-wrapper a:hover {
color: #fff;
text-decoration: underline;
}

/*--------------------------------------------------------------
2.4 - Sidebar
--------------------------------------------------------------*/
#sidebar {
float: none;
width: 100%;
}
#sidebar .widget {
margin: 0 1px 20px 1px;
background: #fff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 10px 15px;
overflow: hidden;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
}
#friends-loop {
color: #888;
font-size: 0.85em;
}
#friends-loop ul {
margin: 0;
padding: 0;
}

/*--------------------------------------------------------------
3.0 - Non-structural
--------------------------------------------------------------*/

/*--------------------------------------------------------------
3.1 - Text
--------------------------------------------------------------*/
body {
background-color: #f4f4f4;
background-image: url('../images/bright_squares.png');
font: 100%/1.7 Arial, sans-serif;
color: #333;
}

a, a:link {
color: #778315;
text-decoration: none;
}
a:visited {
color: #96a51a;
}
a:focus, a:hover {
color: #96a51a;
text-decoration: underline;
}

p {
margin: 0 0 10px 0;
}

p:last-child {
margin: 0;
}

hr {
background-color: #e7e7e7;
border: 0 none;
clear: both;
height: 1px;
margin: 20px 0;
}
big {
font-size: 1.2em;
}
del {
text-decoration: line-through;
}
ins {
background: #fff9db;
text-decoration: none;
}
sub {
top: .5ex;
}
sup {
bottom: 1ex;
}
sub,
sup {
height: 0;
line-height: 1;
position: relative;
vertical-align: baseline;
}
pre, blockquote {
margin-bottom: 20px;
}
pre,
code p {
background: #f4f4f4;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
padding: 15px;
overflow: auto;
}
code {
font-family: "Monaco", courier, sans-serif;
}
blockquote {
font-style: italic;
line-height: 150%;
padding: 0 3em;
quotes: none;
color: #888;
}

/*--------------------------------------------------------------
3.2 - Headers
--------------------------------------------------------------*/
h1 {
font-size: 1.8em;
}
h2 {
font-size: 1.6em;
}
h3 {
font-size: 1.4em;
}
h4 {
font-size: 1.2em ;
}
h5 {
font-size: 1.1em;
}
h6 {
font-size: 1em;
}

#item-header-content h2, .status-signup h2 {
margin: 0 0 10px 0;
font-weight: 700;
}
#new-topic-post h4 {
margin: 0;
padding: 0;
}
#sidebar h3,#topic-meta h3 {
margin: 0;
}

ul#members-list h5, ul#member-list h5, ul#blogs-list h5, ul#blog-list h5, ul#admins-list h5, ul#admin-list h5, 
ul#groups-list h5, ul#group-list h5 {
margin: 0;
}
/*--------------------------------------------------------------
3.3 - Lists
--------------------------------------------------------------*/
div.page ul,
div.page ol,
div.page dl,
div.post ul,
div.post ol,
div.post dl {
margin: 0 0 18px 1.5em;
}
div.page ul,
div.post ul {
list-style: square;
}
div.page ol,
div.post ol {
list-style: decimal;
}
div.page ol ol,
div.post ol ol {
list-style: lower-alpha;
}
div.page ol ol ol,
div.post ol ol ol {
list-style: lower-roman;
}
dl {
margin-left: 0;
}
dt {
font-weight: bold;
}
dd {
margin: 0 0 15px 0;
}
div.post ul ul,
div.post ol ol,
div.post ol ul,
div.post ul ol,
div.page ul ul,
div.page ol ol,
div.page ol ul,
div.page ul ol {
margin-bottom: 0px;
}

/*--------------------------------------------------------------
4.0 - Navigation
--------------------------------------------------------------*/
nav ul, .looplist, .item-list-tabs ul {
list-style: none;
padding-left: 0;
}
nav {
float: left;
}
#nav li {
font-size: 0.9em;
margin-left: 10px;
padding-top: 5px;
}
.item-list-tabs li, nav ul li {
display: inline;
display: inline-block;
}


/*--------------------------------------------------------------
4.1 - Pagination
--------------------------------------------------------------*/
div.pagination {
background: #f4f4f4;
border: none;
color: #888;
font-size: 0.8em;
height: 35px;
margin: 20px 0;
padding: 10px 20px 0 20px;
}

ul#members-list, ul#blogs-list {
margin: 10px 0;
padding: 0;
}

ul#members-list .item {
margin: 0 0 10px 70px;
}

ul#members-list li {
border-bottom: 1px solid #eee;
margin-bottom: 10px;
padding: 10px 0;
list-style: none;
}

div.pagination .pag-count {
float: left;
}
div.pagination .pagination-links {
float: right;
}
div.pagination .pagination-links span,
div.pagination .pagination-links a {
font-size: 0.9em;
padding: 0 5px;
}
div.pagination .pagination-links a:hover {
font-weight: 700;
}
#nav-above {
display: none;
}
.paged #nav-above {
display: block;
}

/*--------------------------------------------------------------
5.0 - WordPress
--------------------------------------------------------------*/
.post{
	border-bottom: 1px solid #eee;
	margin-bottom:10px;
}


/*--------------------------------------------------------------
5.1 - Alignments
--------------------------------------------------------------*/

.alignright {
float: right;
margin-left: 15px;
}
.alignleft {
float: left;
margin-right: 15px;
}
.aligncenter {
display: block;
margin-left: auto;
margin-right: auto;
}
.gap {
margin-top: 20px;
}
/*--------------------------------------------------------------
5.2 - Comments
--------------------------------------------------------------*/
.navigation,
.paged-navigation,
.comment-navigation {
overflow: hidden;
font-size: 0.9em;
font-style: italic;
margin: 5px 0 25px 0;
padding: 5px 0;
}
.comments {
float: right;
}
#trackbacks {
margin-top: 30px;
}
.commentlist .bypostauthor {
background: #fffef2;
}
#comments {
margin-top: 30px;
}
#comments ol.commentlist {
border-bottom: 1px solid #ddd;
margin: 0 0 30px 0;
padding: 0;
}
#comments ol.commentlist ol {
list-style-type: decimal;
margin: 0 0 18px 2.5em;
}
#comments ol.commentlist ol ol {
list-style: lower-alpha;
margin-bottom: 0;
}
#comments ol.commentlist ol ol ol {
list-style: lower-roman;
}
ol.commentlist li.comment {
border-top: 1px solid #e4e4e4;
clear: left;
list-style: none;
margin-bottom: 15px;
padding: 10px;
}
ol.commentlist ul.children li {
margin-bottom: 0;
}
ol.commentlist div.comment-avatar-box {
float: left;
margin: 15px 15px 0 0;
}
.commentlist ul.children div.comment-avatar-box {
float: left;
margin: 0 10px 0 0;
}
div.comment-avatar-box img {
border: 2px solid #eee;
}
div.comment-content {
overflow: hidden;
}
ul.children .comment-entry {
margin-bottom: 10px;
}
div.comment-meta {
color: #888;
font-size: 0.8em;
margin: 15px 0;
width: 100%;
}
div.comment-meta em {
font-style: normal;
}
#reply-title {
margin-top: 0;
}
#reply-title small {
float: right;
font-size: 11px;
font-weight: normal;
}
#reply-title small a {
margin-right: 0;
}
.commentlist ul.children {
margin: 15px 0 15px 70px;
padding: 0 10px;
}
.commentlist ul.children ul {
margin: 0 0 0 25px;
padding-right: 0;
}
.commentlist ul.children img.avatar {
background: #ffffff;
border-bottom: 1px solid #ccc;
border-left: 1px solid #fff;
border-right: 1px solid #ccc;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 2px;
height: 25px;
margin: 0;
width: 25px;
}
.commentlist ul.children div.comment-meta {
font-size: 0.9em;
margin: 0 0 10px 0;
}
.commentlist ul.children li {
border-top: 2px solid #fffeff;
padding-top: 10px;
}
.commentlist ul.children li:first-child {
border-top: none;
}
.commentlist ul.children ul li:first-child {
border-top: 2px solid #fffeff;
}
#respond {
background-color: #fafafa;
border: 1px solid #e5e5e5;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 15px;
clear: both;
}
#respond .avb img {
float: inherit;
}
#respond .comment-avatar-box {
float: left;
margin: 0 15px 0 0;
}
#respond .form-submit {
margin-bottom: 0;
}
ol.commentlist #respond {
clear: left;
margin-left: 70px;
}
.commentlist ul.children #respond {
margin-bottom: 10px;
margin-left: 35px;
margin-right: 20px;
}
#respond div.comment-content {
border-style: none;
}
#nav-below {
margin: 0 0;
padding: 0 0;
}
#nav-above {
margin: 0 0 15px;
padding: 0;
}
.comment-options {
margin: 10px 0 2px;
}
.comment-options .comment-reply-link,
.comment-options .comment-edit-link {
margin-right: 5px;
padding: 0;
font-size: 0.9em;
}
.commentlist ul.children div.comment-options {
margin-bottom: 10px;
}

/*--------------------------------------------------------------
5.3 - Gallery
--------------------------------------------------------------*/
.wp-caption {
background-color: #f3f3f3;
border: 1px solid #ddd;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
margin-bottom: 15px;
padding-top: 4px;
text-align: center;
}
.wp-caption img {
border: 0 none;
margin: 0;
padding: 0;
}
dd.wp-caption p.wp-caption-text,
.wp-caption p.wp-caption-text {
font-size: 0.9em;
line-height: 17px;
margin: 0;
padding: 5px 4px 5px 0;
}
#content .gallery {
margin: 0 auto 15px;
}
#content .gallery .gallery-item {
margin-bottom: 0;
margin-left: 0;
}
.gallery-item img {
margin-bottom: 15px;
}
.gallery .gallery-caption {
color: #555;
}

/*--------------------------------------------------------------
5.4 - Images
--------------------------------------------------------------*/
img {
width: auto !important;
max-width: 100%;
}
img.avatar {
background: #ffffff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 2px;
float: left;
}
img.wp-smiley {
border: none !important;
clear: none !important;
float: none !important;
margin: 0 !important;
padding: 0 !important;
}
img.centered,
img.aligncenter {
display: block;
margin-left: auto;
margin-right: auto;
}
img.alignright {
display: inline;
margin: 0 0 2px 7px;
padding: 4px;
}
img.alignleft {
display: inline;
margin: 0 7px 2px 0;
padding: 4px;
}

/*--------------------------------------------------------------
5.5 - Posts
--------------------------------------------------------------*/
table {
width: 100%;
text-align: left;
}
.post-header {
margin-left: 120px;
}
.post-content{
	clear:both;
}
div.page,
div.post,
div.attachment {
margin: 0 0 15px 0;
overflow: hidden;
}
div.page:last-child,
div.post:last-child,
#item-body:last-child,
#trackbacklist {
margin-bottom: 0;
}
h2.posttitle, h2.pagetitle {
line-height: 120%;
margin: 0;
}
h2.pagetitle a,
h2.posttitle a {
color: #666;
text-decoration: none;
}
.edit-link,
.page-link {
clear: both;
font-weight: bold;
}
div.post table,
div.page table {
border: 1px solid #eee;
border-collapse: collapse;
border-spacing: 0;
margin-bottom: 15px;
}
div.post table th,
div.page table th {
border-top: 1px solid #eee;
text-align: left;
}
div.post table td,
div.page table td {
border-top: 1px solid #eee;
}
div.author-box {
background: #f0f0f0;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
float: left;
font-style: italic;
margin: 0 15px 15px 0;
padding: 10px;
text-align: center;
width: 70px;
}
div.author-box p {
word-wrap: break-word;
}
div.author-box p,
div.comment-avatar-box p {
margin: 5px 0 0;
}
div.author-box a,
div.comment-avatar-box a {
text-decoration: none;
}
div.author-box img {
float: none;
border: 4px solid #fff;
margin: 0;
}
div.post-content {
margin-left: 105px;
}
p.date span:first-child {
font-style: italic;
}
div.post .entry {
margin-bottom: 15px;
}
p.date,
p.postmetadata {
border-bottom: 1px solid #e4e4e4;
border-top: 1px solid #e4e4e4;
color: #888;
margin: 10px 0;
padding: 3px 0;
}
p.postmetadata {
clear: left;
overflow: hidden;
}
.page .tags,
.post .tags {
float: left;
}
span.sticky-post {
font-style: normal;
}
.post-format {
background: #f0f0f0;
color: #888;
float: right;
margin: 10px 0 0 10px;
padding: 10px;
font-size: 0.8em;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
}
.post-info {
padding: 0 0 10px 0;
color: #888;
font-style: italic;
font-size: 0.9em;
}
.post-meta {
padding: 10px 0;
margin-bottom: 10px;
overflow: hidden;
}
/*--------------------------------------------------------------
6.0 - BuddyPress
--------------------------------------------------------------*/
/*--------------------------------------------------------------
6.1 - Activity
--------------------------------------------------------------*/
#whats-new-declare {
margin: 0 0 20px 0;
width: 100%;
min-height: 100px;
}

.groups #whats-new-declare {
border-bottom: 1px solid #ddd;
border-right: none;
border-top: none;
border-left: none;
margin: 0;
padding: 0 0 20px 0;
}
	
#whats-new-avatar {
float: left;
width: 80px;
}
ul.item-list.activity-list li {
padding: 10px;
}

#whats-new-avatar img {
padding: 2px;
margin: 10px 12px;
background: #fff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
margin-left: 10px;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
}

#whats-new-wrapper {
margin-left: 80px;
}

#whats-new-tail {
background: url('../images/speech-tail.png') 0 15px no-repeat;
height: 50px;
width: 42px;
float: left;
}
#whats-new-textarea {
margin-left: 40px;
padding: 15px;
background: #fff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
}
#what-new-content {
clear: both;
}
#whats-new-textarea textarea {
height: 40px;
border: 1px solid #eee;
border-radius: 3px;
-moz-border-radius: 3px;
-khtml-border-radius: 3px;
-webkit-border-radius: 3px;
width: 97%!important;
}
#whats-new-options {
float: right;
padding-top: 10px;
}
#whats-new-submit {
float: right;
}
#whats-new-post-in-box {
float: right;
margin-right: 10px;
padding: 4px 10px;
background: white;
border-right: 1px solid #ddd;
border-bottom: 1px solid #ddd;
border-top: 1px solid #eee;
border-left: 1px solid #eee;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
font-size: 0.8em;
color: #888;
}

#activity-show {
padding: 8px 10px;
background: white;
border-right: 1px solid #ddd;
border-bottom: 1px solid #ddd;
border-top: 1px solid #eee;
border-left: 1px solid #eee;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
font-size: 0.8em;
overflow: hidden;
color: #888;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
margin: 0 1px 0 1px;
}

#activity-show #subnav {
float: right
}

#activity-show .activity-type-tabs {
float: left;
}

#activity-show li {
margin: 0 10px 0 10px;
}

#activity-show #subnav ul {
margin: 0;
}

#activity-filter-select {
float: right;
}
li.feed {
float: left;
padding-top: 10px;
}

/*--------------------------------------------------------------
6.1.1 - Activity Listing
--------------------------------------------------------------*/
.activity-list li {
list-style: none;
}
.activity-entry, .activity-comment {
clear: both;
background: #fff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
margin-left: 0 1px 20px 10px;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
overflow: hidden;
padding: 10px;
}

.groups .activity-entry, .groups .activity-comment {
background: rgba(0, 0, 0, 0.024);
-moz-box-shadow: none;
-webkit-box-shadow: none;
box-shadow: none;
border-bottom: 1px solid #dddddd;
border-right: none;
border-top: none;
border-left: none;
}

.groups-activity .activity-entry, .groups-activity  .activity-comment {
clear: both;
background: #fff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
margin-left: 0 1px 20px 10px;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
overflow: hidden;
padding: 10px;
}

.activity-entry:hover {
background: #fffeee;
}
.acomment-avatar {
float: left;
margin: 0 20px 0 0;
}
.activity-avatar img {
background: #ffffff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 2px;
}
ul#activity-stream, ul#groups-list {
margin: 0;
padding: 0;
}
.item-list li {
list-style: none;
}
.activity-inner {
clear: right;
padding-bottom: 0 0 10px 0;
margin-top: 0;
}
.activity-header {
font-size: 0.8em;
float: left;
}
.activity-header p {
margin-top: 0;
padding-top: 0;
}
.activity-details {
overflow: hidden;
}

.activity-inreplyto {
color: #999;
font-size: 0.9em;
}

a.delete-activity, a.delete-activity-single, a.acomment-delete {
background: url('../images/icons.png') 0px -96px no-repeat;
padding: 2px 0 0 20px;
margin-right: 8px;
opacity: 0.3;
}

a.acomment-reply {
background: url('../images/icons.png') 0px -16px no-repeat;
padding: 2px 0 0 20px;
margin-right: 8px;
opacity: 0.3;
}
a.fav, a.unfav {
background: url('../images/icons.png') 0px -56px no-repeat;
padding: 2px 0 0 20px;
margin-right: 8px;
opacity: 0.3;
}

a:hover.acomment-reply {
background: url('../images/icons.png') 0px 3px no-repeat;
padding: 2px 0 0 20px;
margin-right: 8px;
opacity: 1;
}
a:hover.unfav, a:hover.fav {
background: url('../images/icons.png') 0px -36px no-repeat;
padding: 2px 0 0 20px;
margin-right: 8px;
opacity: 1;
}
a:hover.delete-activity, a:hover.delete-activity-single, a:hover.acomment-delete {
background: url('../images/icons.png') 0px -76px no-repeat;
padding: 2px 0 0 20px;
margin-right: 8px;
opacity: 1;
}

/*--------------------------------------------------------------
6.1.2 - Activity Comments
--------------------------------------------------------------*/
.activity-meta, .acomment-options {
font-size: 0.8em;
}
.activity-comments {
clear: both;
}

.activity-comments>ul {
	background: #F7F7F7;
	border-top: 1px solid #DDD;
	margin: 10px 0 0 0;
	padding: 0;
	font-size: 0.9em;
}
div.activity-comments form.ac-form {
background: #f7f7f7;
border-top: 1px solid #fff;
display: none;
margin: 10px 0 0 0;
padding: 10px;
clear: both;
}
div.activity-comments li form.ac-form {
margin: 10px 0 0;
clear: both;
}
div.activity-comments form.root {
margin-left: 0;
}
div.activity-comments div#message {
margin-top: 15px;
margin-bottom: 0;
}
div.activity-comments form.loading {
background-image: url( ../images/ajax-loader.gif );
background-position: 2% 95%;
background-repeat: no-repeat;
}
div.activity-comments form .ac-textarea {
background: #fff;
border: 1px solid #ccc;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
margin-bottom: 10px;
padding: 8px;
width: 97%;
}
div.activity-comments form textarea {
border: none;
color: #555;
height: 60px;
padding: 0;
width: 100%;
}
div.activity-comments form input {
margin-top: 5px;
}
div.activity-comments form div.ac-reply-avatar {
float: left;
}
div.ac-reply-avatar img {
background: #ffffff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 2px;
}
div.activity-comments form div.ac-reply-content {
color: #888;
font-size: 0.8em;
margin-left: 50px;
padding-left: 15px;
}
.activity-comments li {
border-bottom: none;
padding: 10px 0 10px 0;
}

/*--------------------------------------------------------------
6.2 - Admin Bar
--------------------------------------------------------------*/
#wpadminbar {
direction: ltr;
color: #ccc;
font: normal 13px/28px sans-serif;
height: auto!important;
min-width: 250px;
top: 0;
left: 0;
width: 100%;
min-width: none;
z-index: 99999;
background-color: #464646;
background-image: -ms-linear-gradient(bottom,#373737,#464646 5px);
background-image: -moz-linear-gradient(bottom,#373737,#464646 5px);
background-image: -o-linear-gradient(bottom,#373737,#464646 5px);
background-image: -webkit-gradient(linear,left bottom,left top,from(#373737),to(#464646));
background-image: -webkit-linear-gradient(bottom,#373737,#464646 5px);
background-image: linear-gradient(bottom,#373737,#464646 5px);
}
/*--------------------------------------------------------------
6.3 - Directories - Members, Groups, Blogs, Forums
--------------------------------------------------------------*/
ul#member-list , 
ul#admins-list, 
ul#blog-list {
margin: 0;
padding: 0;
}
/*--------------------------------------------------------------
6.4 - Error / Success Messages
--------------------------------------------------------------*/
div#message {
margin: 10px 0;
}
#message.info {
margin-bottom: 0;
}
div#message.updated {
clear: both;
}
div#message p {
font-size: 12px;
display: block;
padding: 10px 15px;
}
div#message.error p {
background-color: #cc2233;
border-color: #62101d;
clear: left;
color: #fff;
}
div#message.updated p {
background-color: #96a51a;
border-color: #5d6610;
color: #fff;
}
.standard-form#signup_form div div.error {
background: #cc2233;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
color: #fff;
margin: 0 0 10px 0;
padding: 6px;
width: 90%;
}
div.accept,
div.reject {
float: left;
margin-left: 10px;
}
ul.button-nav li {
float: left;
margin: 0 10px 10px 0;
}
ul.button-nav li.current a {
font-weight: bold;
}
#item-header #message {
	clear:both;
margin: 0;
padding-top:10px;
}
/*--------------------------------------------------------------
6.5 - Forms
--------------------------------------------------------------*/
#content-profile textarea, #content-profile input[type="text"]{
	width:97%;
}
#status-default fieldset {
margin: 1.1em 0;
}
#status-default legend {
font-weight: bold;
font-size: 1.2em;
}
input[type="text"],input[type="email"],input[type="password"],
textarea {
padding: 0.5em;
background: #fff;
border: 1px solid #ddd;
-moz-border-radius: 5px;
-khtml-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
-webkit-transition: border linear 0.2s, box-shadow linear 0.2s;
-moz-transition: border linear 0.2s, box-shadow linear 0.2s;
-ms-transition: border linear 0.2s, box-shadow linear 0.2s;
-o-transition: border linear 0.2s, box-shadow linear 0.2s;
transition: border linear 0.2s, box-shadow linear 0.2s;
-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
-moz-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
}

input:required, textarea:required {
background: none;
}
input:invalid, textarea:invalid {
border: 1px solid #960606;
}

#signup_form input[type="text"],#signup_form input[type="email"],#signup_form input[type="password"],
#signup_form textarea {
padding: 0.5em;
background: #fff;
border: 1px solid #ddd;
-moz-border-radius: 5px;
-khtml-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
width: 95%;
}

.standard-form input[type="text"],.standard-form input[type="email"],.standard-form input[type="password"],
.standard-form textarea {
width: 95%;
}

.standard-form label, #members-directory-form label {
font-weight: 700;
color: #555;
}

#members-directory-form label, #forums-order-select label, #blogs-directory-form label, #blogs-order-select label {
float: left;
margin-right: 10px;
vertical-align: middle;
}
.standard-form {
line-height: 40px;
padding: 10px;
background: #f9f9f9;
border: 1px solid #eee;
overflow: hidden;
margin: 20px 0px;
}
.form-allowed-tags{
	line-height:1.7;
}
form .editfield{
	border-top: 1px solid #DDD;
	padding: 10px 0;
}
form.design input[type="text"]{
	max-width: 100px;
}
ul.button-nav{
	margin: 0;
	padding: 0;
	overflow: hidden;
	background: #EEE;
	padding: 5px 20px 0 20px;
	list-style: none;
}
.clear-value, .submit input[type="submit"], .submitbutton, #blogs-directory-form input[type="submit"], .submitbutton, #members-directory-form input[type="submit"], .form-submit #submit, #signup_submit, #submit, #searchsubmit, .standard-form input[type="submit"], .activity-comments input[type="submit"] {
    cursor: pointer;
    display: inline-block;
    background-color: #e6e6e6;
    background-repeat: no-repeat;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), color-stop(25%, #ffffff), to(#e6e6e6));
    background-image: -webkit-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
    background-image: -moz-linear-gradient(top, #ffffff, #ffffff 25%, #e6e6e6);
    background-image: -ms-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
    background-image: -o-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
    background-image: linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
    padding: 5px 14px 6px;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    color: #333;
    line-height: normal;
    border: 1px solid #ccc;
    border-bottom-color: #bbb;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    -webkit-transition: 0.1s linear all;
    -moz-transition: 0.1s linear all;
    -ms-transition: 0.1s linear all;
    -o-transition: 0.1s linear all;
    transition: 0.1s linear all;
}
input:focus, textarea:focus {
    border-color: rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(0, 0, 0, 0.6);
    -moz-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(0, 0, 0, 0.6);
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1), 0 0 8px rgba(0, 0, 0, 0.6);
}

.dir-search {
background: #f3f3f3;
border: 1px solid #eeeeee;
padding: 10px;
}
.submit:hover input[type="submit"], .submitbutton:hover #blogs-directory-form input[type="submit"], .submitbutton:hover, #members-directory-form input[type="submit"]:hover, .form-submit #submit:hover, #signup_submit:hover, #submit:hover, #searchsubmit:hover, .standard-form input[type="submit"]:hover, .activity-comments input[type="submit"]:hover {
    background-position: 0 -15px;
    color: #333;
    text-decoration: none;
}

div.submit {
margin: 10px 0 0 0;
}

.label {
margin-top: 10px;
}

.input {
border: 1px solid #bbb;
background: #fff;
padding: 2px 5px;
color: #999;
box-shadow: inset 0 1px 0 #eee,#fff 0 1px 0;
-webkit-box-shadow: inset 0 1px 0 #eee,#fff 0 1px 0;
-moz-box-shadow: inset 0 1px 0 #eee,#fff 0 1px 0;
-moz-border-radius: 3px;
-khtml-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
}

#signup-login {
border-right: none;
width: 100%;
float: none;
padding: 0;
}

#signup-register {
float: none;
width: 100%;
}
.standard-form #blog-details-section {
clear: left;
}
.standard-form input:focus,
.standard-form textarea:focus,
.standard-form select:focus {
background: #fafafa;
}
form#send-invite-form {
margin-top: 20px;
}
div#invite-list {
background: #f3f3f3;
border: 1px solid #eee;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
height: 400px;
margin: 0 0 10px;
overflow: auto;
padding: 5px;
width: 160px;
}
ul#members-list .small .button {
margin-left: 10px;
}
select {
padding: 2px 4px;
line-height: 40px;
border: 1px solid #ccc;
background: white;
margin-left: 10px;
font-size: 1em;
color: #666;
}
/*--------------------------------------------------------------
6.6 - Ajax Loading
--------------------------------------------------------------*/
ul li.loading a {
background-image: url( ../images/ajax-loader.gif );
background-position: 92% 50%;
background-repeat: no-repeat;
padding-right: 30px !important;
}
div#item-nav ul li.loading a {
background-position: 88% 50%;
}
a.loading,
input.loading {
background-image: url( ../images/ajax-loader.gif );
background-position: 95% 50%;
background-repeat: no-repeat;
padding-right: 25px;
}
a.loading:hover,
input.loading:hover {
background-image: url( ../images/ajax-loader.gif );
background-position: 95% 50%;
background-repeat: no-repeat;
padding-right: 25px;
color: #777;
}

.activity-list li.load-more {
    cursor: pointer;
    text-align:center;
    background-color: #e6e6e6;
    background-repeat: no-repeat;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), color-stop(25%, #ffffff), to(#e6e6e6));
    background-image: -webkit-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
    background-image: -moz-linear-gradient(top, #ffffff, #ffffff 25%, #e6e6e6);
    background-image: -ms-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
    background-image: -o-linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
    background-image: linear-gradient(#ffffff, #ffffff 25%, #e6e6e6);
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff', endColorstr='#e6e6e6', GradientType=0);
    padding: 5px 14px 6px;
    text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
    color: #333;
    line-height: normal;
    border: 1px solid #ccc;
    border-bottom-color: #bbb;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
    -webkit-transition: 0.1s linear all;
    -moz-transition: 0.1s linear all;
    -ms-transition: 0.1s linear all;
    -o-transition: 0.1s linear all;
    transition: 0.1s linear all;
	font-size: 0.9em;
	font-weight: bold;
	margin: 10px 0;
}

.activity-list li.load-more:hover {
    background-position: 0 -15px;
    color: #333;
    text-decoration: none;
}

/*--------------------------------------------------------------
6.7 - Topics and Tables - Forums and General
--------------------------------------------------------------*/
ul#topic-post-list {
margin: 0;
}
#topic-post-list {
background: #ffffff;
padding: 10px;
}
#topic-post-list .post-content {
margin: 0;
}
table {
width: 100%;
}
table thead tr {
background: #eaeaea;
}
table#message-threads {
margin: 0;
width: auto;
}
table td.thread-avatar {
width: 9%;
}
table.profile-fields {
margin-bottom: 20px;
}
table.profile-fields:last-child {
margin-bottom: 0;
}
table.profile-fields p {
margin-top: 15px;
}
table.profile-fields p:last-child {
margin-top: 0;
}
div#sidebar table {
margin: 0;
width: 100%;
}
table tr td,
table tr th {
padding: 8px;
vertical-align: middle;
}
table tr td.label {
border-right: 1px solid #eee;
font-weight: bold;
width: 25%;
}
table tr td.thread-info p {
margin: 0;
}
table tr td.thread-info p.thread-excerpt {
color: #888;
font-size: 0.9em;
margin-top: 3px;
}
div#sidebar table td,
table.forum td {
text-align: center;
}
table tr.alt td {
background: #f5f5f5;
}
table.notification-settings {
margin-bottom: 20px;
text-align: left;
}
#groups-notification-settings {
margin-bottom: 0;
}
table.notification-settings th.icon,
table.notification-settings td:first-child {
display: none;
}
table.notification-settings th.title {
width: 80%;
}
table.notification-settings .yes,
table.notification-settings .no {
text-align: center;
width: 40px;
}
table.forum {
margin: 0;
width: auto;
}
table.forum tr.sticky td {
font-size: 1.2em;
background: #fffeee;
border-top: 1px solid #fff9db;
border-bottom: 1px solid #fff9db;
}
table.forum tr.closed td.td-title {
background-image: url( ../images/closed.png );
background-position: 15px 50%;
background-repeat: no-repeat;
padding-left: 35px;
}
table.forum td p.topic-text {
color: #888;
font-size: 0.9em;
}
table.forum tr > td:first-child,
table.forum tr > th:first-child {
padding-left: 15px;
}
table.forum tr > td:last-child,
table.forum tr > th:last-child {
padding-right: 15px;
}
table.forum tr th#th-title,
table.forum tr th#th-poster,
table.forum tr th#th-group,
table.forum td.td-poster,
table.forum td.td-group,
table.forum td.td-title {
text-align: left;
}
table.forum tr td.td-title a.topic-title {
font-size: 1.2em;
}
table.forum td.td-freshness {
white-space: nowrap;
}
table.forum td.td-freshness span.time-since {
font-size: 0.9em;
color: #888;
}
table.forum td img.avatar {
float: none;
margin: 0 5px 0 0;
}
table.forum td.td-poster,
table.forum td.td-group {
min-width: 140px;
}
table.forum th#th-title {
width: 80%;
}
table.forum th#th-freshness {
width: 25%;
}
table.forum th#th-postcount {
width: 15%;
}
table.forum p.topic-meta {
font-size: 0.9em;
margin: 5px 0 0 0;
}

/*--------------------------------------------------------------
6.8 - Headers, Lists and Tabs - Activity, Groups, Blogs, Forums
--------------------------------------------------------------*/
#content-profile-headerfull #item-header {
margin: 20px 0px 30px 0px;
overflow: hidden;
text-decoration: none;
background: #f9f9f9;
font-size: 0.9em;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 10px 20px;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
}
#item-nav {
overflow: hidden;
padding: 0;
background-color: #464646;
background-image: -ms-linear-gradient(bottom,#373737,#464646 5px);
background-image: -moz-linear-gradient(bottom,#373737,#464646 5px);
background-image: -o-linear-gradient(bottom,#373737,#464646 5px);
background-image: -webkit-gradient(linear,left bottom,left top,from(#373737),to(#464646));
background-image: -webkit-linear-gradient(bottom,#373737,#464646 5px);
background-image: linear-gradient(bottom,#373737,#464646 5px);
font-size: 0.9em;
margin-bottom: 30px;
text-shadow: -1px -1px 0px #111;
box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-moz-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
-webkit-box-shadow: 0 0 2px rgba(0, 0, 0,0.1);
}
.home #item-nav{
	margin-bottom:0;
}
.home #subnav{
	margin-bottom:20px;
}
#item-nav li{
	border-right: 1px solid #555;
}
#item-nav li, #subnav li{
	padding: 5px 20px;
}

#item-nav li:hover{
	background: #333;
}
#subnav li{
	border-right: 1px solid #ddd;
}
#subnav li:hover{
	background: #f9f9f9;
}
#item-nav a{
	color: #fff;
}
#item-nav a:hover{
	text-decoration:none;
	color: #ccc;
}
#item-nav ul{
	margin:  0;
}
#item-header-avatar {
float: left;
margin-right: 10px;
}
#item-header-avatar img {
background: #fff;
border-bottom: 1px solid #ddd;
border-left: 1px solid #fff;
border-right: 1px solid #ddd;
border-top: 1px solid #fff;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
padding: 2px;
}
.item-list li {
border-top: 1px solid #ddd;
margin: 0 1px 10px 1px;
padding: 0 0 10px 0;
}
.item-body {
margin: 20px 0;
}
span.activity {
display: inline-block;
font-size: 0.9em;
opacity: 0.8;
padding: 1px 8px;
}
span.user-nicename {
display: inline-block;
font-weight: 700;
}
span.activity,
div#message p {
border: 1px solid #e1ca82;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
font-weight: 400;
margin-top: 3px;
text-decoration: none;
background: #ffeaa6;
}
div#item-header {
overflow: hidden;
margin-top: 10px;
}
div#item-header h2 a {
text-decoration: none;
}
div#item-header img.avatar {
float: left;
margin: 5px 10px 10px 0;
}
div#item-header h2 {
margin-bottom: 5px;
}
div#item-header span.activity,
div#item-header h2 span.highlight {
font-size: 0.9em;
font-weight: 400;
line-height: 170%;
margin-bottom: 7px;
vertical-align: middle;
}

div#item-header h2 span.highlight span {
background: #a1dcfa;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
color: #fff;
cursor: pointer;
font-weight: bold;
font-size: 0.9em;
margin-bottom: 2px;
padding: 1px 4px;
position: relative;
right: -2px;
top: -2px;
vertical-align: middle;
}

div#item-header div#item-actions {
float: right;
margin: 0 0 15px 10px;
text-align: left;
}
div#item-header div#item-actions h3 {
margin: 0 0 5px 0;
}
div#item-header ul {
overflow: hidden;
margin: 2px 0;
padding: 0;
}
div#item-header ul h5,
div#item-header ul span,
div#item-header ul hr {
display: none;
}
div#item-header ul img.avatar,
div#item-header ul.avatars img.avatar {
height: 30px;
margin: 2px;
width: 30px;
}
div#item-header div.generic-button,
div#item-header a.button {
float: left;
margin: 10px 10px 10px 0;
}
#forum-topic-form ul {
margin: 0;
}
div#item-header div#message.info {
line-height: 80%;
}

ul.single-line li {
border: none;
}
ul.item-list li {
position: relative;
}
ul.item-list li img.avatar {
float: left;
margin: 0 10px 10px 0;
}
ul.item-list li div.item-title,
ul.item-list li h4 {
font-weight: normal;
margin: 0;
width: 75%;
}
ul.item-list li div.item-title span {
color: #999;
font-size: 0.9em;
}
ul.item-list li div.item-desc {
color: #888;
font-size: 0.9em;
margin: 10px 0 0 64px;
width: 50%;
}
ul.item-list li div.action {
float: right;
text-align: right;
font-size: 0.8em;
position: absolute;
top: 0;
right: 0;
}
ul.item-list li div.meta {
color: #888;
font-size: 0.9em;
margin-top: 10px;
}
ul.item-list li h5 span.small {
float: right;
font-size: 0.8em;
font-weight: normal;
}
#group-admins li {
list-style: none;
}
div.item-list-tabs#object-nav {
margin-top: 0;
}
div.item-list-tabs#subnav {
	margin-top:10px;
	background-color: #eee;
	border: 1px solid #ddd;
	font-size: 0.9em;
}
#subnav ul{
	margin: 0px;
}
div.item-list-tabs ul li.feed a {
background: url( ../images/rss.png ) center left no-repeat;
padding-left: 20px;
}
#admins-list li {
overflow: auto;
}
div.profile h4 {
margin-bottom: auto;
margin-top: 15px;
}

/*--------------------------------------------------------------
6.9 - Private Messaging Threads
--------------------------------------------------------------*/
table#message-threads tr.unread td {
background: #fff9db;
border-top: 1px solid #ffe8c4;
border-bottom: 1px solid #ffe8c4;
font-weight: bold;
}
li span.unread-count,
tr.unread span.unread-count {
background: #dd0000;
border-radius: 3px;
-khtml-border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #fff;
font-weight: bold;
padding: 2px 8px;
}
div.item-list-tabs ul li a span.unread-count {
padding: 1px 6px;
color: #fff;
}
div.messages-options-nav {
background: #eee;
font-size: 11px;
margin: 0;
padding: 5px 15px;
text-align: right;
}
div#message-thread div.message-box {
margin: 0;
padding: 15px;
}
div#message-thread div.alt {
background: #f4f4f4;
}
div#message-thread p#message-recipients {
margin: 10px 0 20px 0;
}
div#message-thread img.avatar {
float: left;
margin: 0 10px 0 0;
vertical-align: middle;
}
div#message-thread strong {
margin: 0;
}
div#message-thread strong a {
text-decoration: none;
}
div#message-thread strong span.activity {
margin: 4px 0 0 10px;
}
div#message-thread div.message-metadata {
overflow: hidden;
}
div#message-thread div.message-content {
margin-left: 45px;
}
div#message-thread div.message-options {
text-align: right;
}

/*--------------------------------------------------------------
7.0 - Browser specific
--------------------------------------------------------------*/

/*--------------------------------------------------------------
8.0 - Media queries
--------------------------------------------------------------*/
@media only screen and (min-width:960px) {
#profile-left {
	margin-right: 3%;
	float: left;
	min-height: 1px;
	width: 65%;
	border-right: 1px dashed #aaa;
}
#profile-right {
	float: right;
	min-height: 1px;
	width: 30%;
}
#content-profile {
	margin-right: 3%;
	float: left;
	min-height: 1px;
	width: 73.8%;
}
#sidebar {
width: 23.1%;
float: right;
min-height: 1px;
}
#content{
	margin-right: 3%;
	float: left;
	min-height: 1px;
	width: 71%;
}
.activity #content-profile {
	margin-right: 3%;
	float: left;
	min-height: 1px;
	width: 74%;
}
	
.activity #content, .home-page #content {
	margin-right: 3%;
	float: left;
	min-height: 1px;
	width: 74%;
}
	
#content-home {
position: absolute;
top: 50%;
left: 50%;
width: 550px;
height: 350px;
margin-top: -200px;
margin-left: -250px;
}
#signup-login {
border-right: 1px dashed #bbb;
width: 45%;
float: left;
padding: 0 1.5em 0 0;
}
#signup-login-full {
border-right: 1px dashed #bbb;
width: 100%;
float: left;
padding: 0 30px 0 0;
}
#signup-register {
float: right;
width: 45%;
}
#content-wrapper {
	margin: 0 auto;
	max-width: 1240px;
	overflow: hidden;
	padding: 20px 0px 40px 0px;
	overflow: hidden;
}
.home.logged-in #content-wrapper {
	margin: 0 auto;
	max-width: 1240px;
	overflow: hidden;
padding: 30px 0px 40px 0px;
}
#activity-filter-select {
float: right;
}

#content-profile-headerfull #activity-filter-select, #forums-order-select {
float: right;
}
#footer-wrapper {
position: fixed;
bottom: 0;
width: 100%;
}
#wpadminbar {
position: fixed;
}

}
