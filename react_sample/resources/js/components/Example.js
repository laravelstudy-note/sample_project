import React,{ useState } from 'react';
import ReactDOM from 'react-dom';

function Example() {

	const title = "これはタイトルです";
	const text = "これは本文です";

	const [value1, setValue1] = useState("");
	const [value2, setValue2] = useState("");

	const onClick = () => {
		alert(value1 + "\n" + value2);
	}

	const onChangeValue = (event) => {
		const name= event.target.name
		const value = event.target.value

		console.log(name + " => " + value);
		if(name == "hoge1"){
			setValue1(value);
		}
		if(name == "hoge2"){
			setValue2(value);
		}
	};

	const book = (props.book) 
		? props.book 
		: new Book("ダミー書籍", "ダミー著者", 1000);


	return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">{ title }</div>

                        <div className="card-body">{ text }</div>

						<form onSubmit={ (event) => { onSubmit(event) } }>
							<input type="text" name="hoge1" onChange={ (e) => onChangeValue(e) } />
							<input type="text" name="hoge2" onChange={ (e) => onChangeValue(e) }/>
							<button type="submit">button</button>
						</form>

                    </div>
                </div>
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}