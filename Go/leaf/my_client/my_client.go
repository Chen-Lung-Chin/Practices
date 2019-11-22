package main

import (
	"encoding/binary"
	"net"
)

func main() {
	conn, err := net.Dial("tcp", "192.168.1.111:3563")
	if err != nil {
		panic(err)
	}

	data := []byte(
		`{
			"Hello": {
				"Name": "my_client"
			}
		}`)

	m := make([]byte, 2+len(data))

	binary.BigEndian.PutUint16(m, uint16(len(data)))
	copy(m[2:], data)

	conn.Write(m)
}