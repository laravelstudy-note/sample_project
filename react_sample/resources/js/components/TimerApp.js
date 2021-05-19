import React, { useState, useEffect } from 'react';
const LIMIT = 10;
// カウントダウンをする(60 から 0 を描画する)コンポーネント。 
function Timer() {
    // timeLeft という state と setTimeLeft を更新する関数を定義。
    // 今回、useState に LIMIT(60)を渡しているため timeLeft の初期値は 60 になる
    const [timeLeft, setTimeLeft] = useState(LIMIT);
    // timeLeft をリセット(60に戻す)。 
    const reset = () => {
        setTimeLeft(LIMIT);
        };
    // timeLeft を更新する。 
    const tick = () => {
        //prevTimeとは？どっから出てきた
		const func1 = (prevTime) => {
			return (prevTime === 0 ? LIMIT : prevTime - 1)
		};
        setTimeLeft(func1);
		console.log('tick ' + timeLeft);
		
        };
    // setInterval で1秒毎に tick を実行するタイマーを作成する副作用。
    // 第2引数に [] を渡しているので、この副作用はレンダリング後の1度しか実行されな い。
    useEffect(() => {
        console.log('create Timer');
        const timerId = setInterval(tick, 1000);
        // 副作用が返す関数はコンポーネントがアンマウント、もしくは副作用が再度実行された 時に呼ばれる。
        // ↑で作成したタイマー(timerId)は削除しない限り、延々と実行され続けてしまう。
        // そのため、コンポーネントがアンマウント、もしくは副作用が再度実行された時に clearInterval でタイマーを削除する。
        return () => {
            console.log('cleanup Timer'); clearInterval(timerId);
            };
        }, []);
    return (
        <div>
            <p>time: {timeLeft}</p>
            <button onClick={reset}>reset</button> </div>
        ); 
}
//??なぜAppは読み込まれる？下でTimerを読み込んでいるから
function TimerApp() {
    // visible(state)と setVisible(stateを更新する関数)を定義。
    // 今回、useState に true を渡しているため visible の初期値は true になる
    const [visible, setVisible] = useState(true);
    const [count,setCount] = useState(0);
    return (
        <div>
            <Timer />
        </div>
    );
}
export default TimerApp;