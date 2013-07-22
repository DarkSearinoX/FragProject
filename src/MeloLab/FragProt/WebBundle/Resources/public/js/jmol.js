// 1/21/2013 10:54:15 PM -- adds image handling

var jmolApplet0; // set up in HTML table, below

// logic is set by indicating order of USE -- default is HTML5 for this test page, though
var use = "HTML5" // JAVA HTML5 WEBGL IMAGE  are all otions
var s = document.location.search;


// Developers: The debugCode flag is checked in j2s/core/core.z.js, 
// and, if TRUE, skips loading the core methods, forcing those
// to be read from their individual directories. Set this
// true if you want to do some code debugging by inserting
// System.out.println, document.title, or alert commands
// anywhere in the Java or Jmol code.

Jmol.debugCode = (s.indexOf("debugcode") >= 0);

jmol_isReady = function(applet) {
        document.title = (applet._id + " is ready")
        Jmol._getElement(applet, "appletdiv").style.border="1px solid blue"
}		


var Info = {
        width: 300,
        height: 300,
        debug: false,
        color: "0xFFFFFF",
        addSelectionOptions: true,
        serverURL: "http://chemapps.stolaf.edu/jmol/jsmol/jsmol.php",
        use: "Java HTML5",
        j2sPath: "j2s",
        jarPath: "java",
        readyFunction: jmol_isReady,
        script: "set antialiasDisplay;load data/caffeine.mol",
        //jarPath: "java",
        //jarFile: (useSignedApplet ? "JmolAppletSigned.jar" : "JmolApplet.jar"),
        //isSigned: useSignedApplet,
        disableJ2SLoadMonitor: true,
        disableInitialConsole: true,
        allowJavaScript: true
        //defaultModel: "$dopamine",
        //console: "none", // default will be jmolApplet0_infodiv
}