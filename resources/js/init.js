/*Open nav script*/
function toggle(){
    document.getElementById('sidebar-wrapper').style.width = '250px';

}
/*End Of Open nav script*/

/*Close of nav script*/

function toggle_close(){
    console.log('Close');
    document.getElementById('sidebar-wrapper').style.width = '0px';
}
/*End of close nav script*/

/*alert for hashtags*/
function warn(){
    alert('This feature avail @ VERSION-2.0');
}
/*End of the script of alert*/



window.onload = function(){
    setTimeout(function() {
        document.getElementById('body').className = 'loaded';      
    }, 200);
}
