const fs = require('fs');
const bs = require("browser-sync").create()
const path = require("path")
const lessc = require("less")
const rootPath = path.resolve(__dirname, "..")
const tailwind = require("tailwindcss/lib/cli/build");


function renderCSS() {
  fs.readFile(path.join(rootPath, "/tailwind.less"), (err, data) => {
    lessc.render(data.toString(), (e, css) => {
      if (e) return;
      fs.writeFile(path.join(rootPath, "/style.css"), css.css.toString(), async () => {
        try {
          await tailwind.build({
            "--input": path.join(rootPath, "/style.css"),
            "--output": path.join(rootPath, "/style.css"),
          })
        } catch {}
      })
    })
  })
}

fs.readFile(path.join(rootPath, "/tailwind.less"), (err, data) => {
  lessc.render(data.toString(), (e, css) => {
    if (e) {
      bs.watch(["tailwind.less"], {}, function () {
        renderCSS()
      })

      bs.init({
        ui: false,
        open: false,
        server: false
      })
    } else {
      fs.writeFile(path.join(rootPath, "/style.css"), css.css.toString(), async () => {
        try {
          await tailwind.build({
            "--input": path.join(rootPath, "/style.css"),
            "--output": path.join(rootPath, "/style.css"),
          })
        } finally {

          bs.watch(["tailwind.less"], {}, function () {
            renderCSS()
          })

          bs.init({
            ui: false,
            open: false,
            server: false
          })
        }
      })
    }
  })
})