
tooltipSwitch();
$(window).on('resize', tooltipSwitch);

 function tooltipSwitch() {
 w = $( window ).width();
 
    if (w > 768) {
$('.tooltip--galleries').tooltipster({
    content: $('<p class="tooltip--info"><h3>Galleries</h3>loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fau</p>')
});
$('.tooltip--bandwidth').tooltipster({
    content: $('<p class="tooltip--info"><h3>BandWidth</h3>cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>')
});
$('.tooltip--storage').tooltipster({
    content: $('<p class="tooltip--info"><h3>Storage</h3>ous physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no re</p>')
});
$('.tooltip--customDomain').tooltipster({
    content: $('<p class="tooltip--info"><h3>Custom Domain</h3>si architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem se</p>')
});
$('.tooltip--support').tooltipster({
    content: $('<p class="tooltip--info"><h3>Support</h3>kness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice</p>')
});
    } else {
 $('.tooltip--galleries span').tooltipster({
    content: $('<p class="tooltip--info"><h3>Galleries</h3>loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fau</p>')
});
$('.tooltip--bandwidth span').tooltipster({
    content: $('<p class="tooltip--info"><h3>BandWidth</h3>cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. </p>')
});
$('.tooltip--storage span').tooltipster({
    content: $('<p class="tooltip--info"><h3>Storage</h3>ous physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no re</p>')
});
$('.tooltip--customDomain span').tooltipster({
    content: $('<p class="tooltip--info"><h3>Custom Domain</h3>si architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem se</p>')
});
$('.tooltip--support span').tooltipster({
    content: $('<p class="tooltip--info"><h3>Support</h3>kness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice</p>')
}); 
    }
 }
