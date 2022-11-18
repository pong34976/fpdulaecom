const jwt = require("jsonwebtoken");
const jwkToPem = require("jwk-to-pem");

const file = require("./private-key-4da13dd6-2814-41a8-a351-1b0dfb0a80c7.json");
const jwk = file.privateKey;

// Convert JWK to PEM
const publicKey = jwkToPem(jwk);
const privateKey = jwkToPem(jwk, { private: true });

const header = {
  alg: "RS256",
  typ: "JWT",
  kid: "4da13dd6-2814-41a8-a351-1b0dfb0a80c7",
};

const payload = {
  token_exp: 60 * 60 * 24, 
};

const token = jwt.sign(payload, privateKey, {
  algorithm: "RS256",
  issuer: "1614564012", 
  subject: "1614564012",
  audience: "https://api.line.me/", 
  expiresIn: "15m",
  noTimestamp: true,
  header: header,
});

console.log(publicKey);
console.log(token);