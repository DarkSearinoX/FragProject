/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var jmolApplet0; // set up in HTML table, below
var Info;

;(function() {

// logic is set by indicating order of USE -- default is HTML5 for this test page, though
var use = "HTML5"//"JAVA HTML5 IMAGE" // WEBGL only by request by link below.
var s = document.location.search;


// Developers: The debugCode flag is checked in j2s/java/core.z.js, 
// and, if TRUE, skips loading the core methods, forcing those
// to be read from their individual directories. Set this
// true if you want to do some code debugging by inserting
// System.out.println, document.title, or alert commands
// anywhere in the Java or Jmol code.

Jmol.debugCode = (s.indexOf("debugcode") >= 0);

//if (s.indexOf("?") < 0) s = "USE=HTML5"

if (s.indexOf("USE=") >= 0)
  use = s.split("USE=")[1].split("&")[0]
else if (s.indexOf("JAVA") >= 0)
  use = "JAVA"
else if (s.indexOf("IMAGE") >= 0)
  use = "IMAGE"
else if (s.indexOf("NOWEBGL") >= 0)
  use = "JAVA IMAGE"
else if (s.indexOf("WEBGL") >= 0)
  use = "WEBGL HTML5"
if (s.indexOf("NOWEBGL") >= 0)
  use = use.replace(/WEBGL/,"")
var useSignedApplet = (s.indexOf("SIGNED") >= 0);
if(useSignedApplet && use == "HTML5") use = "JAVA";

jmol_isReady = function(applet) {
	document.title = (applet._id + " is ready")
	Jmol._getElement(applet, "appletdiv").style.border="1px solid blue"
 
}		


Info = {
	width: 300,
	height: 300,
	debug: false,
	color: "0xF0F0F0",
	addSelectionOptions: true,
	serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/jsmol.php",
	use: use,
  //language: "fr", // NOTE: LOCALIZATION REQUIRES <meta charset="utf-8"> (see JSmolCore Jmol.featureDetection.supportsLocalization)
	jarPath: "java",
	j2sPath: "j2s",
	jarFile: (useSignedApplet ? "JmolAppletSigned.jar" : "JmolApplet.jar"),
	isSigned: useSignedApplet,
	disableJ2SLoadMonitor: true,
	disableInitialConsole: true,
	readyFunction: jmol_isReady,
  allowjavascript: true,
	script: "set antialiasDisplay;load data/caffeine.mol;"
	//,defaultModel: ":dopamine"
  //,noscript: true
	//console: "none", // default will be jmolApplet0_infodiv
	//script: "set antialiasDisplay;background white;load data/caffeine.mol;"
  //delay 3;background yellow;delay 0.1;background white;for (var i = 0; i < 10; i+=1){rotate y 3;delay 0.01}"
}

})();