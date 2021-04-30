//import React from 'react';
import React, { useState } from 'react';
import ReactDOM from 'react-dom';

import Alert from "./Alert";

import BookView from "./example/BookView";
import BookView2 from "./example/BookView2";
import BookEditView from "./example/BookEditView";
import BookEditView2 from "./example/BookEditView2";

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


						</div>
                    </div>
                </div>

            </div>

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
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
