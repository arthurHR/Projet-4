
function showAnswer (id) {
	document.getElementById(id).style.display = "block";
};

$('#report').on('click', function () {
    return confirm('Etes vous sûr de vouloir signaler ce commentaire ?');
});

$('#deleteComment').on('click', function () {
    return confirm('Etes vous sûr de vouloir supprimer ce commentaire ?');
});

$('#deletePost').on('click', function () {
    return confirm('Etes vous sûr de vouloir supprimer ce chapitre ?');
});

$('#deleteReportComment').on('click', function () {
    return confirm('Etes vous sûr de vouloir supprimer ce commentaire ?');
});



