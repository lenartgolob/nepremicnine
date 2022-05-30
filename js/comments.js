function editComment(id) {
    document.getElementById("editComm" + id).style.display = "block";
    document.getElementById("comm" + id).style.display = "none";

}

function deleteComment(id, n_id) {
    if(confirm("Are you sure you want to delete this comment?")) {
        window.location.replace("komentar_delete.php?id=" + id + "&n_id=" + n_id)
    }
}