let operationalStep = 1;
let activeTargetIndex = null;

let scheduleItems = [
    { classCode: "141216", subjectCode: "ECE01L", desc: "Fundamentals of Electronic Circuits Laboratory", professor: "Engr. Nathanial Atan", status: "PENDING", refNo: "--" },
    { classCode: "141331", subjectCode: "CPE204", desc: "Software Design", professor: "Prof. Alejandro Agul", status: "PENDING", refNo: "--" },
    { classCode: "141332", subjectCode: "CPE204L", desc: "Software Design Laboratory", professor: "Prof. Fiona Princess", status: "PENDING", refNo: "--" },
    { classCode: "141333", subjectCode: "ECE01", desc: "Fundamentals of Electronic Circuits", professor: "Dr. Fernando Rivera", status: "PENDING", refNo: "--" },
    { classCode: "141335", subjectCode: "CPE205", desc: "Assembly Language Programming", professor: "Engr. Tyga Collins", status: "PENDING", refNo: "--" },
    { classCode: "190022", subjectCode: "DE", desc: "Differential Equations", professor: "Prof. Jonas Marmol", status: "PENDING", refNo: "--" },
    { classCode: "1310063", subjectCode: "GE-ELEC14", desc: "Technical Communication", professor: "Dr. Anygma Yuson", status: "PENDING", refNo: "--" },
    { classCode: "1313031", subjectCode: "GE03", desc: "The Contemporary World", professor: "Prof. Bato Dela Rosa", status: "PENDING", refNo: "--" },
    { classCode: "13100069", subjectCode: "PE04", desc: "Physical Activities Towards Health and Fitness II", professor: "Coach Naruto Uzumaki", status: "PENDING", refNo: "--" }
];

if(localStorage.getItem('schedule_tracker_v6')) {
    scheduleItems = JSON.parse(localStorage.getItem('schedule_tracker_v6'));
} else {
    localStorage.setItem('schedule_tracker_v6', JSON.stringify(scheduleItems));
}

document.addEventListener("DOMContentLoaded", () => {
    buildLikertRadioButtons();
    if (localStorage.getItem('active_session_name')) {
        document.getElementById('metaStudentName').value = localStorage.getItem('active_session_name');
        document.getElementById('metaCourseLevel').value = localStorage.getItem('active_session_course');
        document.getElementById('view-login').classList.add('hidden');
    }
    renderScheduleTable();
});

function switchLoginRole(role) {
    const studentForm = document.getElementById('formStudentLogin');
    const adminForm   = document.getElementById('formAdminLogin');
    const studentTab  = document.getElementById('toggleStudentTab');
    const adminTab    = document.getElementById('toggleAdminTab');

    if (role === 'student') {
        studentForm.classList.remove('hidden');
        adminForm.classList.add('hidden');
        studentTab.className = "flex-1 py-2 text-center rounded bg-amber-500 text-indigo-950 font-bold transition cursor-pointer";
        adminTab.className = "flex-1 py-2 text-center rounded text-slate-400 hover:text-slate-200 transition cursor-pointer";
    } else {
        studentForm.classList.add('hidden');
        adminForm.classList.remove('hidden');
        adminTab.className = "flex-1 py-2 text-center rounded bg-amber-500 text-indigo-950 font-bold transition cursor-pointer";
        studentTab.className = "flex-1 py-2 text-center rounded text-slate-400 hover:text-slate-200 transition cursor-pointer";
    }
}

function handleAdminVerification(event) {
    event.preventDefault();
    const adminEmail = document.getElementById('loginAdminId').value.trim();
    const adminPass  = document.getElementById('loginAdminPin').value;

    if (adminEmail === "admin@rtu.edu.ph" && adminPass === "admin123") {
        alert("Administrative personnel validation authorized. Redirecting to Management Console...");
        window.location.href = "admin.php";
    } else {
        alert("Authentication Denied: Invalid Personnel Email address alignment or Passkey.");
    }
}

// MATCHED LOGIC: Pull parameters from adjusted inputs layout configuration cleanly
function handlePortalLogin(event) {
    event.preventDefault();
    const inputName = document.getElementById('loginStudentName').value.trim().toUpperCase();
    const inputCourse = document.getElementById('loginStudentCourse').value.trim();

    localStorage.setItem('active_session_name', inputName);
    localStorage.setItem('active_session_course', inputCourse);

    document.getElementById('metaStudentName').value = inputName;
    document.getElementById('metaCourseLevel').value = inputCourse;
    document.getElementById('view-login').classList.add('hidden');
}

function handleLogout() {
    localStorage.removeItem('active_session_name');
    localStorage.removeItem('active_session_course');
    location.reload();
}

function renderScheduleTable() {
    const tbody = document.getElementById('scheduleTableBody');
    let html = '';
    scheduleItems.forEach((item, idx) => {
        const isEvaluated = item.status === "EVALUATED";
        const statusBadgeColor = isEvaluated ? "bg-emerald-500/20 text-emerald-300 font-bold border border-emerald-500/30" : "bg-amber-500/10 text-amber-400 border border-amber-500/20";
        const facultyActionContent = isEvaluated
            ? `<span class="text-slate-400 font-semibold">${item.professor}</span>`
            : `<button onclick="launchEvaluationForm(${idx})" class="text-sky-400 hover:text-sky-300 hover:underline font-bold text-left transition cursor-pointer">${item.professor}</button>`;

        html += `
            <tr class="hover:bg-amber-500/[0.02] transition text-slate-300 font-medium">
                <td class="p-3 text-center border-r border-amber-500/10 font-bold text-slate-500">${idx + 1}.</td>
                <td class="p-3 border-r border-amber-500/10 font-mono text-amber-200/80">${item.classCode}</td>
                <td class="p-3 border-r border-amber-500/10 font-bold text-amber-300">${item.subjectCode}</td>
                <td class="p-3 border-r border-amber-500/10 text-slate-300">${item.desc}</td>
                <td class="p-3 border-r border-amber-500/10">${facultyActionContent}</td>
                <td class="p-3 border-r border-amber-500/10 text-center"><span class="px-2.5 py-0.5 rounded text-[10px] uppercase tracking-wider ${statusBadgeColor}">${item.status}</span></td>
                <td class="p-3 text-center font-mono text-slate-400 tracking-tight">${item.refNo}</td>
            </tr>`;
    });
    tbody.innerHTML = html;
}

function launchEvaluationForm(index) {
    activeTargetIndex = index;
    const targetItem = scheduleItems[index];
    document.getElementById('cardFacultyName').innerText = targetItem.professor;
    document.getElementById('cardSubject').innerText = `${targetItem.subjectCode} - ${targetItem.desc}`;
    
    const imageEl = document.getElementById('cardFacultyImage');
    const profImages = {
        "Engr. Nathanial Atan": "../pics/BOSS%20ATAN.jpg",
        "Prof. Alejandro Agul": "../pics/BOSS%20AGUL.jpg",
        "Prof. Fiona Princess": "../pics/PRINCESS%20FIONA.jpg",
        "Dr. Fernando Rivera": "../pics/FERNANDO.jpg",
        "Engr. Tyga Collins": "../pics/DADDY%20TYGA.jpg",
        "Prof. Jonas Marmol": "../pics/MARMOL.jpg",
        "Dr. Anygma Yuson": "../pics/ANYGMA.jpg",
        "Prof. Bato Dela Rosa": "../pics/BATO.png",
        "Coach Naruto Uzumaki": "../pics/NARUTO.jpg"
    };
    imageEl.src = profImages[targetItem.professor] || "../pics/PRINCESS%20FIONA.jpg";

    document.getElementById('view-schedule').classList.add('hidden');
    document.getElementById('view-evaluate').classList.remove('hidden');
    switchStep(1);
}

function showScheduleView() {
    document.getElementById('view-schedule').classList.remove('hidden');
    document.getElementById('view-evaluate').classList.add('hidden');
    renderScheduleTable();
}

function buildLikertRadioButtons() {
    document.querySelectorAll(".likert-buttons").forEach(container => {
        const qid = container.getAttribute("data-qid");
        let html = '';
        for(let score = 5; score >= 1; score--) {
            html += `
                <div class="relative inline-block mx-0.5">
                    <input type="radio" id="${qid}_${score}" name="${qid}" value="${score}" required class="sr-only">
                    <label for="${qid}_${score}" class="rating-btn inline-block border border-amber-500/20 bg-[#060c1a] px-3 py-1 rounded cursor-pointer text-amber-400 font-bold text-center min-w-[34px] transition-all">
                        ${score}
                    </label>
                </div>`;
        }
        container.innerHTML = html;
    });
}

function validateCurrentStepAnswers() {
    let targetRange = [];
    if(operationalStep === 1) targetRange = [1, 2, 3, 4, 5];
    if(operationalStep === 2) targetRange = [6, 7, 8, 9, 10];
    
    for(let qNum of targetRange) {
        const selected = document.querySelector(`input[name="q${qNum}"]:checked`);
        if(!selected) {
            alert(`Step Verification Notice: Please answer all matrix entries on this section before advancing.`);
            return false;
        }
    }
    return true;
}

function switchStep(stepIndex) {
    operationalStep = stepIndex;
    document.getElementById('stepSection1').classList.toggle('hidden', operationalStep !== 1);
    document.getElementById('stepSection2').classList.toggle('hidden', operationalStep !== 2);
    document.getElementById('stepSection3').classList.toggle('hidden', operationalStep !== 3);

    for (let i = 1; i <= 3; i++) {
        const tab = document.getElementById(`stepTab${i}`);
        tab.className = i === operationalStep 
            ? "flex-1 py-3.5 border-b-2 border-amber-400 text-amber-300 bg-[#0b152e] font-bold text-center text-xs cursor-pointer"
            : "flex-1 py-3.5 border-b-2 border-transparent text-center text-slate-500 text-xs hover:text-slate-300 transition cursor-pointer";
    }

    if (operationalStep === 1) {
        document.getElementById('prevFormBtn').innerText = "Cancel Form";
    } else {
        document.getElementById('prevFormBtn').innerText = "Back";
    }

    if (operationalStep === 3) {
        document.getElementById('nextFormBtn').classList.add('hidden');
        document.getElementById('submitFormBtn').classList.remove('hidden');
    } else {
        document.getElementById('nextFormBtn').classList.remove('hidden');
        document.getElementById('submitFormBtn').classList.add('hidden');
    }
}

function navigateStep(direction) {
    if (direction === -1 && operationalStep === 1) {
        if(confirm("Discard current evaluation changes and return to calendar dashboard roster?")) {
            showScheduleView();
        }
        return;
    }
    if (direction === 1 && !validateCurrentStepAnswers()) return;
    let nextTarget = operationalStep + direction;
    if(nextTarget >= 1 && nextTarget <= 3) switchStep(nextTarget);
}

function submitEvaluation(event) {
    event.preventDefault();
    const currentItem = scheduleItems[activeTargetIndex];
    
    const scores = [];
    for(let i = 1; i <= 15; i++) {
        const checkedRadio = document.querySelector(`input[name="q${i}"]:checked`);
        if(!checkedRadio) {
            alert('Operational Matrix Exception: Please complete all selections.');
            return;
        }
        scores.push(parseInt(checkedRadio.value));
    }

    const currentStudent = document.getElementById('metaStudentName').value || localStorage.getItem('active_session_name') || "ANONYMOUS";
    const currentCourse  = document.getElementById('metaCourseLevel').value || localStorage.getItem('active_session_course') || "UNASSIGNED";

    const payload = {
        student_name: currentStudent,
        course_level: currentCourse,
        faculty: currentItem.professor,
        subject: currentItem.desc,
        scores: scores,
        admireText: document.getElementById('commentAdmire').value.trim(),
        improveText: document.getElementById('commentImprove').value.trim()
    };

    fetch('submit_evaluation.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
    })
    .then(res => res.json())
    .then(data => {
        if(data.status === 'success') {
            alert(data.message);
            
            const references = ["2605-26653", "2605-26658", "2605-26662", "2605-26667", "2605-26670", "2605-26681", "2605-26690", "2605-26697", "2605-26703"];
            scheduleItems[activeTargetIndex].status = "EVALUATED";
            scheduleItems[activeTargetIndex].refNo = references[activeTargetIndex] || "2605-00000";
            localStorage.setItem('schedule_tracker_v6', JSON.stringify(scheduleItems));
            
            document.getElementById('evaluationMatrixForm').reset();
            showScheduleView();
        } else {
            alert(`Database synchronization failure: ${data.message}`);
        }
    })
    .catch(err => {
        console.error(err);
        alert('Server processing connection timeout alert.');
    });
}