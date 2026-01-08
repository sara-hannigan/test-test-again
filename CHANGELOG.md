# Changelog

## 0.1.0 (2026-01-08)

Full Changelog: [v0.0.1...v0.1.0](https://github.com/sara-hannigan/test-test-again/compare/v0.0.1...v0.1.0)

### ⚠ BREAKING CHANGES

* use aliases for phpstan types
* use camel casing for all class properties

### Features

* add `BaseResponse` class for accessing raw responses ([82f923e](https://github.com/sara-hannigan/test-test-again/commit/82f923ea61cde1fb3ea9227b8630fcfc96cc47d8))
* add idempotency header support ([dc9fa40](https://github.com/sara-hannigan/test-test-again/commit/dc9fa4042d2ee3ad11859285014006e0d6998491))
* allow both model class instances and arrays in setters ([42b460e](https://github.com/sara-hannigan/test-test-again/commit/42b460ee05fd0eadaadffedb9d8f775752668e60))
* **api:** email updates ([ff02ec2](https://github.com/sara-hannigan/test-test-again/commit/ff02ec25be45631387454b603c0713711a5949fe))
* simplify and make the phpstan types more consistent ([35b7b1a](https://github.com/sara-hannigan/test-test-again/commit/35b7b1a2513c45519cf79d1989d5569977269b34))
* split out services into normal & raw types ([912f258](https://github.com/sara-hannigan/test-test-again/commit/912f2582d65dcf32d7b94604856d030b90fe0db7))
* support unwrapping envelopes ([d18c5e9](https://github.com/sara-hannigan/test-test-again/commit/d18c5e9f66427b55360cadf9d9587f6a94bacae9))
* use aliases for phpstan types ([306d9d7](https://github.com/sara-hannigan/test-test-again/commit/306d9d7c39e087d5858476cd9cb22e18bb6ff1ff))
* use camel casing for all class properties ([a70d515](https://github.com/sara-hannigan/test-test-again/commit/a70d515be2d227fd09179b75b579ec05d4d4a2a1))


### Bug Fixes

* a number of serialization errors ([e7ed72d](https://github.com/sara-hannigan/test-test-again/commit/e7ed72ddb7bb47b8bfc5d158470093343c149615))
* correctly serialize dates ([6fab2ef](https://github.com/sara-hannigan/test-test-again/commit/6fab2efd613a2d50087200a907b22d8950c6b620))
* support arrays in query param construction ([3d30c53](https://github.com/sara-hannigan/test-test-again/commit/3d30c5399c42cde4880f8714405bdd282baecf6a))


### Chores

* be more targeted in suppressing superfluous linter warnings ([8821f94](https://github.com/sara-hannigan/test-test-again/commit/8821f94adf6ad0ffec1843b1024b460b9eae9a8e))
* formatting ([4d86c0c](https://github.com/sara-hannigan/test-test-again/commit/4d86c0ce1dba7b964e7fe1e5f403540ea9b81daf))
* **internal:** add a basic client test ([6b895ae](https://github.com/sara-hannigan/test-test-again/commit/6b895ae9045a1c2e11726ffdc5b400e8ca02dc3d))
* **internal:** codegen related update ([0f0d18a](https://github.com/sara-hannigan/test-test-again/commit/0f0d18a7d45eda033b97e4cb05e804d7f6fddb90))
* **internal:** codegen related update ([c92a33c](https://github.com/sara-hannigan/test-test-again/commit/c92a33cea2dc6943654916aa52010fc186216f8f))
* **internal:** codegen related update ([c5d415b](https://github.com/sara-hannigan/test-test-again/commit/c5d415b3d2a52dd3c775d0460f0b0012df4c0a9a))
* **internal:** codegen related update ([4af66f6](https://github.com/sara-hannigan/test-test-again/commit/4af66f6c120dd2aabada6a45bd09da32082e6ff2))
* **internal:** codegen related update ([d1ed472](https://github.com/sara-hannigan/test-test-again/commit/d1ed4721cfe19b8b5f310e423d907a79261b1d06))
* **internal:** codegen related update ([5772e0a](https://github.com/sara-hannigan/test-test-again/commit/5772e0ada71c3d9d19082c7fff638a175c748205))
* **internal:** codegen related update ([d2cce29](https://github.com/sara-hannigan/test-test-again/commit/d2cce2977aa07d4481fbc6ac9edfbfeab2b7bebd))
* **internal:** refactor auth by moving concern from base client into client ([72d0eea](https://github.com/sara-hannigan/test-test-again/commit/72d0eea6415fbff158cdaae88f2987be52afa217))
* switch from `#[Api(optional: true|false)]` to `#[Required]|#[Optional]` for annotations ([7dbafef](https://github.com/sara-hannigan/test-test-again/commit/7dbafefa89cd53d6f13fc0ece44d8be6fea5f9b5))
* sync repo ([6fa0d4a](https://github.com/sara-hannigan/test-test-again/commit/6fa0d4aa9e1f50a4ccb2aad6b62cce0f3807f0b9))
* update SDK settings ([b257553](https://github.com/sara-hannigan/test-test-again/commit/b257553e3d8aaba3587ed80f58acf7af41641eb4))
* use `$self = clone $this;` instead of `$obj = clone $this;` ([bb235dd](https://github.com/sara-hannigan/test-test-again/commit/bb235dd91de02c9903e18942be3a6c4c990d007d))
