<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Performance Evaluation Portal</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-gradient-to-br from-[#0b1b3d] via-[#122b5c] to-[#08132b] min-h-screen text-slate-100 font-sans antialiased selection:bg-amber-500 selection:text-indigo-950">

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
                    <button type="button" id="toggleStudentTab" onclick="switchLoginRole('student')" class="flex-1 py-2 text-center rounded bg-amber-500 text-indigo-950 font-bold transition cursor-pointer">Student Portal</button>
                    <button type="button" id="toggleAdminTab" onclick="switchLoginRole('admin')" class="flex-1 py-2 text-center rounded text-slate-400 hover:text-slate-200 transition cursor-pointer">Admin Portal</button>
                </div>

                <form id="formStudentLogin" onsubmit="handlePortalLogin(event)" class="space-y-4">
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

                <form id="formAdminLogin" onsubmit="handleAdminVerification(event)" class="space-y-4 hidden">
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

    <nav class="bg-[#0b1730]/90 backdrop-blur-md border-b border-amber-500/20 sticky top-0 z-50 px-6 py-3 flex justify-between items-center shadow-lg">
        <div class="flex items-center">
            <div class="flex items-center justify-center">
                <img src="../logo/RTU_Logo.png" alt="Rizal Technological University" class="h-10 w-auto object-contain block drop-shadow">
            </div>
        </div>
        <button onclick="handleLogout()" class="px-3 py-1.5 text-xs rounded bg-rose-950/40 text-rose-300 font-bold hover:bg-rose-900/50 transition border border-rose-500/30 cursor-pointer">Logout</button>
    </nav>

    <main class="max-w-6xl mx-auto my-8 px-4">
        <section id="view-schedule" class="space-y-6">
            <h1 class="text-2xl text-center font-bold tracking-wider text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-amber-400 to-amber-200 uppercase border-b border-amber-500/20 pb-4">Faculty Performance Evaluation</h1>
            <div class="bg-gradient-to-b from-[#e6c687] via-[#cca356] to-[#ad8336] p-[1px] rounded-xl shadow-xl">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 text-xs bg-[#0b162e] p-5 rounded-xl gold-border-corner">
                    <div class="md:col-span-8 grid grid-cols-3 gap-y-3 gap-x-4 items-center">
                        <span class="font-bold text-amber-400 uppercase tracking-wider">Student Name:</span>
                        <div class="col-span-2"><input type="text" id="metaStudentName" class="w-full bg-[#060d1f] text-slate-100 font-bold uppercase px-3 py-1.5 rounded border border-amber-500/20 outline-none pointer-events-none select-none" readonly></div>
                        <span class="font-bold text-amber-400 uppercase tracking-wider">Course / Section:</span>
                        <div class="col-span-2"><input type="text" id="metaCourseLevel" class="w-full bg-[#060d1f] text-slate-200 italic px-3 py-1.5 rounded border border-amber-500/20 outline-none pointer-events-none select-none" readonly></div>
                        <span class="font-bold text-amber-400 uppercase tracking-wider">School Year / Sem:</span>
                        <div class="col-span-2"><input type="text" value="2025 - 2026 / 2nd Semester" class="w-full bg-[#060d1f] text-amber-200 font-bold px-3 py-1.5 rounded border border-amber-500/20 outline-none pointer-events-none select-none" readonly></div>
                    </div>
                    <div class="md:col-span-4 border-l border-amber-500/10 pl-4 text-[11px] text-slate-400 flex flex-col justify-center">
                        <p class="italic leading-relaxed">System logs parameter matrices sync securely to dynamic RTU SQL tables upon form execution.</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-b from-[#e6c687] to-[#ad8336] p-[1px] rounded-xl shadow-2xl overflow-hidden">
                <div class="overflow-x-auto bg-[#091226]">
                    <table class="w-full text-left text-xs border-collapse">
                        <thead>
                            <tr class="bg-gradient-to-b from-[#162e5c] to-[#0f2042] text-amber-300 uppercase tracking-wider font-bold border-b border-amber-500/30">
                                <th class="p-3.5 text-center border-r border-amber-500/20 w-12">No.</th>
                                <th class="p-3.5 border-r border-amber-500/20">Class Code</th>
                                <th class="p-3.5 border-r border-amber-500/20">Subject</th>
                                <th class="p-3.5 border-r border-amber-500/20">Subject Description</th>
                                <th class="p-3.5 border-r border-amber-500/20">Assigned Faculty</th>
                                <th class="p-3.5 border-r border-amber-500/20 text-center w-28">Status</th>
                                <th class="p-3.5 text-center w-40">Ref. No.</th>
                            </tr>
                        </thead>
                        <tbody id="scheduleTableBody" class="divide-y divide-amber-500/10"></tbody>
                    </table>
                </div>
            </div>
        </section>

        <section id="view-evaluate" class="hidden space-y-6">
            <div class="bg-[#0b152e] rounded-xl border border-amber-500/20 p-4 grid grid-cols-2 md:grid-cols-5 gap-3 text-center text-xs">
                <div class="p-2 border-l-4 border-emerald-500 bg-[#070e21] rounded-r-lg"><b class="block text-emerald-400">5 - Always</b></div>
                <div class="p-2 border-l-4 border-teal-500 bg-[#070e21] rounded-r-lg"><b class="block text-teal-400">4 - Often</b></div>
                <div class="p-2 border-l-4 border-amber-500 bg-[#070e21] rounded-r-lg"><b class="block text-amber-400">3 - Sometimes</b></div>
                <div class="p-2 border-l-4 border-orange-500 bg-[#070e21] rounded-r-lg"><b class="block text-orange-400">2 - Seldom</b></div>
                <div class="p-2 border-l-4 border-rose-500 bg-[#070e21] rounded-r-lg col-span-2 md:col-span-1"><b class="block text-rose-400">1 - Never</b></div>
            </div>

            <form id="evaluationMatrixForm" onsubmit="submitEvaluation(event)" class="bg-[#0b152e] rounded-xl border border-amber-500/20 overflow-hidden shadow-2xl">
                <div class="p-6 border-b border-amber-500/20 bg-gradient-to-b from-[#0e1c3d] to-[#091226]">
                    <div class="flex flex-col md:flex-row items-center md:items-stretch gap-6">
                        <div class="flex-1 w-full space-y-4">
                            <div>
                                <label class="block text-[10px] font-bold text-amber-400 uppercase tracking-widest mb-1">Faculty Member:</label>
                                <div id="cardFacultyName" class="w-full bg-[#060c1c] text-white font-black px-4 py-2.5 rounded border border-amber-500/20"></div>
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-amber-400 uppercase tracking-widest mb-1">Assigned Course Context:</label>
                                <div id="cardSubject" class="w-full bg-[#060c1c] text-amber-100 font-medium px-4 py-2.5 rounded border border-amber-500/20"></div>
                            </div>
                        </div>
                        <div class="w-36 h-44 flex-shrink-0 bg-[#050a17] rounded-xl border-2 border-amber-500/30 p-1 overflow-hidden flex items-center justify-center">
                            <img id="cardFacultyImage" src="" alt="Faculty Frame" class="w-full h-full object-cover rounded-lg">
                        </div>
                    </div>
                </div>

                <div class="flex border-b border-amber-500/20 bg-[#070f24] text-[11px] font-bold uppercase tracking-wider text-slate-400">
                    <button type="button" onclick="switchStep(1)" id="stepTab1" class="flex-1 py-3.5 border-b-2 border-amber-500 text-amber-300 bg-[#0b152e] text-center">A. Teaching Mgmt</button>
                    <button type="button" onclick="switchStep(2)" id="stepTab2" class="flex-1 py-3.5 border-b-2 border-transparent text-center">B. Pedagogy & Tech</button>
                    <button type="button" onclick="switchStep(3)" id="stepTab3" class="flex-1 py-3.5 border-b-2 border-transparent text-center">C. Commitment</button>
                </div>

                <div class="p-6 md:p-8 space-y-6 bg-[#091124]">
                    <div id="stepSection1" class="space-y-4">
                        <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">01.</span>Comes to class on time.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q1"></div></div>
                        </div>
                        <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">02.</span>Explains learning outcomes and expectations transparently.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q2"></div></div>
                        </div>
                        <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">03.</span>Maximizes the allocated time effectively.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q3"></div></div>
                        </div>
                        <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">04.</span>Facilitates critical thinking through learning activities.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q4"></div></div>
                        </div>
                        <div class="matrix-row pb-2 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">05.</span>Guides students to reflect on new ideas productively.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q5"></div></div>
                        </div>
                    </div>

                    <div id="stepSection2" class="space-y-4 hidden">
                        <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">06.</span>Communicates constructive feedback for growth metrics.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q6"></div></div>
                        </div>
                        <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">07.</span>Demonstrates deep expertise across course subjects.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q7"></div></div>
                        </div>
                        <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">08.</span>Simplifies complex ideas for ease of understanding.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q8"></div></div>
                        </div>
                        <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">09.</span>Relates subject matter directly to daily life applications.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q9"></div></div>
                        </div>
                        <div class="matrix-row pb-2 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">10.</span>Promotes active learning environments utilizing technology.</p>
                            <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q10"></div></div>
                        </div>
                    </div>

                    <div id="stepSection3" class="space-y-6 hidden">
                        <div class="space-y-4">
                            <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">11.</span>Uses balanced assessment parameters fairly.</p>
                                <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q11"></div></div>
                            </div>
                            <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">12.</span>Recognizes and respects individual classroom diversity.</p>
                                <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q12"></div></div>
                            </div>
                            <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">13.</span>Assists students during designated consultation hours.</p>
                                <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q13"></div></div>
                            </div>
                            <div class="matrix-row border-b border-slate-800 pb-4 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">14.</span>Provides immediate turnaround feedback on submitted output metrics.</p>
                                <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q14"></div></div>
                            </div>
                            <div class="matrix-row pb-2 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <p class="text-sm text-slate-300 font-medium"><span class="text-amber-500 font-mono mr-2">15.</span>Provides transparent criteria rating grids.</p>
                                <div class="flex items-center space-x-1 text-xs"><div class="likert-buttons" data-qid="q15"></div></div>
                            </div>
                        </div>

                        <div class="pt-6 border-t border-slate-800 space-y-4 text-xs">
                            <div>
                                <label class="block text-xs font-bold text-amber-400 uppercase tracking-wide mb-2">1. What specific qualities of the Faculty Member do you admire the most? (Required)</label>
                                <textarea id="commentAdmire" required rows="2" placeholder="Write core strengths..." class="w-full text-sm bg-[#060c1a] border border-amber-500/20 text-slate-100 p-3 rounded-lg outline-none focus:border-amber-400 transition"></textarea>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-amber-400 uppercase tracking-wide mb-2">2. What areas need methodology improvement? (Required)</label>
                                <textarea id="commentImprove" required rows="2" placeholder="Write constructive growth inputs..." class="w-full text-sm bg-[#060c1a] border border-amber-500/20 text-slate-100 p-3 rounded-lg outline-none focus:border-amber-400 transition"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-[#070f24] border-t border-amber-500/20 px-6 py-4 flex justify-between items-center">
                    <button type="button" id="prevFormBtn" onclick="navigateStep(-1)" class="px-4 py-1.5 text-xs font-bold rounded bg-slate-800 text-slate-300 disabled:opacity-30 cursor-pointer">Cancel Form</button>
                    <button type="button" id="nextFormBtn" onclick="navigateStep(1)" class="px-4 py-1.5 text-xs font-bold rounded bg-gradient-to-b from-amber-300 to-amber-500 text-indigo-950 hover:from-amber-400 transition cursor-pointer">Continue Next</button>
                    <button type="submit" id="submitFormBtn" class="px-5 py-1.5 text-xs font-black rounded bg-emerald-600 text-white hover:bg-emerald-700 hidden transition cursor-pointer uppercase tracking-wide">Complete Submission</button>
                </div>
            </form>
        </section>
    </main>

    <script src="../script.js"></script>
</body>
</html>