// Snowpack Configuration File
// See all supported options: https://www.snowpack.dev/reference/configuration

/** @type {import("snowpack").SnowpackUserConfig } */
module.exports = {
  mount: {
    "src/": "/",
  },
  plugins: [
    [
      "@snowpack/plugin-babel",
      {
        input: [".js", ".mjs", ".jsx", ".ts", ".tsx"],
        transformOptions: {
          presets: ["@babel/preset-env"],
          targets: {
            browsers: "> 0.00%",
          },
        },
      },
    ],
    ["@snowpack/plugin-sass", { style: "compressed" }],
  ],
  packageOptions: {
    /* ... */
  },
  devOptions: {
    /* ... */
  },
  buildOptions: {
    out: "dist/",
    /* ... */
  },
  optimize: {
    minify: true,
    sourceMap: "external",
    targets: "es2017",
  },
};
