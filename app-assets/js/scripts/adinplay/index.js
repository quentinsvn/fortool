window.aiptag = window.aiptag || {cmd: []};
		aiptag.cmd.player = aiptag.cmd.player || [];
	// Show GDPR consent tool
	aiptag.gdprShowConsentTool = true;
	// If you use your own GDPR consent tool please set aiptag.gdprConsent = false; if an EU user has declined or not yet accepted marketing cookies, for users outside the EU or for users that accepted the GDPR please use aiptag.gdprConsent = true;

	aiptag.cmd.player.push(function() {
		adplayer = new aipPlayer({			AIP_REWARDEDCOMPLETE: function (evt)  {
				alert("Rewarded Ad Completed: " + evt);
			},			AD_WIDTH: 960,
			AD_HEIGHT: 540,
			AD_FULLSCREEN: true,
			AD_CENTERPLAYER: false,
			LOADING_TEXT: 'chargement en cours...',
			PREROLL_ELEM: function(){return document.getElementById('preroll')},
			AIP_COMPLETE: function ()  {
				/*******************
				 ***** WARNING *****
				 *******************
				 Please do not remove the PREROLL_ELEM
				 from the page, it will be hidden automaticly.
				 If you do want to remove it use the AIP_REMOVE callback.
				*/
				alert("Vous avez gagné 1 Fortcoins !");
			},
			AIP_REMOVE: function ()  {
				// Here it's save to remove the PREROLL_ELEM from the page.
				// But it's not necessary.
			}		});
	});