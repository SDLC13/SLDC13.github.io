<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institutional Administration Portal - Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-gradient-to-br from-[#071126] via-[#0f2042] to-[#081124] min-h-screen text-slate-100 font-sans antialiased selection:bg-amber-500 selection:text-indigo-950">

    <section id="view-login" class="fixed inset-0 bg-gradient-to-b from-[#071126] to-[#0f244d] z-[99] flex items-center justify-center px-4 overflow-y-auto">
        <div class="max-w-md w-full bg-gradient-to-b from-[#e6c687] via-[#cca356] to-[#ad8336] rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.5)] p-1">
            <div class="bg-[#0f2042] rounded-2xl p-6 md:p-8 space-y-6 gold-border-corner">
                
                <div class="text-center space-y-3">
                    <div class="max-w-[70%] mx-auto flex items-center justify-center">
                        <img src="../logo/RTU_Logo.png" alt="Rizal Technological University" class="h-20 w-auto object-contain block drop-shadow-[0_4px_6px_rgba(0,0,0,0.3)]">
                    </div>
                    <div class="pt-2 border-t border-amber-500/20">
                        <h2 class="text-lg font-black text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-amber-400 to-amber-200 uppercase tracking-wider">EVALUATION SYSTEM</h2>
                        <p class="text-[11px] text-amber-200/60">UNIVERSITY PORTAL</p>
                    </div>
                </div>

                <div class="flex bg-[#0a152b] p-1 rounded-lg border border-amber-500/20 text-xs font-bold uppercase">
                    <button type="button" id="toggleStudentTab" onclick="switchLoginRole('student')" class="flex-1 py-2 text-center rounded text-slate-400 hover:text-slate-200 transition cursor-pointer">Student Portal</button>
                    <button type="button" id="toggleAdminTab" onclick="switchLoginRole('admin')" class="flex-1 py-2 text-center rounded bg-amber-500 text-indigo-950 font-bold transition cursor-pointer">Admin Portal</button>
                </div>

                <form id="formStudentLogin" onsubmit="handlePortalRedirect(event)" class="space-y-4 hidden">
                    <div class="input-container-group">
                        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">Student Name:</label>
                        <div class="border-validation-ring flex items-center bg-[#0a152b]">
                            <div id="indicatorSName" class="validation-indicator-circle indicator-waiting"></div>
                            <div class="relative flex-1 flex items-center">
                                <i class="fa-solid fa-user absolute left-3 text-amber-400/60 text-sm"></i>
                                <input type="text" id="loginStudentName" required placeholder="SURNAME, FIRST NAME MIDDLENAME" class="w-full pl-9 pr-3 py-2.5 bg-transparent border-none text-sm font-bold text-amber-100 uppercase outline-none focus:ring-0 transition">
                            </div>
                        </div>
                    </div>
                    <div class="input-container-group">
                        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">Student Account Number:</label>
                        <div class="border-validation-ring flex items-center bg-[#0a152b]">
                            <div id="indicatorSId" class="validation-indicator-circle indicator-waiting"></div>
                            <div class="relative flex-1 flex items-center">
                                <i class="fa-solid fa-id-badge absolute left-3 text-amber-400/60 text-sm"></i>
                                <input type="text" id="loginStudentId" required placeholder="e.g. 2024-10143-MN-0" class="w-full pl-9 pr-3 py-2.5 bg-transparent border-none text-sm font-semibold text-amber-100 outline-none focus:ring-0 transition">
                            </div>
                        </div>
                    </div>
                    <div class="input-container-group">
                        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">Course / Section:</label>
                        <div class="border-validation-ring flex items-center bg-[#0a152b]">
                            <div id="indicatorSCourse" class="validation-indicator-circle indicator-waiting"></div>
                            <div class="relative flex-1 flex items-center">
                                <i class="fa-solid fa-graduation-cap absolute left-3 text-amber-400/60 text-sm"></i>
                                <input type="text" id="loginStudentCourse" required placeholder="e.g. CEIT-03-401A" class="w-full pl-9 pr-3 py-2.5 bg-transparent border-none text-sm font-medium text-amber-200/90 outline-none focus:ring-0 transition">
                            </div>
                        </div>
                    </div>
                    <div class="input-container-group">
                        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">Password:</label>
                        <div class="border-validation-ring flex items-center bg-[#0a152b]">
                            <div id="indicatorSPass" class="validation-indicator-circle indicator-waiting"></div>
                            <div class="relative flex-1 flex items-center">
                                <i class="fa-solid fa-lock absolute left-3 text-amber-400/60 text-sm"></i>
                                <input type="password" id="loginStudentPassword" required placeholder="•••••••••••••" class="w-full pl-9 pr-3 py-2.5 bg-transparent border-none text-sm text-amber-100 outline-none focus:ring-0 transition">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-amber-300 via-amber-500 to-amber-600 text-indigo-950 font-black py-3 px-4 rounded-lg text-xs uppercase tracking-widest shadow-lg transition transform active:scale-98 cursor-pointer">LOGIN</button>
                </form>

                <form id="formAdminLogin" onsubmit="handleAdminVerification(event)" class="space-y-4">
                    <div class="input-container-group">
                        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">Admin Email:</label>
                        <div class="border-validation-ring flex items-center bg-[#0a152b]">
                            <div id="indicatorPEmail" class="validation-indicator-circle indicator-waiting"></div>
                            <div class="relative flex-1 flex items-center">
                                <i class="fa-solid fa-user-shield absolute left-3 text-amber-400/60 text-sm"></i>
                                <input type="text" id="loginAdminId" required placeholder="admin@rtu.edu.ph" class="w-full pl-9 pr-3 py-2.5 bg-transparent border-none text-sm font-semibold text-amber-100 outline-none focus:ring-0 transition">
                            </div>
                        </div>
                    </div>
                    <div class="input-container-group">
                        <label class="block text-[11px] font-bold text-amber-300 uppercase tracking-widest mb-1">Password:</label>
                        <div class="border-validation-ring flex items-center bg-[#0a152b]">
                            <div id="indicatorPPass" class="validation-indicator-circle indicator-waiting"></div>
                            <div class="relative flex-1 flex items-center">
                                <i class="fa-solid fa-key absolute left-3 text-amber-400/60 text-sm"></i>
                                <input type="password" id="loginAdminPin" required placeholder="•••••••••••••" class="w-full pl-9 pr-3 py-2.5 bg-transparent border-none text-sm text-amber-100 outline-none focus:ring-0 transition">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-gradient-to-r from-amber-400 to-amber-600 text-indigo-950 font-black py-3 px-4 rounded-lg text-xs uppercase tracking-widest shadow-lg transition transform active:scale-98 cursor-pointer">LOGIN</button>
                </form>

            </div>
        </div>
    </section>

    <nav class="bg-[#0b1730]/90 backdrop-blur-md border-b border-amber-500/20 sticky top-0 z-50 px-6 py-4 flex justify-between items-center shadow-lg">
        <div class="flex items-center space-x-3">
            <div class="flex items-center justify-center">
                <img src="../logo/RTU_Logo.png" alt="RTU Logo" class="h-8 w-auto object-contain block drop-shadow">
            </div>
            <span class="text-xs font-bold tracking-widest text-amber-400 uppercase border-l border-slate-700 pl-3">Admin Panel</span>
        </div>
        <button onclick="handleAdminLogout()" class="px-4 py-1.5 text-xs font-bold bg-amber-500 text-indigo-950 rounded hover:bg-amber-400 shadow transition duration-150 cursor-pointer">Exit Console</button>
    </nav>

    <main class="max-w-6xl mx-auto my-8 px-4 space-y-6">
        <div class="flex items-center justify-between border-b border-amber-500/20 pb-4">
            <div>
                <h2 class="text-xl font-bold tracking-wide text-amber-300 uppercase">Student Submission Registry</h2>
                <p class="text-xs text-slate-400 mt-0.5">Review the live feed logs of student appraisals recorded inside the relational schema matrix rows.</p>
            </div>
            <button onclick="loadAdminRegistry()" class="px-3 py-1.5 text-xs font-bold border border-amber-500/30 text-amber-400 rounded hover:bg-amber-500/10 transition cursor-pointer">
                <i class="fa-solid fa-rotate mr-1"></i> Refresh Feed
            </button>
        </div>

        <div id="adminRecordsRoot" class="grid grid-cols-1 md:grid-cols-2 gap-4"></div>
    </main>

    <div id="evaluationDetailsModal" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-[100] hidden items-center justify-center p-4">
        <div class="max-w-2xl w-full bg-[#0f2042] rounded-xl border border-amber-500/30 shadow-2xl overflow-hidden flex flex-col max-h-[90vh]">
            <div class="p-5 border-b border-amber-500/20 bg-gradient-to-b from-[#14264d] to-[#0f2042] flex justify-between items-start">
                <div>
                    <h3 id="modalStudentName" class="text-lg font-black text-amber-300 uppercase"></h3>
                    <p id="modalStudentCourse" class="text-xs text-slate-400 italic mt-0.5"></p>
                </div>
                <button onclick="closeEvaluationModal()" class="text-slate-400 hover:text-rose-400 text-lg cursor-pointer p-1"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="p-6 overflow-y-auto space-y-5 text-sm text-slate-300">
                <div class="grid grid-cols-2 gap-4 bg-[#0a1429] p-4 rounded-lg border border-slate-800">
                    <div><span class="block text-[10px] uppercase font-bold tracking-wider text-amber-400/70">Faculty Target Member:</span><span id="modalFacultyMember" class="font-bold text-white text-base"></span></div>
                    <div><span class="block text-[10px] uppercase font-bold tracking-wider text-amber-400/70">Subject Description Context:</span><span id="modalSubjectDesc" class="italic text-slate-200"></span></div>
                </div>
                <div class="bg-[#0a1429] p-4 rounded-lg flex justify-between items-center border border-slate-800"><span class="font-bold text-slate-200 text-xs tracking-wider uppercase">Calculated Scoring Matrix Average:</span><span id="modalScoreAvg" class="text-xl font-black px-3 py-1 bg-indigo-950 text-emerald-400 rounded"></span></div>
                <div class="space-y-3">
                    <div class="p-4 bg-emerald-950/20 border border-emerald-500/20 rounded-lg"><b class="text-emerald-400 block text-xs uppercase mb-1"><i class="fa-solid fa-heart mr-1"></i> Admired Attributes:</b><p id="modalAdmiredText" class="italic text-slate-300"></p></div>
                    <div class="p-4 bg-rose-950/20 border border-rose-500/20 rounded-lg"><b class="text-rose-400 block text-xs uppercase mb-1"><i class="fa-solid fa-circle-exclamation mr-1"></i> Areas for Growth / Comments:</b><p id="modalGrowthText" class="italic text-slate-300"></p></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cachedAdminRecords = [];
        
        document.addEventListener("DOMContentLoaded", () => { 
            if (sessionStorage.getItem('admin_authenticated') === 'true') {
                document.getElementById('view-login').classList.add('hidden');
                loadAdminRegistry();
            } else {
                switchLoginRole('admin');
            }
            bindAdminInputMonitorLetters();
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

        function handlePortalRedirect(event) {
            event.preventDefault();
            localStorage.setItem('active_session_name', document.getElementById('loginStudentName').value.trim().toUpperCase());
            localStorage.setItem('active_session_course', document.getElementById('loginStudentCourse').value.trim());
            window.location.href = "index.php";
        }

        function handleAdminVerification(event) {
            event.preventDefault();
            const adminEmail = document.getElementById('loginAdminId').value.trim();
            const adminPass  = document.getElementById('loginAdminPin').value;

            if (adminEmail === "admin@rtu.edu.ph" && adminPass === "admin123") {
                sessionStorage.setItem('admin_authenticated', 'true');
                document.getElementById('view-login').classList.add('hidden');
                loadAdminRegistry();
            } else {
                alert("Authentication Denied: Invalid Personnel Email address alignment or Passkey.");
            }
        }

        function handleAdminLogout() {
            sessionStorage.removeItem('admin_authenticated');
            window.location.href = "index.php";
        }

        function loadAdminRegistry() {
            const container = document.getElementById('adminRecordsRoot');
            container.innerHTML = `<div class="col-span-2 text-center text-slate-400 p-6 italic">Querying SQL database logs matrices rows...</div>`;
            fetch('get_admin_reviews.php')
                .then(res => res.json())
                .then(response => {
                    if (response.status !== 'success' || response.data.length === 0) {
                        container.innerHTML = `<div class="col-span-2 text-center bg-[#0b152e] border border-amber-500/10 p-12 rounded-xl text-slate-400">No evaluations found inside the repository logs memory.</div>`;
                        return;
                    }
                    cachedAdminRecords = response.data;
                    let html = '';
                    response.data.forEach((entry, index) => {
                        html += `
                            <div onclick="openEvaluationModal(${index})" class="bg-[#0b152e] rounded-xl border border-amber-500/20 p-5 space-y-3 hover:border-amber-400/50 transition cursor-pointer group transform hover:-translate-y-0.5 duration-150">
                                <div class="flex justify-between items-start border-b border-slate-800 pb-2">
                                    <div><h3 class="font-black text-slate-100 group-hover:text-amber-300 uppercase tracking-wide transition">${entry.student_name}</h3><p class="text-[10px] text-slate-400 italic">${entry.course_level}</p></div>
                                    <span class="text-xs bg-indigo-950 text-amber-400 px-2.5 py-1 rounded font-black font-mono border border-amber-500/20">Score: ${entry.score_avg}</span>
                                </div>
                                <div class="text-xs text-slate-300 space-y-1">
                                    <p><b class="text-slate-400 font-medium">Faculty Member:</b> ${entry.faculty}</p>
                                    <p class="truncate"><b class="text-slate-400 font-medium">Subject Log:</b> ${entry.subject}</p>
                                </div>
                            </div>`;
                    });
                    container.innerHTML = html;
                }).catch(err => { container.innerHTML = `<div class="col-span-2 text-center text-rose-400">Database communication interface failure.</div>`; });
        }

        function openEvaluationModal(index) {
            const data = cachedAdminRecords[index];
            if (!data) return;
            document.getElementById('modalStudentName').innerText = data.student_name;
            document.getElementById('modalStudentCourse').innerText = data.course_level;
            document.getElementById('modalFacultyMember').innerText = data.faculty;
            document.getElementById('modalSubjectDesc').innerText = data.subject;
            document.getElementById('modalScoreAvg').innerText = `${data.score_avg} / 5.00`;
            document.getElementById('modalAdmiredText').innerText = `"${data.admireText}"`;
            document.getElementById('modalGrowthText').innerText = `"${data.improveText}"`;
            const modal = document.getElementById('evaluationDetailsModal');
            modal.classList.remove('hidden'); modal.classList.add('flex');
        }

        function closeEvaluationModal() {
            const modal = document.getElementById('evaluationDetailsModal');
            modal.classList.add('hidden'); modal.classList.remove('flex');
        }

        function bindAdminInputMonitorRepository(inputId, indicatorId, pattern) {
            const inputEl = document.getElementById(inputId);
            const indicatorEl = document.getElementById(indicatorId);
            if (inputEl && indicatorEl) {
                inputEl.addEventListener('keyup', () => {
                    const value = inputEl.value;
                    let statusClass = "indicator-waiting";
                    if (value.length === 0) {
                        statusClass = "indicator-invalid";
                    } else if (pattern && pattern.test(value)) {
                        statusClass = "indicator-valid";
                    } else if (pattern && !pattern.test(value) && value.length > 0) {
                        statusClass = "indicator-waiting";
                    }
                    indicatorEl.className = `validation-indicator-circle ${statusClass}`;
                });
            }
        }

        function bindAdminInputMonitorLetters() {
            bindAdminInputMonitorRepository('loginStudentName', 'indicatorSName', /^[A-Z,\s]+$/);
            bindAdminInputMonitorRepository('loginStudentId', 'indicatorSId', /^\d{4}-\d{5}-MN-\d{1}$/);
            bindAdminInputMonitorRepository('loginStudentCourse', 'indicatorSCourse', /^[A-Z]{4}-\d{2}-\d{4}[A-Z]{1}$/);
            bindAdminInputMonitorRepository('loginStudentPassword', 'indicatorSPass', /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/);
            bindAdminInputMonitorRepository('loginAdminId', 'indicatorPEmail', /^[a-zA-Z\d._]+@rtu\.edu\.ph$/);
            bindAdminInputMonitorRepository('loginAdminPin', 'indicatorPPass', /admin123/);
        }
    </script>
</body>
</html>