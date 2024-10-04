function showContent(sectionId) {
    document.querySelectorAll('.content > div').forEach(function (section) {
        section.classList.add('hidden');
    });

    document.getElementById(sectionId).classList.remove('hidden');
}

function addPost(){
    document.getElementById('add').style.display = 'block';
    document.getElementById('but').style.display = 'none';
}

function back() {
    document.getElementById('add').style.display = 'none';
    document.getElementById('but').style.display = 'block';
}