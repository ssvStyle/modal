<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modal</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <style>
        .modal {
            position: absolute;
            width: 450px;
            padding: 20px;
            top: 50px;
            background: #ffe4ef;
        }

        .block {
            background: aliceblue;
            display: block;
            width: 100%;
            height: 100%;
        }
        h3 {
            margin-top: 0;
            text-align: center;
        }
        .bgModal {
            justify-content: center;
            display: none;
            width: 100%;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .openModal {
            display: inline-flex;
        }

        .wrapper {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .closeBtn {
            display: flex;
            justify-content: flex-end;
        }

        #regionName:required:focus:valid {
            background: wheat;

        }

        #regionName:required:focus:invalid {
            background: rgba(245, 93, 88, 0.62);
        }

        form:valid #saveBtn:enabled {

        }

    </style>

</head>
<body>

<div class="block" id="block">
    <button type="button" data-btn="btn">Add new</button>
    <div class="bgModal" id="modal">
        <div class="modal">
            <div class="closeBtn">
                <span data-btn="close" style="cursor: pointer">X</span>
            </div>
            <h3>Header</h3>
            <form action="">
                <div class="wrapper">
                    <label for="regionName">Название региона:</label>
                    <input type="text" id="regionName" name="regionName" pattern="^[А-Яа-яЁё]{3,}$" required>
                </div>
                <div class="wrapper">
                    <label for="regionBoss">Название региона:</label>
                    <select id="regionBoss" required>
                        <option selected disabled>Выберите руководителя</option>
                        <option value = "Никакие">Никакие</option>
                        <option value = "Иван">Иван</option>
                        <option value = "Петр">Петр</option>
                        <option value = "Николай">Николай</option>
                    </select>
                </div>
                <div class="wrapper">
                    <div>
                        <label for="check">Зарубежье:</label>
                        <input type="checkbox" id="check">
                    </div>
                    <div>
                        <label for="sortNum">Зарубежье:</label>
                        <input type="number" id="sortNum" name="sortNum" min="1" max="50">
                    </div>
                </div>
                <div class="wrapper">
                    <button type="button" id="saveBtn" data-btn="save">Save</button>
                    <button type="button" data-btn="cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    window.addEventListener('DOMContentLoaded', () => {
        const block = document.getElementById('block'),
        modal = document.getElementById('modal');

        let saveBtn = document.getElementById('saveBtn');
        saveBtn.setAttribute("disabled", "disabled");

        block.addEventListener('click', (event) => {

            if (event.target.dataset.btn === 'btn') {
                openModal(modal);
            }

        });

        modal.addEventListener('click', (event) => {

            if (event.target.dataset.btn === 'close' || event.target.className == 'bgModal openModal') {
                closeModal(modal);
            }

            if (event.target.dataset.btn === 'save') {



                console.log(saveBtn);
            }

            if (event.target.dataset.btn === 'cancel') {
                closeModal(modal);
            }

        });

        // modal.addEventListener('click', (event) => {
        //
        //     if (event.target.className == 'close' || event.target.className == 'modal openModal') {
        //         carModelSelect.innerHTML = '';
        //         carStatus.selectedIndex = 0;
        //         brandCarSelect.selectedIndex = 0;
        //         inputId.value = '';
        //         inputNum.value = '';
        //         inputTax.value = '';
        //         closeModal(addUser);
        //     }
        // });

        function openModal($target) {
            $target.classList.add('openModal');
            document.body.style.overflow = 'hidden';
        }

        function closeModal($target) {
            $target.classList.remove('openModal');
            document.body.style.overflow = 'auto';
        }

        function sendRequest(data = '', reqType, url, callback) {
            let httpRequest;
            if (window.XMLHttpRequest) { // Mozilla, Safari, ...
                httpRequest = new XMLHttpRequest();
            } else if (window.ActiveXObject) { // IE
                httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }

            httpRequest = new XMLHttpRequest();
            httpRequest.overrideMimeType('application/json');
            httpRequest.onreadystatechange = function () {
                if (httpRequest.readyState == 4) {
                    if (httpRequest.status == 200) {

                        callback(JSON.parse(httpRequest.responseText));

                    } else if (httpRequest.status == 401) {
                        console.log(httpRequest.status);

                    } else if (httpRequest.status == 404) {
                        console.log(httpRequest.status);
                    } else {
                        console.log(httpRequest.status);
                    }
                }
            };
            httpRequest.open(reqType, url, true);
            httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            httpRequest.send(data);
        }
    });
</script>

</body>
</html>