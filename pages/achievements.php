<style>
  @keyframes float {
      0%, 100% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
  }
  @keyframes pulse-glow {
      0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
      50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.6), 0 0 60px rgba(59, 130, 246, 0.3); }
  }
  @keyframes shimmer {
      0% { background-position: -200% 0; }
      100% { background-position: 200% 0; }
  }
  .float-animation { animation: float 6s ease-in-out infinite; }
  .pulse-glow { animation: pulse-glow 3s ease-in-out infinite; }
  .shimmer {
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      background-size: 200% 100%;
      animation: shimmer 2s infinite;
  }
  .glass-morphism {
      backdrop-filter: blur(16px);
      background: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
  }
  .gradient-border {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      padding: 2px;
      border-radius: 16px;
  }
  .gradient-border-inner {
      background: rgba(15, 23, 42, 0.95);
      border-radius: 14px;
      height: 100%;
  }
</style>
<section class="grid lg:grid-cols-2 gap-8 p-8 min-h-[80vh] relative overflow-hidden">
  <!-- Animated background elements -->
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
      <div class="absolute top-10 left-10 w-32 h-32 bg-blue-500/20 rounded-full blur-xl float-animation"></div>
      <div class="absolute bottom-20 right-20 w-24 h-24 bg-purple-500/20 rounded-full blur-xl float-animation" style="animation-delay: -2s;"></div>
      <div class="absolute top-1/2 left-1/3 w-16 h-16 bg-amber-500/20 rounded-full blur-xl float-animation" style="animation-delay: -4s;"></div>
  </div>

  <!-- Conferences Section -->
  <div class="space-y-6 relative z-10">
      <div class="flex items-center gap-4 mb-8">
          <div class="w-12 h-12 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center pulse-glow">
              <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
              </svg>
          </div>
          <h2 class="text-3xl font-bold bg-gradient-to-r from-blue-400 to-purple-400 bg-clip-text text-transparent">
              Conferences
          </h2>
      </div>

      <div class="space-y-4">
          <div class="gradient-border hover:scale-105 transition-all duration-500 cursor-pointer group">
              <div class="gradient-border-inner p-6 relative overflow-hidden">
                  <div class="shimmer absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                  <div class="flex gap-4 relative z-10">
                      <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                          <span class="text-white font-bold text-lg">A</span>
                      </div>
                      <div class="flex-1">
                          <h3 class="text-xl font-semibold text-white mb-2 group-hover:text-blue-300 transition-colors">
                              Conference A
                          </h3>
                          <p class="text-slate-300 text-sm leading-relaxed">
                              Brief info here
                          </p>
                          <div class="flex items-center gap-2 mt-3">
                              <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                              <span class="text-xs text-green-400 font-medium">Active</span>
                          </div>
                      </div>
                      <div class="text-slate-400 group-hover:text-amber-400 transition-colors">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                          </svg>
                      </div>
                  </div>
              </div>
          </div>

          <div class="gradient-border hover:scale-105 transition-all duration-500 cursor-pointer group">
              <div class="gradient-border-inner p-6 relative overflow-hidden">
                  <div class="shimmer absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                  <div class="flex gap-4 relative z-10">
                      <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center shadow-lg">
                          <span class="text-white font-bold text-lg">B</span>
                      </div>
                      <div class="flex-1">
                          <h3 class="text-xl font-semibold text-white mb-2 group-hover:text-blue-300 transition-colors">
                              Conference B
                          </h3>
                          <p class="text-slate-300 text-sm leading-relaxed">
                              Brief info here
                          </p>
                          <div class="flex items-center gap-2 mt-3">
                              <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                              <span class="text-xs text-green-400 font-medium">Active</span>
                          </div>
                      </div>
                      <div class="text-slate-400 group-hover:text-amber-400 transition-colors">
                          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                          </svg>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  <!-- Journals Section -->
  <div class="space-y-6 relative z-10">
      <div class="flex items-center gap-4 mb-8">
          <div class="w-12 h-12 bg-gradient-to-r from-amber-500 to-orange-600 rounded-xl flex items-center justify-center pulse-glow">
              <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z"/>
              </svg>
          </div>
          <h2 class="text-3xl font-bold bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">
              Journals
          </h2>
      </div>

      <div class="space-y-4">
          <div class="glass-morphism p-6 rounded-2xl hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden">
              <div class="shimmer absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              <div class="relative z-10">
                  <div class="flex justify-between items-start mb-3">
                      <h3 class="text-xl font-bold text-white group-hover:text-blue-300 transition-colors">
                          Paper Title X
                      </h3>
                      <div class="flex items-center gap-2">
                          <div class="w-3 h-3 bg-amber-400 rounded-full animate-pulse"></div>
                          <span class="text-xs text-amber-400 font-medium">Published</span>
                      </div>
                  </div>
                  <p class="text-blue-300 text-sm font-medium mb-3">by Author Name</p>
                  <p class="text-slate-300 text-sm leading-relaxed mb-4">
                      Brief description of the journal article.
                  </p>
                  <div class="flex justify-between items-center">
                      <div class="flex items-center gap-2">
                          <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                          </svg>
                          <span class="text-slate-400 text-sm">Jan 2025</span>
                      </div>
                      <a href="#" class="bg-gradient-to-r from-amber-500 to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 group-hover:scale-105">
                          View Paper
                      </a>
                  </div>
              </div>
          </div>

          <div class="glass-morphism p-6 rounded-2xl hover:scale-105 transition-all duration-500 cursor-pointer group relative overflow-hidden">
              <div class="shimmer absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
              <div class="relative z-10">
                  <div class="flex justify-between items-start mb-3">
                      <h3 class="text-xl font-bold text-white group-hover:text-blue-300 transition-colors">
                          Paper Title Y
                      </h3>
                      <div class="flex items-center gap-2">
                          <div class="w-3 h-3 bg-amber-400 rounded-full animate-pulse"></div>
                          <span class="text-xs text-amber-400 font-medium">Published</span>
                      </div>
                  </div>
                  <p class="text-blue-300 text-sm font-medium mb-3">by Author Name</p>
                  <p class="text-slate-300 text-sm leading-relaxed mb-4">
                      Another short journal description.
                  </p>
                  <div class="flex justify-between items-center">
                      <div class="flex items-center gap-2">
                          <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                          </svg>
                          <span class="text-slate-400 text-sm">Feb 2025</span>
                      </div>
                      <a href="#" class="bg-gradient-to-r from-amber-500 to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:shadow-lg hover:shadow-amber-500/25 transition-all duration-300 group-hover:scale-105">
                          View Paper
                      </a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
