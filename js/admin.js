function showContent(sectionId) {
    document.querySelectorAll('.content > div').forEach(function (section) {
        section.classList.add('hidden');
    });

    document.getElementById(sectionId).classList.remove('hidden');
}