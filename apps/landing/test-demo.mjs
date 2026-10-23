import assert from 'node:assert'
import { demoWindow, demoStat } from './lib/demo.ts'

// Check demoWindow length and wrapping
const items = ['a', 'b', 'c', 'd']
const win0 = demoWindow(items, 0, 2)
assert.strictEqual(win0.length, 2, 'window length must match requested size')
assert.deepStrictEqual(win0, ['a', 'd'], 'tick 0 should return newest first with wrap')

const win1 = demoWindow(items, 1, 2)
assert.deepStrictEqual(win1, ['b', 'a'], 'tick 1 should shift forward')

const winWrap = demoWindow(items, 4, 3)
assert.deepStrictEqual(winWrap, ['a', 'd', 'c'], 'modulo wrap should work correctly')

// Check demoStat boundaries
const stat1 = demoStat(5, 0)
assert.ok(stat1 >= 1, 'stat should never drop below 1')

const stat2 = demoStat(12, 3)
assert.ok(stat2 >= 1, 'large stat should remain positive')

console.log('demo self-check passed: demoWindow and demoStat work correctly')
