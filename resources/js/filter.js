Vue.filter("fecha", function(date) {
    return moment(date).format("LLLL");
});