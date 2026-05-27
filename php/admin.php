<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Institutional Administration Portal</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-gradient-to-br from-[#071126] via-[#0f2042] to-[#081124] min-h-screen text-slate-100 font-sans antialiased">

    <nav class="bg-[#0b1730]/90 backdrop-blur-md border-b border-amber-500/20 sticky top-0 z-50 px-6 py-4 flex justify-between items-center shadow-lg">
        <div class="flex items-center space-x-3">
            <div class="bg-white px-3 py-1 rounded shadow-sm">
                <img src="../logo/RTU_Portal_Header.png" alt="RTU Logo" class="h-8 w-auto object-contain">
            </div>
            <span class="text-xs font-bold tracking-widest text-amber-400 uppercase border-l border-slate-700 pl-3">Admin Audit Matrix</span>
        </div>
        <a href="index.php" class="px-3 py-1.5 text-xs font-bold border border-rose-500/30 bg-rose-950/20 text-rose-300 rounded hover:bg-rose-900/40 transition">Exit Dashboard</a>
    </nav>

    <main class="max-w-6xl mx-auto my-8 px-4 space-y-6">
        <div class="flex items-center justify-between border-b border-amber-500/20 pb-4">
            <div>
                <h2 class="text-xl font-bold tracking-wide text-amber-300 uppercase">Student Submission Registry</h2>
                <p class="text-xs text-slate-400 mt-0.5">Select a student card row to pop up specific dynamic logs summaries data elements.</p>
            </div>
            <button onclick="loadAdminRegistry()" class="px-3 py-1.5 text-xs font-bold bg-amber-500 text-indigo-950 rounded hover:bg-amber-400 transition cursor-pointer">Refresh Logs Matrix</button>
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
                <button onclick="closeEvaluationModal()" class="text-slate-400 hover:text-rose-400 text-lg cursor-pointer"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="p-6 overflow-y-auto space-y-5 text-sm text-slate-300">
                <div class="grid grid-cols-2 gap-4 bg-[#0a1429] p-4 rounded-lg">
                    <div><span class="block text-[10px] uppercase font-bold tracking-wider text-amber-400/70">Faculty Member:</span><span id="modalFacultyMember" class="font-bold text-white text-base"></span></div>
                    <div><span class="block text-[10px] uppercase font-bold tracking-wider text-amber-400/70">Subject Context Description:</span><span id="modalSubjectDesc" class="italic text-slate-200"></span></div>
                </div>
                <div class="bg-[#0a1429] p-4 rounded-lg flex justify-between items-center"><span class="font-bold text-slate-200 text-xs tracking-wider uppercase">Score Summary Average Weight:</span><span id="modalScoreAvg" class="text-xl font-black px-3 py-1 bg-indigo-950 text-emerald-400 rounded"></span></div>
                <div class="space-y-3">
                    <div class="p-4 bg-emerald-950/20 border border-emerald-500/20 rounded-lg"><b class="text-emerald-400 block text-xs uppercase mb-1">Admired Attributes:</b><p id="modalAdmiredText" class="italic text-slate-300"></p></div>
                    <div class="p-4 bg-rose-950/20 border border-rose-500/20 rounded-lg"><b class="text-rose-400 block text-xs uppercase mb-1">Constructive Methodology Improvement Inputs:</b><p id="modalGrowthText" class="italic text-slate-300"></p></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let cachedAdminRecords = [];
        document.addEventListener("DOMContentLoaded", () => { loadAdminRegistry(); });

        // Pull dynamic dataset feeds directly out of active SQL database tables rows
        function loadAdminRegistry() {
            const container = document.getElementById('adminRecordsRoot');
            container.innerHTML = `<div class="col-span-2 text-center text-slate-400 p-6 italic">Querying SQL database logs matrices rows...</div>`;
            fetch('get_admin_reviews.php')
                .then(res => res.json())
                .then(response => {
                    if (response.status !== 'success' || response.data.length === 0) {
                        container.innerHTML = `<div class="col-span-2 text-center text-slate-400 p-6">No dynamic evaluations found inside server registers rows.</div>`;
                        return;
                    }
                    cachedAdminRecords = response.data;
                    let html = '';
                    response.data.forEach((entry, index) => {
                        html += `
                            <div onclick="openEvaluationModal(${index})" class="bg-[#0b152e] rounded-xl border border-amber-500/20 p-5 space-y-3 hover:border-amber-400/50 transition cursor-pointer group transform hover:-translate-y-0.5 duration-200 shadow-md">
                                <div class="flex justify-between items-start border-b border-slate-800 pb-2">
                                    <div><h3 class="font-black text-slate-100 group-hover:text-amber-300 uppercase tracking-wide">${entry.student_name}</h3><p class="text-[10px] text-slate-400 italic">${entry.course_level}</p></div>
                                    <span class="text-xs bg-indigo-950 text-amber-400 px-2.5 py-1 rounded font-black font-mono">Avg: ${entry.score_avg}</span>
                                </div>
                                <div class="text-xs text-slate-300"><p><b class="text-amber-400/70">Faculty Target:</b> ${entry.faculty}</p></div>
                            </div>`;
                    });
                    container.innerHTML = html;
                }).catch(err => { container.innerHTML = `<div class="col-span-2 text-center text-rose-400">Connection error timeout.</div>`; });
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
    </script>
</body>
</html>