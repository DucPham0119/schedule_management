$(document).ready(function () {
    $(".editSchedule").on("click", (event) => {
        var id = event.target.value;
        var url = window.location.href;
        url=url.replace("schedule_search","schedule_edit_input");
        window.location.replace(url + "?id=" + id);
    })
});