import Axios from "axios";

$("input:checkbox").change(function() {
    var url = "/participant/" + this.value;
    var data = new FormData();
    data.append("_method", "DELETE");
    Axios.post(url, data);
});
