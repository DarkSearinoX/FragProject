/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function popitup(url) {
	newwindow=window.open(url,'name','height=200,width=150');
	if (window.focus) {newwindow.focus()}
	return false;
}
