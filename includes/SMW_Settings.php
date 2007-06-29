<?php

###
# This is the path to your installation of Semantic MediaWiki as
# seen from the web. Change it if required ($wgScriptPath is the
# path to the base directory of your wiki). No final slash.
##
$smwgScriptPath = $wgScriptPath . '/extensions/SemanticMediaWiki';
##

###
# This is the path to your installation of Semantic MediaWiki as
# seen on your local filesystem. Used against some PHP file path
# issues.
##
$smwgIP = $IP . '/extensions/SemanticMediaWiki';
##

// load global functions
require_once('SMW_GlobalFunctions.php');

###
# If you already have custom namespaces on your site, insert
# $smwgNamespaceIndex = ???;
# into your LocalSettings.php *before* including this file.
# The number ??? must be the smallest even namespace number
# that is not in use yet. However, it must not be smaller
# than 100.
##
if (!isset($smwgNamespaceIndex)) {
	smwfInitNamespaces(100);
} else {
	smwfInitNamespaces();
}

###
# This setting allows you to select in which cases you want to have a factbox
# appear below an article. The default setting is "SMW_FACTBOX_NONEMPTY"
# which shows only those factboxes that have some content. Other options:
##
$smwgShowFactbox = SMW_FACTBOX_NONEMPTY;
//$smwgShowFactbox = SMW_FACTBOX_HIDDEN; # hide always
//$smwgShowFactbox = SMW_FACTBOX_SHOWN; # show always, buggy and not recommended
##

###
# Number results shown in the listings on pages of properties (attributes or
# relations) and types.
##
$smwgTypePagingLimit = 200; // same as for categories
$smwgPropertyPagingLimit = 25; // use smaller value since property lists are much longer
##

###
# Settings for inline queries (<ask>) and for semantic queries in general.
# Especially meant to prevent overly high server-load by complex queries.
##
$smwgIQEnabled = true; // (De)activates all query related features
$smwgIQDefaultLinking = 'subject'; // Default linking behaviour. Can be one of "none", "subject", "all"
$smwgIQSearchNamespaces = array(NS_MAIN, NS_IMAGE); // Which namespaces should be searched by default? 
 // Value NULL switches off default restrictions on searching (faster)
$smwgIQMaxConditions = 50; // Max number of "conditions" (e.g. value or category conditions in a query)
$smwgIQMaxTables = 10;     // Max number of "joins" in a query. Restricts nesting depth of queries.
$smwgIQMaxPrintout = 10;   // Max number of supported printouts (added columns in result table, * statements)
$smwgIQSubQueriesEnabled = true; //(De)activates subqueries (<q>-Syntax), use $smwgIQMaxTables for limiting them
$smwgIQMaxLimit = 10000;     // Max number of results ever retrieved, even when using special query pages.
$smwgIQMaxInlineLimit = 500; // Max number of rows printed in an inline query on a single page.
$smwgIQDefaultLimit = 50;    // Default number of rows returned in a query. Can be increased with <ask limit="num">...
$smwgIQDisjunctiveQueriesEnabled = true; // Support disjunctions in queries (||)?
$smwgIQSubcategoryInclusions = 10; // Restrict level of sub-category inclusion (steps within category hierarchy)
 // Use 0 to disable hierarchy-inferencing in queries
$smwgIQRedirectNormalization = true; // Should redirects be interpreted as equivalence between page names?
$smwgIQSortingEnabled = true; // (De)activate sorting of results.
##

###
# Settings for RDF export
##
$smwgAllowRecursiveExport = false; // can normal users request recursive export?
$smwgExportBacklinks = true; // should backlinks be included by default?
$smwgExportSemanticRelationHierarchy = false; // should subrelations be exported with or wo semantics?
// as long as the underlying implementation does not support the semantics the export
// should reflect the same.
##

###
# Overwriting the following array, you can define for which namespaces
# the semantic links and annotations are to be evaluated. On other
# pages, annotations can be given but are silently ignored. This is
# useful since, e.g., talk pages usually do not have attributes and
# the like. In fact, is is not obvious what a meaningful attribute of
# a talk page could be. Pages without annotations will also be ignored
# during full RDF export, unless they are referred to from another
# article.
##
$smwgNamespacesWithSemanticLinks = array(
	              NS_MAIN => true,
	              NS_TALK => false,
	              NS_USER => true,
	         NS_USER_TALK => false,
	           NS_PROJECT => true,
	      NS_PROJECT_TALK => false,
	             NS_IMAGE => true,
	        NS_IMAGE_TALK => false,
	         NS_MEDIAWIKI => false,
	    NS_MEDIAWIKI_TALK => false,
	          NS_TEMPLATE => false,
	     NS_TEMPLATE_TALK => false,
	              NS_HELP => true,
	         NS_HELP_TALK => false,
	          NS_CATEGORY => true,
	     NS_CATEGORY_TALK => false,
	      SMW_NS_RELATION => true,
	 SMW_NS_RELATION_TALK => false,
	     SMW_NS_ATTRIBUTE => true,
	SMW_NS_ATTRIBUTE_TALK => false,
	          SMW_NS_TYPE => true,
	     SMW_NS_TYPE_TALK => false
);
##



// some default settings which usually need no modification

###
# Use another storage backend for Semantic MediaWiki. Use SMW_STORE_TESTING
# to run tests without modifying your database at all.
##
define('SMW_STORE_MWDB',1); // uses the MediaWiki database, needs initialisation via Special:SMWAdmin.
define('SMW_STORE_TESTING',2); // dummy store for testing
$smwgDefaultStore = SMW_STORE_MWDB;
##

###
# Set the following value to "true" if you want to enable support
# for semantic annotations within templates. For the moment, this
# will only work if after minor change in your MediaWiki files --
# see INSTALL for details. Enabling this is necessary for normal
# operation.
##
$smwgEnableTemplateSupport = true;
##

###
# Setting this to true allows to translate all the labels within
# the browser GIVEN that they have interwiki links.
##
$smwgTranslate = false;

###
# -- FEATURE IS DISABLED --
# If you want to import ontologies, you need to install RAP,
# a free RDF API for PHP, see
#     http://www.wiwiss.fu-berlin.de/suhl/bizer/rdfapi/
# The following is the path to your installation of RAP
# (the directory where you extracted the files to) as seen
# from your local filesystem. Note that ontology import is
# highly experimental at the moment, and may not do what you
# extect.
##
//$smwgRAPPath = $smwgIP . '/libs/rdfapi-php';
//$smwgRAPPath = '/another/example/path/rdfapi-php';
##


