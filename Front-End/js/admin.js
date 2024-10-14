document.addEventListener('DOMContentLoaded', function () {
    // Kiểm tra nếu trạng thái "showEvents" được lưu trong localStorage
    if (localStorage.getItem('showEvents')) {
        showContent('events'); // Hiển thị khu vực Events
        localStorage.removeItem('showEvents'); // Xóa trạng thái sau khi hiển thị
    }

    // Kiểm tra nếu trạng thái "showAstronauts" được lưu trong localStorage
    if (localStorage.getItem('showAstronauts')) {
        showContent('astronaut_details'); // Hiển thị khu vực Astronaut
        localStorage.removeItem('showAstronauts'); // Xóa trạng thái sau khi hiển thị
    }

    // Kiểm tra nếu trạng thái "showCelestials" được lưu trong localStorage
    if (localStorage.getItem('showCelestials')) {
        showContent('celestial'); // Hiển thị khu vực Celestial
        localStorage.removeItem('showCelestials'); // Xóa trạng thái sau khi hiển thị
    }
});


function showContent(sectionId) {
    const sections = document.querySelectorAll('.content > div');
    sections.forEach(function (section) {
        section.classList.add('hidden');
    });

    const activeSection = document.getElementById(sectionId);
    if (activeSection) {
        activeSection.classList.remove('hidden');
    }
}


function addEvent() {
    document.getElementById('add').style.display = 'block';
    document.getElementById('but').style.display = 'none';
    document.getElementById('editFormContainer').style.display='none';
}

function addAstronaut() {
    document.getElementById('add_astronaut').style.display = 'block';
    document.getElementById('but_astronaut').style.display = 'none';
    document.getElementById('editFormAstronaut').style.display='none';
}

function back() {
    const addEvent = document.getElementById('add');
    const buttonEvent = document.getElementById('but');

    if (addEvent && buttonEvent) {
        addEvent.style.display = 'none';
        buttonEvent.style.display = 'block';
    }
}

function backAstronaut() {
    const addAstronaut = document.getElementById('add_astronaut');
    const buttonAstronaut = document.getElementById('but_astronaut');

    if (addAstronaut && buttonAstronaut) {
        addAstronaut.style.display = 'none';
        buttonAstronaut.style.display = 'block';
    }
}

function closeForm() {
    const editFormContainer = document.getElementById('editFormContainer');
    editFormContainer.classList.remove('show');
    document.getElementById('editFormContainer').style.display='none';
}

function closeFormAstronaut() {
    const editFormContainer = document.getElementById('editFormAstronaut');
    editFormContainer.classList.remove('show');
    document.getElementById('editFormAstronaut').style.display='none';
}

function deletePost(Event_detail_ID) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có muốn xóa bài này?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var form = document.createElement('form');
            form.method = 'post';
            form.action = '../../Back-End/admin/events_process.php';

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'delete';
            input.value = Event_detail_ID;
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        }
    })
}

function deletePostAstronaut(Astronaut_detail_ID) {
    Swal.fire({
        title: 'Are you sure?',
        text: "Bạn có muốn xóa bài này?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            var form = document.createElement('form');
            form.method = 'post';
            form.action = '../../Back-End/admin/events_process.php';

            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'deleteAstronaut';
            input.value = Astronaut_detail_ID;
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
        }
    })
}


function editPost(Event_detail_ID,Event_detail_title, Event_detail_sub) {
    document.getElementById('editID').value = Event_detail_ID;
    document.getElementById('editTitle').value = Event_detail_title;
    document.getElementById('editSub').value = Event_detail_sub;
    document.getElementById('editFormContainer').classList.add('show');
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

function editPostAstronaut(Astronaut_detail_ID, Astronaut_detail_header_text, Astronaut_detail_sub_text) {
    document.getElementById('AstronautID').value = Astronaut_detail_ID;
    document.getElementById('editName').value = Astronaut_detail_header_text;
    document.getElementById('editBio').value = Astronaut_detail_sub_text;
    document.getElementById('editFormAstronaut').classList.add('show');
    document.getElementById('editFormAstronaut').style.display = 'block';
}

function confirmUpdateAstronaut(event) {
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

    document.getElementById('editFormAstronaut').style.display = 'none';
}




document.addEventListener('DOMContentLoaded', function () {
    const dropdownToggle = document.getElementById('astronautDropdown');
    const dropdownMenu = document.getElementById('astronautMenu');

    dropdownToggle.addEventListener('click', function (event) {
        event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết
        dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        dropdownMenu.style.opacity = dropdownMenu.style.display === 'block' ? '1' : '0';
    });

    // Đóng dropdown khi nhấp ra ngoài
    document.addEventListener('click', function (event) {
        if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.style.display = 'none';
            dropdownMenu.style.opacity = '0';
        }
    });
});
