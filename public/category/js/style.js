$(document).ready(function()
{

    var updateOutput = function(e)
    {
        var list   = e.length ? e : $(e.target),
            output = list.data('output');
        console.log('list : -> ',list);
        console.log('output : -> ',output);
        if (window.JSON) {
            console.log('in if condition ');
            console.log('in if serialize ',list.nestable('serialize'));
            console.log('in if stringify ',window.JSON.stringify(list.nestable('serialize')));

            output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            // document.getElementById('nestable-output').textContent = 'foo';
            // $('#nestable-output').html('fpppp');

            window.livewire.emit("nested_category", 'aaaaa');
            // Livewire.emit('nested_category', window.JSON.stringify(list.nestable('serialize')));
            // $('#nestable-output').text(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            console.log('done');
        } else {
            output.val('JSON browser support required for this demo.');
        }
    };

    // activate Nestable for list 1
    $('#nestable-wrapper').nestable({
        group: 1,
        maxDepth : 10,
    })
    .on('change', updateOutput);

    // output initial serialised data
    updateOutput($('#nestable-wrapper').data('output', $('#nestable-output')));
    
    $('#nestable-menu').on('click', function(e)
    {
        var target = $(e.target),
            action = target.data('action');
        if (action === 'expand-all') {
            $('.dd').nestable('expandAll');
        }
        if (action === 'collapse-all') {
            $('.dd').nestable('collapseAll');
        }
    });

    
});