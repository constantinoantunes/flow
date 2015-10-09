/**
 * Created by eu on 06/10/2015.
 */
$(function () {
    var taskList = TaskList($('#task-list'));

    var onTaskInputKeyPress = function (event) {
        var enterKeyCode = 13;
        var input = $(this);
        if (event.keyCode == enterKeyCode && input.val().length > 0) {
            $.post('/api/task', {title: input.val()}, function (response) {
               if (response.error == false) {
                   taskList.addTask(response.return);
                   input.val('');
               }
            });
        }
    };

    $('#task-input').keypress(onTaskInputKeyPress);
    setInterval(taskList.update, 3000);
    taskList.update();
});

function TaskList (container) {
    var that = {};
    that.addTask = function (task) {
        var checked = '';
        if (task.done == true) {
            checked = 'checked="checked"'
        }
        container.append(
            '<li><input type="checkbox" value="'+task.id+'" '+checked+' /><span>'+task.title+'</span></li>'
        );
    };
    that.update = function () {
        $.getJSON('/api/task', function (response) {
            if (response.error == false) {
                container.empty();
                for (var i=0; i<response.return.length; i++) {
                    that.addTask(response.return[i]);
                }
            }
        });
    };
    return that;
}
