//import React from 'react';
import React, { useState } from 'react';
import ReactDOM from 'react-dom';

import Alert from "./Alert";

import BookView from "./example/BookView";
import BookView2 from "./example/BookView2";
import BookEditView from "./example/BookEditView";
import BookEditView2 from "./example/BookEditView2";
import BookManageView from "./example/BookManageView";

function Example() {

	console.log("called: Example")
	
	const [visibled, setVisibled] = useState(0)

	const alertRender = (isVisible, callback) => {
		if(isVisible){
			return <Alert 
				message="Exampleから渡す" 
				type="success"
				onClose={ () => callback(0) }
			/>
		}
		
	}

	
	
    return (
        <div className="container mt-3">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">これはReactのコンポーネントです</div>

                        <div className="card-body">
							
							{ alertRender(visibled, setVisibled) }
							
							本文を書き換えます

							<button 
								className="btn btn-primary" 
								onClick={() => setVisibled(1) }>Alertを表示</button>

							<ul>
								<li>
									Classを作ってそれを描画するコンポーネント<br />
									-&gt; <code>BookView, Book</code>
								</li>
								<li>
									編集UIをどう作るか<br />
									-&gt; <code>BookEditView, BookEditView2</code>
								</li>
								<li>
									表示状態の切り替え
									-&gt; <code>BookManageView</code>
								</li>
							</ul>


						</div>
                    </div>
                </div>

            </div>

			<h2>クラスをつかった表示、編集</h2>

			<div className="row mt-3">

				<div className="col-md-3">
					<BookView />
				</div>

				<div className="col-md-3">
					<BookView2 />
				</div>

				<BookEditView />
				<BookEditView2 />

			</div>

			<h2>UIの状態切替変更</h2>

			<div className="row justify-content-center mt-3">
				<BookManageView />
			</div>



        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
