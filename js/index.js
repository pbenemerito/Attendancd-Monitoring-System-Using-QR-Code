import QrScanner from "./qr/qr-scanner.min.js";
    QrScanner.WORKER_PATH = './js/qr/qr-scanner-worker.min.js';

    const video = document.getElementById('qr-video');
    const camHasCamera = document.getElementById('cam-has-camera');
    const camQrResult = document.getElementById('cam-qr-result');

    function setResult(label, result) {
        
        if (result) {
            label.textContent = result;
            label.style.color = 'teal';
            getStudentById(result);
            clearTimeout(label.highlightTimeout);
            label.highlightTimeout = setTimeout(() => label.style.color = 'inherit', 100);
            scanner.stop();
        }
    }

    function getStudentById(studentId) {
        const studentName = document.getElementById('studentName');
        const timeIn = document.getElementById('timeIn');
        $(document).ready(function() {
            $.ajax({
                type: "POST",
                url: './js/ajax/attendance.php',
                data: { studentId },
                success: function(response)
                {
                    var jsonData = JSON.parse(response);
                    if (jsonData && jsonData.success) {
                        studentName.innerHTML = jsonData.studentName;
                        timeIn.textContent = jsonData.timeIn;
                    } else {
                        studentName.innerHTML = jsonData.error;
                        timeIn.textContent = jsonData.error;
                    }
                    
               }
            });
        });
    }

    // ####### Web Cam Scanning #######

    QrScanner.hasCamera().then(hasCamera => camHasCamera.textContent = hasCamera ? 'Camera Found!' : 'Camera Not Found!');

    const scanner = new QrScanner(video, result => setResult(camQrResult, result), error => {
        camQrResult.textContent = error;
        camQrResult.style.color = 'inherit';
    });
 
    const scanRegion = video.parentNode;
    scanRegion.parentNode.insertBefore(scanner.$canvas, scanRegion.nextSibling);
    scanner.$canvas.style.display = 'block';

    // for debugging
    window.scanner = scanner;
    scanner.setInversionMode('both');
    document.getElementById('start-button').addEventListener('click', () => {
        scanner.start();
    });

    document.getElementById('stop-button').addEventListener('click', () => {
        scanner.stop();
    });