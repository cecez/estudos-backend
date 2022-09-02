const redis = require("redis");

module.exports = redis.createClient({ prefix: "b019blacklist:" });
