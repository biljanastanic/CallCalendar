/*
*	-----------------------------------------------------------------------------
*	cmakFollowUS
*  - Create and customize RSS feeds of new products
*	 - Add feeds to meta alternate in html header
*	 - Create and customize links to social networks
*  - Display a customized block with feed and links to social networks
* 
*	Copyright (C) 2012 www.cmak.fr
*	You can freely use this script in your Web pages.
*	You may adapt this script for your own needs, provided these opening credit
*	lines are kept intact.

* Social Icon Pack  from komodomedia.com
* 
*	The cmakFollowUS script is distributed free
*	For updates, please visit:
*	http://www.cmak.fr/
* http://cmakfollowus.googlecode.com/
*
*	Questions & comments please send to cmak.fr (at) gmail.com
*	-----------------------------------------------------------------------------
*/

function linkDelete(id, message)
{
	if (confirm(message)) document.location.replace(currentUrl+'&delid='+id+'&token='+token);
}

function rssDelete(id, message)
{
	if (confirm(message)) document.location.replace(currentUrl+'&delid='+id+'&token='+token);
}

function moveUp(id)
{
 	document.location.replace(currentUrl+'&moveupid='+id+'&token='+token);
}

function moveDown(id)
{
 	document.location.replace(currentUrl+'&movedownid='+id+'&token='+token);
}

function linkEdit(id)
{
	rssFormReset();
 	getE('linkId').value = id;
 	getE('linkUrl').value = liste[id][1];
 	getE('linkNewWindow').checked = (liste[id][3] == 1);
	var beg = parseInt(getE('languageFirst').value);
 	for (var i = 0; i < parseInt(getE('languageNb').value); i++) {
 		getE('linkTitleInput_'+ (1 + i)).value = liste[id][i + 11];
 	}
	getE('linkImage').value = liste[id][2];
	getE('simgLink').src = linkImages[liste[id][2]][0];
	getE('imgLink').src = linkImages[liste[id][2]][1];
	getE('submitLinkUpdate').disabled = false;
 	getE('submitLinkUpdate').setAttribute('class', 'button');
 	getE('submitLinkAdd').disabled = 'true';
 	getE('submitLinkAdd').setAttribute('class', 'button disable');
 	/* ##### IE */
 	getE('submitLinkUpdate').setAttribute('className', 'button');
 	getE('submitLinkAdd').setAttribute('className', 'button disable');
	var xy = $('#linkField').position();
	window.scrollTo(xy.left, xy.top);
}

function rssEdit(id)
{
	linkFormReset();
 	getE('rssId').value = id;
	getE('rssImage').value = liste[id][2];
	getE('simgRss').src = rssImages[liste[id][2]][0];
	getE('imgRss').src = rssImages[liste[id][2]][1];
 	getE('rssNewWindow').checked = (liste[id][3] == 1);
	getE('rssnMax').value = liste[id][4];
	getE('rssLang').value = liste[id][5];
	getE('rssDisPrice').checked = (liste[id][6] == 1);
	getE('rssCurrencyId').value = liste[id][7];
	getE('rssAgregator').value = liste[id][8];
	getE('rssUseAgregator').checked = (liste[id][8] != '');
	getE('rssShowInBlock').checked = (liste[id][9] == 1);
	getE('rssShowAsAlternate').checked = (liste[id][10] == 1);

	var beg = parseInt(getE('languageFirst').value);
 	for (var i = 0; i < parseInt(getE('languageNb').value); i++) {
 		getE('rssTitleInput_'+ (1 + i)).value = liste[id][i + 11];
 	}
	getE('submitRssUpdate').disabled = false;
 	getE('submitRssUpdate').setAttribute('class', 'button');
 	getE('submitRssAdd').disabled = 'true';
 	getE('submitRssAdd').setAttribute('class', 'button disable');
 	/* ##### IE */
 	getE('submitRssUpdate').setAttribute('className', 'button');
 	getE('submitRssAdd').setAttribute('className', 'button disable');
	var xy = $('#rssField').position();
	window.scrollTo(xy.left, xy.top);

}

function rssFormReset()
{
	getE('submitRssUpdate').disabled=true;
	getE('submitRssAdd').disabled=false;
	getE('submitRssUpdate').setAttribute('class', 'button disable');
	getE('submitRssAdd').setAttribute('class', 'button');
 	/* ##### IE */
 	getE('submitRssUpdate').setAttribute('className', 'button');
 	getE('submitRssAdd').setAttribute('className', 'button disable');
	getE('rssForm').reset();
	getE('simgRss').src = rssImage0[0];
	getE('imgRss').src = rssImage0[1];
}

function linkFormReset()
{
	getE('submitLinkUpdate').disabled=true;
	getE('submitLinkAdd').disabled=false;
	getE('submitLinkUpdate').setAttribute('class', 'button disable');
	getE('submitLinkAdd').setAttribute('class', 'button');
 	/* ##### IE */
 	getE('submitLinkUpdate').setAttribute('className', 'button');
 	getE('submitLinkAdd').setAttribute('className', 'button disable');
	getE('linkForm').reset();
	getE('simgLink').src = linkImage0[0];
	getE('imgLink').src = linkImage0[1];

}

