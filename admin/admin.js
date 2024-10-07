document.addEventListener('DOMContentLoaded', function () {
    // Kiểm tra nếu trạng thái "showEvents" được lưu trong localStorage
    if (localStorage.getItem('showEvents')) {
        showContent('events'); // Hiển thị khu vực Events
        localStorage.removeItem('showEvents'); // Xóa trạng thái sau khi hiển thị
    }
});

function showContent(sectionId) {
    // Ẩn tất cả các phần nội dung
    const sections = document.querySelectorAll('.content > div');
    sections.forEach(function (section) {
        section.classList.add('hidden');
    });

    // Hiển thị phần nội dung cụ thể
    const activeSection = document.getElementById(sectionId);
    if (activeSection) {
        activeSection.classList.remove('hidden');
    }
}

function addPost() {
    const addSection = document.getElementById('add');
    const buttonSection = document.getElementById('but');

    if (addSection && buttonSection) {
        addSection.style.display = 'block';
        buttonSection.style.display = 'none';
    }
}

function back() {
    const addSection = document.getElementById('add');
    const buttonSection = document.getElementById('but');

    if (addSection && buttonSection) {
        addSection.style.display = 'none';
        buttonSection.style.display = 'block';
    }
}

function closeForm() {
    document.getElementById('editFormContainer').style.display = 'none';
}

function deletePost(Event_detail_title) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có muốn xóa bài này: " + Event_detail_title + "?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var form = document.createElement('form');
            form.method = 'post';
            form.action = 'admin.php';

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete';
            input.value = Event_detail_title;
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        }
    })
}

function editPost(Event_detail_ID) {
    document.getElementById('editID').value = Event_detail_ID;
    document.getElementById('editFormContainer').style.display = 'block';
}

function confirmUpdate(event) {

    event.preventDefault();

    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có muốn sửa thông tin này?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
    }).then((result) => {
        if (result.isConfirmed) {
            event.target.submit(); 
        }
    });

    document.getElementById('editFormContainer').style.display = 'none';
};

