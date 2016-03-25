<?php
function get_theme_options_styles() {

	$output = '

/***************Top Margin *******************/
.logo h1 { ';
// Get padding
	if ( $contentpadding = of_get_option( 'of_content_padding' ) ) {
		$output .= 'padding-bottom:' . $contentpadding . 'px;';
	} else {
		$output .= 'padding-bottom:35px;';
	}
	$output .= '
}

.logo h1 { ';
// Get padding
	if ( $logopadding = of_get_option( 'of_logo_padding' ) ) {
		$output .= 'padding-top:' . $logopadding . 'px;';
	} else {
		$output .= 'padding-top:35px;';
	}
	$output .= '
}

/*******************BG Image*******************/
body {
';
	if ( $backgroundimage = of_get_option( 'of_background_image' ) ) {
		$output .= 'background-image:url(' . $backgroundimage . ');';
	} else {
		if ( $backgroundtexture = of_get_option( 'of_texture_bg' ) ) {
			if ( $backgroundtexture != 'none' ) {
				$output .= 'background-image:url(' . $backgroundtexture . ');';
			}
		}
	}
	$output .= '
background-repeat:repeat;
background-position:center top;
}
/*******************BG Color*******************/
body {
';
	if ( $backgroundcolor = of_get_option( 'of_background_color' ) ) {
		$output .= 'background-color:' . $backgroundcolor . ';';
	} else {
		$output .= 'background-color: #fff;';
	}
	$output .= '
}

/*******************Layout Mode*******************/
';
	if ( $layoutmode = of_get_option( 'of_layout_option' ) ) {
		if ( $layoutmode == 'boxed' ) {
			$output .= '
		.sitecontainer {
		padding: 0 25px;
		background: #fff;
		box-shadow: 0 0 30px rgba(0,0,0,.1);
		-moz-box-shadow: 0 0 30px rgba(0,0,0,.1);
		-webkit-box-shadow: 0 0 30px rgba(0,0,0,.1);
		}
		/* Get Rid of Padding on Boxed Layout*/
		@media only screen and (max-width: 342px) {

		.sitecontainer {
		padding:0 !important;
		box-shadow: none;
		-moz-box-shadow:none;
		-webkit-box-shadow: none;
		}
		body {
		background:#fff !important;
		}
		}

		/*  Portrait size to standard 960 (devices and browsers) */
		@media only screen and (min-width: 959px) and (max-width: 1009px) {
		.sitecontainer {
		padding:0 !important;
		box-shadow: none;
		-moz-box-shadow:none;
		-webkit-box-shadow: none;
		}
		body {
		background:#fff !important;
		}
		}
		/* Mobile Landscape Size to Portrait (devices and browsers) */
		@media only screen and (min-width: 767px) and (max-width: 805px) {
		.sitecontainer {
		padding:0 !important;
		box-shadow: none;
		-moz-box-shadow:none;
		-webkit-box-shadow: none;
		}
		body {
		background:#fff !important;
		}
		}
	';
		}
	}
	$output .= '


/****************Button Colors***********************/

.button:hover, a.button:hover, span.more-link a:hover, .cancel-reply p a:hover {

';
// Get Button Color
	if ( $buttonhover = of_get_option( 'of_button_hover_color' ) ) {
		$output .= 'background:' . $buttonhover . '!important;';
	}
	$output .= '
color:#fff;
}

.button, a.button, span.more-link a.more-link, #footer .button, #footer a.button, #footer span.more-link a.more-link, .cancel-reply p a {

';

// Get Button Color
	if ( $buttoncolor = of_get_option( 'of_button_color' ) ) {
		$output .= 'background:' . $buttoncolor . ';';
	}
	$output .= '
color:#fff;
}
.summary, .rating.stars, .rating.points, .rating.percent, .scorebar,
.categories a:hover, .tagcloud a, .single .categories a, .single .sidebar .categories a:hover,
.tabswrap ul.tabs li a.active, .tabswrap ul.tabs li a:hover, #footer .tabswrap ul.tabs li a:hover, #footer .tabswrap ul.tabs li a.active, .sf-menu li a:hover, .sf-menu li.sfHover a,
.pagination a.button.share:hover, #commentsubmit #submit, #cancel-comment-reply-link  {
';
// Get Highlight Color
	if ( $highlight = of_get_option( 'of_highlight_color' ) ) {
		$output .= 'background:' . $highlight . ';';
	}
	$output .= '
color:#fff !important;
}

blockquote, .tabswrap .tabpost a:hover, .articleinner h2 a:hover, span.date a:hover {
';

// Get Highlight Color
	if ( $highlight ) {
		$output .= 'color:' . $highlight . ' !important;';
	}
	$output .= '
}

h3.pagetitle, h1.pagetitle, .pagetitlewrap span.description {
';
// Get Highlight Color
	if ( $highlight ) {
		$output .= 'border-color:' . $highlight . ';';
	}
	$output .= '
}

/****************Link Colors***********************/
p a, a {
';

// Get Link Color
	if ( $linkcolor = of_get_option( 'of_link_color' ) ) {
		$output .= 'color:' . $linkcolor . ';';
	}
	$output .= '
}

h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, p a:hover,
#footer h1 a:hover, #footer h2 a:hover, #footer h3 a:hover, #footer h3 a:hover, #footer h4 a:hover, #footer h5 a:hover, a:hover, #footer a:hover, .blogpost h2 a:hover, .blogpost .smalldetails a:hover {
';
// Get Link Hover Color
	if ( $linkhover = of_get_option( 'of_link_hover_color' ) ) {
		$output .= 'color:' . $linkhover . ';';
	}
	$output .= '
}

/****************Selection Colors***********************/
::-moz-selection {
';

	if ( $highlight = of_get_option( 'of_highlight_color' ) ) {
		$output .= 'background:' . $highlight . '; color:#fff;';
	}
	$output .= '
}

::selection {
';
	if ( $highlight = of_get_option( 'of_highlight_color' ) ) {
		$output .= 'background:' . $highlight . '; color:#fff;';
	}
	$output .= '
}

::selection {
';
	if ( $highlight = of_get_option( 'of_highlight_color' ) ) {
		$output .= 'background:' . $highlight . '; color:#fff;';
	}
	$output .= '
}

.recent-project:hover {
';
// Get heading font choices
	if ( $linkhover = of_get_option( 'of_link_hover_color' ) ) {
		$output .= 'border-color:' . $linkhover . ' !important;';
	}
	$output .= '
}
/***************Typographic User Values *********************************/

h1, h2, h1 a, h2 a, .blogpost h2 a, h3, .ag_projects_widget h3, h3 a, .aj_projects_widget h3 a, .ajax-select ul.sf-menu a, .pagination .button, .nivo-caption h3.title {
';

// Get heading font choices
	if ( $headingfont = of_get_option( 'of_heading_font' ) ) {

		$output .= 'font-family:"' . $headingfont['face'] . '", arial, sans-serif;';

		if ( $headingfont['style'] == 'bold italic' ) {
			$output .= 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
		} else if ( $headingfont['style'] == 'bold' ) {
			$output .= 'font-weight: bold;';
		} else {
			$output .= 'font-weight:' . $headingfont['style'] . ';';
		}

		$output .= 'text-transform:' . $headingfont['style2'] . ';';

	}
	$output .= '
}

h5, h5 a, .widget h3, .widget h2, .widget h4, .reviewbox h4, .reviewbox .score span, .ajax-select a#news_select, .authorposts h4, .widget h4.widget-title {
';
// Get tiny font option
	if ( $tinyfont = of_get_option( 'of_tiny_font' ) ) {
		$output .= 'font-family:"' . $tinyfont['face'] . '", arial, sans-serif;';

		if ( $tinyfont['style'] == 'bold italic' ) {
			$output .= 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
		} else if ( $tinyfont['style'] == 'bold' ) {
			$output .= 'font-weight: bold;';
		} else {
			$output .= 'font-weight:' . $tinyfont['style'] . ';';
		}

		$output .= 'text-transform:' . $tinyfont['style2'] . ' !important;';

	}
	$output .= '
}

h4, h4 a, .footer .note h4, .footer h4.subheadline, .newspost h4, .paginationbutton .button, .articleinner h2.indextitle, .widget .articleinner h2.indextitle, .articleinner h2.indextitle a, .widget artileinner h2.indextitle a {
';


// Get subfont option
	if ( $secondaryfont = of_get_option( 'of_secondary_font' ) ) {
		$output .= 'font-family:"' . $secondaryfont['face'] . '", arial, sans-serif;;';

		if ( $secondaryfont['style'] == 'bold italic' ) {
			$output .= 'font-weight:bold !important; font-style:italic !important;'; // If Bold Italic, Do Separate CSS Calls
		} else if ( $secondaryfont['style'] == 'bold' ) {
			$output .= 'font-weight: bold !important;';
		} else {
			$output .= 'font-weight:' . $secondaryfont['style'] . ';';
		}

		$output .= 'text-transform:' . $secondaryfont['style2'] . ' !important;';

	}
	$output .= '
}

.sf-menu a, .ajax-select ul.sf-menu li li a  {
';
// Get nav option
	if ( $sffont = of_get_option( 'of_nav_font' ) ) {
		$output .= 'font-family:"' . $sffont['face'] . '", arial, sans-serif;';

		if ( $sffont['style'] == 'bold italic' ) {
			$output .= 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
		} else if ( $sffont['style'] == 'bold' ) {
			$output .= 'font-weight: bold;';
		} else {
			$output .= 'font-weight:' . $sffont['style'] . ';';
		}

		$output .= 'text-transform:' . $sffont['style2'] . ';';

	}
	$output .= '
font-size:13px;
}

body, input, p, ul, ol, .button, .ui-tabs-vertical .ui-tabs-nav li a span.text,
.footer p, .footer ul, .footer ol, .footer.button, .credits p,
.credits ul, .credits ol, .credits.button, .footer textarea, .footer input, .testimonial p,
.contactsubmit label, .contactsubmit input[type=text], .contactsubmit textarea, h2 span.date, .articleinner h1,
.articleinner h2, .articleinner h3, .articleinner h4, .articleinner h5, .articleinner h6, .nivo-caption h1,
.nivo-caption h2, .nivo-caption h3, .nivo-caption h4, .nivo-caption h5, .nivo-caption h6, .nivo-caption h1 a,
.nivo-caption h2 a, .nivo-caption h3 a, .nivo-caption h4 a, .nivo-caption h5 a, .nivo-caption h6 a,
#cancel-comment-reply-link {
';


// Get paragraph option
	if ( $pfont = of_get_option( 'of_p_font' ) ) {
		$output .= 'font-family:"' . $pfont['face'] . '", arial, sans-serif;';

		if ( $pfont['style'] == 'bold italic' ) {
			$output .= 'font-weight:bold; font-style:italic;'; // If Bold Italic, Do Separate CSS Calls
		} else if ( $pfont['style'] == 'bold' ) {
			$output .= 'font-weight: bold;';
		} else {
			$output .= 'font-weight:' . $pfont['style'] . ';';
		}

		$output .= 'text-transform:' . $pfont['style2'] . ';';

	}
	$output .= '
}

';
	if ( $sidebar = of_get_option( 'of_sidebar_width' ) ) {
		if ( $sidebar == 'extended' ) {
			$output .= '
		.sidebar {
		width: 300px;
		}
		.maincontent {
		width: 624px;
		}
		.one_col {
		width: 296px;
		}
		#isonormal {
		width: 652px;
		}
		.fullarticle .thumbnailarea {
			width:304px;
		}
		.fullcontent {
			width:300px;
		}

		/*  Portrait size to standard 960 (devices and browsers) */
		@media only screen and (min-width: 768px) and (max-width: 959px) {

		.articlecontainer.nonfeatured, .maincontent {
		width: 423px;
		}
		.nonfeatured .one_col {
		width: 420px;
		}
		#isonormal {
		width: 445px;
		}
		.fullcontent {
		width: 100%;
		}
		#fullcolumn .thumbnailarea {
		width: 420px;
		}
		}

		/* All Mobile Sizes (devices and browser) */
		@media only screen and (max-width: 767px) {
		.maincontent, .sidebar, .fullcontent, #fullcolumn .thumbnailarea {
		width:100%;
		}
		#isonormal {
		width: 436px;
		}

		}

		@media only screen and (max-width: 479px) {
		 #isonormal {
	         width:300px;
	     }
		}';
		}
	}

	return $output;
}
